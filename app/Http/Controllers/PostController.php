<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use phpDocumentor\Reflection\Types\Context;
use PhpParser\Node\Expr\PostDec;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\ArticleInfo;
use App\ArticleType;
use Auth;
use App\Http\Controllers\LoginController as Login;


class PostController extends Controller
{
    // 文章返回限制字符数
    private $limitText = 250 ;
    private $igonoreIpList = ['119.28.203.193','113.65.33.17'];



    // 获取系统运行时间
    public function getRunTime(){
        $time = \Config::get('blogInfo.createTime');
        $start = strtotime($time) ;
        $runTime = $this->datediffage($start) ;
        return $runTime;
    }

    public function test(Request $request){
        dd($request->session()->all());
    }

    // 注销登录
    public function loginOut(Login $login, Request $request){
        $login->clearAll($request);
        return redirect('/posts');
    }

    //  博客首页
    public function index(Request $request, Login $login){
        $runTime = $this->getRunTime();
        $runTime = json_decode(json_encode($runTime));
        $isLoggin = $login->isLoggin($request);

        $personalInfo1 = \Config::get('blogInfo.personalInfo1');
        $personalInfo2 = \Config::get('blogInfo.personalInfo2');

        return view('post/index',compact('runTime','$isLoggin','personalInfo1','personalInfo2'));
    }

    private function datediffage($unixTime_1) {
        $unixTime_2 =  strtotime('now') ;
        $timediff = abs($unixTime_2 - $unixTime_1);

        //计算年
        $divice = 31536000 ;
        $years = (int) floor($timediff /  $divice);
        $remain = $timediff %  $divice;

        //计算月
        $divice = 2592000 ;
        $months =  (int) floor($remain / $divice);
        $remain = $timediff %  $divice;

        //计算日
        $divice = 86400 ;
        $days =  (int) floor($remain / $divice);
        $remain = $timediff % $divice;

        //计算小时数
        $divice = 3600 ;
        $hours =  (int) floor($remain / $divice);
        $remain = $timediff % $divice;

        //计算分钟数
        $divice = 60 ;
        $remain = $remain % $divice;
        $mins = (int) floor($remain / $divice);

        //计算秒数
        $divice = 60 ;
        $secs = (int) $remain % $divice;


        // 临时使用 , 需要调整
        $months =  $months >12 ?  12 :  $months ;
        $days =  $days >31 ?  31 :  $days ;
        $hours =  $hours >24 ?  24 :  $days ;
        $mins =  $mins >60 ?  60 :  $mins ;
        $secs =  $secs >60 ?  60 :  $secs ;


        return [
            'year' => $years,'month'=>$months,'day'=>$days,
            'hour' => $hours, 'minute' => $mins, 'second' => $secs];
    }



    // 文章创建
    public function create(Request $request,Login $login){
        $isLoggin = $login->isLoggin($request);
        if( $isLoggin ){
            return view('post/create');
        }else{
            return view('post/login');
        }
    }

    // 文章保存
    public function store(Post $post,ArticleInfo $articleInfo,Request $request){
        // 验证
//        $validatedData = $this->validate(\request(),[
//            'title' => 'required|string|max:255|min:1',
//            'content'  => 'required|string|max:255|min:1',
//        ]);
//        return $validatedData;

//         校验失败返回错误信息, 成功返回文章id
//        if ($validatedData->fails()){
//            return $validatedData;
//        }



        $aid = request('id');
        $title = request('title') ;
        $content = request('content') ;
        if(  $aid  ===""||  $aid  ===null ) {
            $post->title = $title;
            $post->content = $content;
            $post->save();
            $id = $post->id;


        }else{
            $post->where('id', $aid)
                ->update([
                    'title' => $title,
                    'content' => $content]);
            $id = $aid ;
        }


        $articleInfo::firstOrCreate(
            ['article_id' =>  $id ],
            ['watch' => 0, 'article_id' =>  $id  ]
        );

        return $id;
    }

    // 关于我
    public function about(){
        $personalInfo1 = \Config::get('blogInfo.personalInfo1');
        $personalInfo2 = \Config::get('blogInfo.personalInfo2');
        return view('post/aboutMe',compact('personalInfo1','personalInfo2'));
    }

    // $string内容过滤标签后截取前$num字符
    private function HtmlToText($string,$num){
        if($string){
            //把一些预定义的 HTML 实体转换为字符
            $html_string = htmlspecialchars_decode($string);
            //将空格替换成空
            $content = str_replace(" ", "", $html_string);
            //函数剥去字符串中的 HTML、XML 以及 PHP 的标签,获取纯文本内容
            $contents = strip_tags($content);

            $contents = preg_replace('/[#`\*\!\(\)\[\]]+/','', $contents);

            //返回字符串中的前$num字符串长度的字符
            return mb_strlen($contents,'utf-8') > $num ? mb_substr($contents, 0, $num, "utf-8").'....' : mb_substr($contents, 0, $num, "utf-8");
        }else{
            return $string;
        }
    }

    // 文章列表
    public function articles(){
        // 访客记录
        $this->getIpLog();
        $articles = Post::orderBy('created_at','desc')
            ->join('article_infos', 'posts.id', '=', 'article_infos.article_id')
            ->leftJoin('article_types', 'posts.article_type', '=', 'article_types.tid')
            ->Paginate(15);
        $count = $articles->total();

        if($count>0){
            // 内容过滤标签后截取前500字符
            foreach ($articles as $key => $article){
                $content= $article['content'] ;
                $articles[$key]['content'] = $this->HtmlToText($content,$this->limitText);
            }
        }

        $articleTypes = [] ;
        $hotArticles = [] ;

        return view('post/articles',compact('articles','$articleTypes','$hotArticles','count'));
    }

    // 访客ip写入
    private function getIpLog(){
        $remote_ip = \request()->getClientIp();
        if(in_array($remote_ip, $this->igonoreIpList))return;

        $time = date('Y-m-d H:i:s',strtotime('now')) ;
        $log = $remote_ip . "   "  . $time ;
        Storage::disk('local')->append('logs/visitors.log',    $log);
    }

    // 文章观看人数加一
    public function watchIncrement($id,$remote_ip,$m_articleInfo){
        if(!in_array($remote_ip, $this->igonoreIpList)){
            $m_articleInfo->where('article_id',$id)
                ->increment('watch' ,1);
        }
    }

    // 检索文章
    public function searchArticle(Post $post){
        $wordStr = \request('word');
        $wordStr = preg_replace('/\s+/',' ',$wordStr) ;
        if($wordStr==="")return json_encode("");
        $wordsArray  = explode(' ',$wordStr );
        $whereRaw = "";
        foreach($wordsArray as $key =>  $word){
            if($key !== (count($wordsArray)-1) ){
                $whereRaw .= "`title` like '%$word%' or `content` like '%$word%' or " ;
            }else{
                $whereRaw .= "`title` like '%$word%' or `content` like '%$word%' " ;
            }
        }

        $result =  $post->select('id','title','content')->whereRaw($whereRaw)->get();
        foreach ($result as $key => $value){
            $content = $this->HtmlToText($value->content, 8 ) ;
            $result[$key]->content =$content;
        }
        return json_encode($result);
    }


    // 过滤标签, 过滤markdown 语法
    private function pureText($context){

    }

    // 文章详情
    public function show(Post $post,User $user, ArticleInfo $m_articleInfo,Request $request,Login $login){
        // 观看人数+1
        $remote_ip = \request()->getClientIp();
        $id = $post->id;
        $this->watchIncrement($id,$remote_ip,$m_articleInfo);

        // 重定向到文章详情
        $articleInfo =  $m_articleInfo->select('watch')
                                      ->where('article_id', '=', $post->id)
                                       ->first();
        // 此处需要优化sql
        $userName = $user->select('name')->join('posts', 'posts.user_id', '=', 'users.id')->get();
        $userName = $userName[0]->name ;


        // 登录判定
        $isLoggin = $login->isLoggin($request);
        return view('post/show', ['article'=>$post,'articleInfo'=>$articleInfo,'logged'=>$isLoggin ,'name'=>$userName]);
    }

    
    // 用户登录
    public function login(Post $post,Request $request){
        return view('post/login');
    }


    public function logOut(Post $post,Request $request,Login $login){
        $login->logOut($request);
        return view('post/');
    }



    // 标签管理
    public function tags($articleTypeId, Post $post){
        $articles = $post->where('article_type' , '=' ,$articleTypeId )
            ->join('article_infos', 'posts.id', '=', 'article_infos.article_id')
            ->leftJoin('article_types', 'posts.article_type', '=', 'article_types.tid')
            ->Paginate(5);
        $count = $articles->total();

        if($count>0){
            // 内容过滤标签后截取前500字符
            foreach ($articles as $key => $article){
                $content= $article['content'] ;
                $articles[$key]['content'] = $this->HtmlToText($content,$this->limitText);
            }
        }


        return view('post/tags',compact('articles','count'));
    }

    // 图片上传
    public function imagesUpload(Request $request){
        $path  = $request->file('wangEditorImgage')->storePublicly(md5(time()));
        return json_encode(['url'=>asset('storage/'. $path )]);
    }


    // 文章编辑 , 重定向页面
    public function edit($id){
        return view('post/edit',compact('id'));
    }

    // 加载文章标题, 文章内容
    public function getArticleContent(){
        $id = \request('id');
        $post = new Post;
        $result = $post->select('title','content', 'user_id','article_type')
            ->where('id','=',$id)->first();
        return json_encode($result );
    }

    // 删除文章
    public function delete( ){
        $id = \request('id');
        $post = new Post ;
        $articleInfo = new ArticleInfo() ;
        $post->where('id' , '=' , $id)->delete();
        $articleInfo->where('article_id' , '=' , $id)->delete();
        return true;
    }

    // 文章编辑提交
    public function update(){
        dd(\request()->all() );
    }

    // 封面图展示
    public function share(){
//        $fullPath = base_path().DIRECTORY_SEPARATOR.'pic'.DIRECTORY_SEPARATOR.'demo.jpg';
        return response()->streamDownload(function()  {
            echo file_get_contents(   storage_path()."/images/timg.jpg" );
        }, "aaaa.jpg" , ['content-type' => 'image/png']);


    }


}
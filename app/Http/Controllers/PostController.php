<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PhpParser\Node\Expr\PostDec;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\ArticleInfo;
use App\ArticleType;

class PostController extends Controller
{
    // 文章返回限制字符数
    private $limitText = 500 ;


    // 获取系统运行时间
    public function getRunTime(){
        $time = \Config::get('blogInfo.createTime');
        $start = strtotime($time) ;
        $runTime = $this->datediffage($start) ;
        return $runTime;
    }

    public function test(){
        dd($this->getRunTime());
    }


    //  博客首页
    public function index(){
        $runTime = $this->getRunTime();
        $runTime = json_decode(json_encode($runTime));
        return view('post/index',compact('runTime'));
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
    public function create(){
//        登录校验
        return view('post/create');
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


        $post->title = request('title');
        $post->content = request('content');
        $post->save();
        $id = $post->id;

        $articleInfo::firstOrCreate(
            ['article_id' =>  $id  ],
            ['watch' => 0, 'article_id' =>  $id  ]
        );

        return $id;
//        return redirect("/posts/$id");
    }

    // 关于我
    public function about(){
        return view('post/aboutMe');
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
            //返回字符串中的前$num字符串长度的字符
            return mb_strlen($contents,'utf-8') > $num ? mb_substr($contents, 0, $num, "utf-8").'....' : mb_substr($contents, 0, $num, "utf-8");
        }else{
            return $string;
        }
    }

    // 文章列表
    public function articles(){
        $articles = Post::orderBy('created_at','desc')
            ->join('article_infos', 'posts.id', '=', 'article_infos.article_id')
            ->leftJoin('article_types', 'posts.article_type', '=', 'article_types.tid')
            ->Paginate(5);
        $isEmpty = $articles->count()===0 ? 1 : 0 ;

        if(!$isEmpty){
            // 内容过滤标签后截取前500字符
            foreach ($articles as $key => $article){
                $content= $article['content'] ;
                $articles[$key]['content'] = $this->HtmlToText($content,$this->limitText);
            }
        }

        $articleTypes = [] ;
        $hotArticles = [] ;

        return view('post/articles',compact('articles','$articleTypes','$hotArticles','isEmpty'));
    }

    // 文章详情
    public function show(Post $post, ArticleInfo $m_articleInfo){

        $m_articleInfo->where('article_id',$post->id)
            ->increment('watch' ,1);


        // 访客记录
        $remote_ip = \request()->getClientIp();
        $time = date('Y-m-d H:i:s',strtotime('now')) ;
        $log = $remote_ip . "   "  . $time ;
        Storage::disk('local')->append('visitors.log',    $log);

        // 重定向到文章详情
        $articleInfo =  $m_articleInfo->select('watch')->where('article_id', '=', $post->id)->first();

        // 登录判定
        $logged = false;
        return view('post/show', ['article'=>$post,'articleInfo'=>$articleInfo,'logged'=>$logged ]);
    }

    
    // 用户登录
    public function login(Post $post,\Request $request){

        return view('post/login');
    }




    // 标签管理
    public function tags($articleTypeId, Post $post){
        $articles = $post->where('article_type' , '=' ,$articleTypeId )
            ->join('article_infos', 'posts.id', '=', 'article_infos.article_id')
            ->leftJoin('article_types', 'posts.article_type', '=', 'article_types.tid')
            ->Paginate(5);
        return view('post/tags',compact('articles'));
    }

    // 图片上传
    public function imagesUpload(){
        return view('post/create');
    }


    // 文章编辑
    public function edit($id){
        $o_post = new Post;
        $post = $o_post->where('id','=',$id)->first();
        return view('post/edit',compact('id','post'));
    }

    // 删除文章
    public function delete( ){
        $id = \request('id');
        $post = new Post ;
        $post->where('id' , '=' , $id)->delete();
        return true;
//        return redirect('/posts/articles');
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
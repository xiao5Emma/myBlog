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
    //  博客首页
    public function index(){
        return view('post/index');
    }

    // 文章创建
    public function create(){
//        登录校验
        return view('post/create');
    }

    // 文章保存
    public function store(Post $post,ArticleInfo $articleInfo,Request $request){

        // 验证
        $this->validate(\request(),[
            'title' => 'required|string|max:255|min:5',
            'content'  => 'required|string|max:3000|min:5',
        ]);

        $post->title = request('title');
        $post->content = request('content');
        $post->save();
        $id = $post->id;

        $articleInfo::firstOrCreate(
            ['article_id' =>  $id  ],
            ['watch' => 0, 'article_id' =>  $id  ]
        );
        return $id;
    }

    // 关于我
    public function about(){
        return view('post/aboutMe');
    }

    // 文章列表
    public function articles(){
        $articles = Post::orderBy('created_at','desc')
            ->join('article_infos', 'posts.id', '=', 'article_infos.article_id')
            ->leftJoin('article_types', 'posts.article_type', '=', 'article_types.tid')
            ->Paginate(5);
        $articleTypes = [] ;
        $hotArticles = [] ;

        return view('post/articles',compact('articles','$articleTypes','$hotArticles'));
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
        return view('post/show', ['article'=>$post,'articleInfo'=>$articleInfo]);
    }

    // 标签管理
    public function tags($articleTypeId, Post $post){
        $articles = $post->where('article_type' , '=' ,$articleTypeId )->get();
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
    public function delete($id ){
        $post = new Post ;
        $post->where('id' , '=' , $id)->delete();
        return redirect('/posts/articles');
    }

    // 文章编辑提交
    public function update(){
        dd(\request()->all() );
    }



}

<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// 文章列表页
Route::get('/posts', '\App\Http\Controllers\PostController@index');
Route::get('/posts/articles', '\App\Http\Controllers\PostController@articles');
// 文章详情页
Route::get('/posts/about', '\App\Http\Controllers\PostController@about');
Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');
// 创建文章
Route::get('/posts/create', '\App\Http\Controllers\PostController@create');      # 获取创建页面
Route::post('/posts', '\App\Http\Controllers\PostController@store');    # 提交文章 insert

// 编辑文章
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');    # 获取文章内容
Route::put('/posts/{post}/edit', '\App\Http\Controllers\PostController@update'); # 提交文章修改 update

// 删除文章
Route::post('/posts/delete', '\App\Http\Controllers\PostController@delete');
Route::get('/posts/articleTypeDisplay/{articleType}', '\App\Http\Controllers\PostController@articleTypeDisplay');


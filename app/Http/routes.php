<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');


Route::get('/admin','AdminController@index');
Route::get('/admin/users','AdminController@users');
Route::resource('/admin/tag', 'TagController',['except' => ['destroy']]);
Route::post('/admin/tag/delete','TagController@delete');
Route::post('/admin/tag/operate/{id}','TagController@operate');
Route::resource('/admin/question', 'QuestionController',['except' => ['destroy','create']]);
Route::get('admin/question/create/{qtype}','QuestionController@create');
Route::post('/admin/question/delete','QuestionController@delete');
Route::get('admin/comment','CommentController@index');

Route::get('/test', 'TestController@index');
Route::post('/test', 'TestController@prepare');
Route::post('/test/{test_id}/next/{id}', 'TestController@next');
Route::get('/test/{test_id}/judge', 'TestController@judge');
Route::get('/test/{test_id}/details', 'TestController@detail');
Route::get('/test/{test_id}/alldetails', 'TestController@allDetail');
Route::get('/test/{test_id}/{id}', 'TestController@show');

Route::get('/history','HistoryController@index');

Route::get('/contact','ContactController@index');
Route::get('/contact/message','ContactController@message');


Route::any('/weixin', 'WeixinController@index');



//定义过滤器
Route::filter('weixin', function()
{
    // 获取到微信请求里包含的几项内容
    $signature = Input::get('signature');
    $timestamp = Input::get('timestamp');
    $nonce     = Input::get('nonce');

    // ninghao 是我在微信后台手工添加的 token 的值
    $token = 'ninghao';

    // 加工出自己的 signature
    $our_signature = array($token, $timestamp, $nonce);
    sort($our_signature, SORT_STRING);
    $our_signature = implode($our_signature);
    $our_signature = sha1($our_signature);

    // 用自己的 signature 去跟请求里的 signature 对比
    if ($our_signature != $signature) {
        return false;
    }
});
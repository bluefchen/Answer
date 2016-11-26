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
Route::get('/admin','AdminController@index');
Route::get('/test', 'TestController@index');
Route::post('/test/next/{id}', 'TestController@next');
Route::get('/test/judge', 'TestController@judge');
Route::get('/test/{id}', 'TestController@show');
Route::resource('/admin/tag', 'TagController',['except' => ['index', 'show','destroy']]);
Route::post('/admin/tag/delete','TagController@delete');
Route::resource('/admin/question', 'QuestionController',['except' => ['index','destroy']]);
Route::post('/admin/question/delete','QuestionController@delete');
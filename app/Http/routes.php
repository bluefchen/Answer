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
Route::resource('/admin/tag', 'TagController',['except' => ['index', 'destroy']]);
Route::post('/admin/tag/delete','TagController@delete');
Route::post('/admin/tag/operate/{id}','TagController@operate');
Route::resource('/admin/question', 'QuestionController',['except' => ['index','destroy']]);
Route::post('/admin/question/delete','QuestionController@delete');
Route::get('/admin/question/prevshow/{id}','QuestionController@prevshow');
Route::post('/admin/question/nextshow/{id}','QuestionController@nextshow');

Route::get('/test', 'TestController@index');
Route::post('/test', 'TestController@prepare');
Route::post('/test/{test_id}/next/{id}', 'TestController@next');
Route::get('/test/{test_id}/judge', 'TestController@judge');
Route::get('/test/{test_id}/details', 'TestController@detail');
Route::get('/test/{test_id}/alldetails', 'TestController@allDetail');
Route::get('/test/{test_id}/{id}', 'TestController@show');

Route::get('/history','HistoryController@index');
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
Route::get('/test', function () {
//    if (session('user')) {
//        dd(session('user'));
//    }

});

Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {
    Route::any('/login','LoginController@login');
    Route::get('/code','LoginController@code');
    Route::get('/test','LoginController@test');
});
Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => 'admin.login'], function () {
    Route::get('/logout','LoginController@logout');
    Route::get('/index','IndexController@index');
    Route::get('/info','IndexController@info');
    Route::any('/change','IndexController@change');
    Route::post('/cate/changeorder','CategoryController@changeOrder');

    Route::any('/upload','CommonController@upload');

    Route::resource('/category','CategoryController');
    Route::resource('/article','ArticleController');

});


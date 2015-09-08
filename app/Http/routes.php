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

//登录
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
//注册
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
//找回密码
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
//城市
Route::resource('excities','ExcitiesController');
Route::get('province','ExcitiesController@province');
Route::get('city/{id}','ExcitiesController@city');
Route::get('district/{id}','ExcitiesController@district');
//信息
Route::get('news/loststh','NewsController@loststh');
Route::get('news/seeksth','NewsController@seeksth');
Route::get('news/people','NewsController@people');
Route::get('news/pet','NewsController@pet');
Route::resource('news','NewsController');
Route::resource('photos','PhotosController');
//信息回复
Route::resource('message','MessagesController');
//主页
Route::get('/', function () {
    return view('home',array('navsub'=>0));
});
Route::controller('','HomesController');

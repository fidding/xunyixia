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
//主页
Route::get('/', 'HomesController@index');
Route::get('home', 'HomesController@index');
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
Route::get('news/types/{type}','NewsController@getNewsType');
Route::get('news/lastNews','NewsController@lastNews');
Route::resource('news','NewsController');

Route::get('news/create/step1','NewsController@step1');
Route::get('news/create/step2','NewsController@step2');
Route::get('news/create/step3','NewsController@step3');
Route::get('news/create/step4','NewsController@step4');

Route::resource('photos','PhotosController');
//用户中心
Route::get('users/info','UsersController@info');
Route::get('users/password','UsersController@password');
Route::post('users/updatePwd','UsersController@updatePwd');
Route::resource('users','UsersController');
//信息回复
Route::resource('message','MessagesController');
//消息反馈
Route::resource('feedback','FeedbacksController');
//交易
Route::get('trades/remindPoster','TradesController@remindPoster');
Route::get('trades/remindPoster/contact','TradesController@contact');
Route::resource('trades/receive','TradesController@receive');//收到的交易
Route::resource('trades','TradesController');




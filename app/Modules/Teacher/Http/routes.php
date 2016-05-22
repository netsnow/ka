<?php

/*
 |--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//登陆（靳宗雨）
Route::get('/teacher/login',        'UserController@getIndex');//登陆界面
Route::post('/teacher/login',       'UserController@login');//验证登陆
Route::get('/teacher/logout',       'UserController@logout');//用户退出登录

Route::group(['prefix' => 'teacher','middleware' => 'auth'], function() {
    //error 李苗苗
    Route::get('/_errors', 'ErrorsController@getIndex');

    //首页 (靳宗雨)
    Route::get('/admin','AdminController@index');

    //学生考勤
    Route::get('/student',                  'StudentController@getIndex');
    Route::get('/student/resign/{studentid}',  'StudentController@getResign');

    //老师考勤
    Route::get('/order',                    'OrderController@getIndex');

    //管理员个人设置 （靳宗雨）
    Route::get('/user/setting',   'UserController@userSetting');
    Route::post('/user/update',   'UserController@updateUser');

});

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

Route::get('/app/download', function() {
    return view('default.front.app.download');
});

//Route::get('/test', function() {
////    $res = DB::connection('sqlsrv')->select('select * from CardRecord');
//    $res = DB::connection('sqlsrv')->table('CardRecord')->get();
//    dd($res);
//});

 
Route::any('/api/alipay',                      'AlipayController@postAlipay');
Route::any('/api/alipaycheck',                      'AlipayController@alipayCheck');



Route::any('/api/rechargealipay',                      'AlipayController@postRechargeAlipay');
Route::any('/api/rechargealipaycheck',                      'AlipayController@rechargeAlipayCheck');


Route::group(['prefix' => 'api', 'middleware' => 'api.access'], function() {
    Route::any('/auth/login',                   'AuthController@postLogin');
    Route::any('/protocol/get',                 'SettingController@postProtocol');
    Route::any('/aboutus/get',                  'SettingController@postAboutus');
    Route::any('/updateInfo/getIos',            'SettingController@postInfoIos');
    Route::any('/updateInfo/getAnd',            'SettingController@postInfoAnd');

    Route::group(['middleware' => 'api.auth'], function() {
//        Route::any('/demo/get',                     'DemoController@postIndex');
        Route::any('/payment/get',                  'PayController@postIndex');
        Route::any('/wifi/getPswd',                 'SettingController@postWifi');
        Route::any('/booking/get',                  'BookingController@postIndex');
        Route::any('/order/create',                 'OrderController@postAdd');
        Route::any('/order/goodsCreate',                 'OrderController@postGoodsAdd');
        Route::any('/returnRecharge',           'AlipayController@returnRecharge');
        Route::any('/order/getBath',                'OrderController@postTypeBath');
        Route::any('/order/getSleep',               'OrderController@postTypeSleep');
        Route::any('/order/getRoom',                'OrderController@postTypeRoom');
        Route::any('/order/getGoods',                'OrderController@postTypeGoods');
        Route::any('/order/check',                  'OrderController@orderCheck');
        Route::any('/charging/price/getSleep',      'ChargingController@postTypeSleep');
        Route::any('/charging/price/getBath',       'ChargingController@postTypeBath');
        Route::any('/order/delete',                 'OrderController@orderDelete');
        Route::any('/room/getInfo',                 'RoomController@getInfo');
        Route::any('/order/sleepbath',              'OrderController@sleepbathNopay');
        Route::any('/order/suminfo',                'OrderController@userSuminfo');
        Route::any('/order/orderpay',               'OrderController@orderPay');
        Route::any('/goods',                        'GoodsController@getGoods');
        Route::any('/store',                        'GoodsController@getStore');
        Route::any('/users/pwdchange',               'UsersController@pwdChange'); 
    });
});

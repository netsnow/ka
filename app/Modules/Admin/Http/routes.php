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

Route::get('/storeOrder/{store_code}',                      'StoreCodeController@getIndex');


// 广告首页 李苗苗
Route::get('/admin',  'IndexController@getIndex');
Route::get('/admin/ad_appointment', 'AppointmentController@getIndex');
Route::get('/admin/ad_appointment/appoint', 'AppointmentController@showIndex');

//登陆（靳宗雨）
Route::get('/admin/login',       'UserController@getIndex');//登陆界面
Route::post('/admin/login',       'UserController@login');//验证登陆
Route::get('/admin/logout',  'UserController@logout');//用户退出登录

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    //error 李苗苗
    Route::get('/_errors', 'ErrorsController@getIndex');

    //首页 (靳宗雨)
    Route::get('/admin','AdminController@index');

    //Route::get('/brand',                    'BrandController@getIndex');
    //Route::post('/brand/delete',            'BrandController@apiDelete');
    //Route::get('/brand/add',                'BrandController@getAdd');
    //Route::post('/brand/add',               'BrandController@postAdd');
    //Route::get('/brand/edit/{id}',          'BrandController@getEdit');
    //Route::post('/brand/edit/{id}',         'BrandController@postEdit');

    //账户管理－教师
    Route::get('/usermanage',               'UserManageController@getIndex');
    Route::get('/usermanage/add',           'UserManageController@getAdd');
    Route::post('/usermanage/add',          'UserManageController@postAdd');
    Route::post('/usermanage/delete',       'UserManageController@apiDelete');
    Route::get('/usermanage/edit/{id}',     'UserManageController@getEdit');
    Route::post('/usermanage/edit/{id}',    'UserManageController@postEdit');

    //账户管理－学生
    Route::get('/studentmanage',               'StudentManageController@getIndex');
    Route::get('/studentmanage/add',           'StudentManageController@getAdd');
    Route::post('/studentmanage/add',          'StudentManageController@postAdd');
    Route::post('/studentmanage/delete',       'StudentManageController@apiDelete');
    Route::get('/studentmanage/edit/{id}',     'StudentManageController@getEdit');
    Route::post('/studentmanage/edit/{id}',    'StudentManageController@postEdit');

    //班级管理
    Route::get('/company',                  'CompanyController@getIndex');
    Route::get('/company/add',              'CompanyController@getAdd');
    Route::post('/company/add',             'CompanyController@postAdd');
    Route::post('/company/delete',          'CompanyController@apiDelete');
    Route::get('/company/edit/{id}',        'CompanyController@getEdit');
    Route::post('/company/edit/{id}',       'CompanyController@postEdit');

    //考勤导入
    Route::get('/order',                    'OrderController@getIndex');
    Route::get('/order/import',             'OrderController@getImport');
    Route::post('/order/import',            'OrderController@postImport');

    //广告管理 （靳宗雨）
    Route::get('/ad',                    'AdController@getIndex');
    Route::get('/ad/add',                'AdController@getAdd');
    Route::post('/ad/add',               'AdController@postAdd');
    Route::get('/ad/edit/{id}',          'AdController@getEdit');
    Route::post('/ad/edit/{id}',         'AdController@postEdit');
    Route::post('/ad/delete',            'AdController@apiDelete');

//    Route::get('/category',                 'CategoryController@getIndex');
//    Route::post('/category/delete',         'CategoryController@apiDelete');
//    Route::get('/category/add',             'CategoryController@getAdd');
//    Route::post('/category/add',            'CategoryController@postAdd');
//    Route::get('/category/edit/{id}',       'CategoryController@getEdit');
//    Route::post('/category/edit/{id}',      'CategoryController@postEdit');

//    Route::get('/promotion',                    'PromotionController@getIndex');
//    Route::post('/promotion/delete',            'PromotionController@apiDelete');
//    Route::get('/promotion/add',                'PromotionController@getAdd');
//    Route::post('/promotion/add',               'PromotionController@postAdd');
//    Route::get('/promotion/edit/{id}',          'PromotionController@getEdit');
//    Route::post('/promotion/edit/{id}',         'PromotionController@postEdit');



//    Route::get('/campaign',             'CampaignController@getIndex');
//    Route::post('/campaign/delete',            'CampaignController@apiDelete');
//    Route::get('/campaign/add',                'CampaignController@getAdd');
//    Route::get('/campaign/edit/{id}',          'CampaignController@getEdit');
//    Route::post('/campaign/add',               'CampaignController@postAdd');
//    Route::post('/campaign/edit/{id}',         'CampaignController@postEdit');

    //管理员个人设置 （靳宗雨）
    Route::get('/user/setting',   'UserController@userSetting');
    Route::post('/user/update',   'UserController@updateUser');



//    Route::get('/store', 'StoreController@index');
//    Route::post('/store/delete', 'StoreController@storeDel');
//    Route::get('/store/add', 'StoreController@getAdd');
//    Route::post('/store/add', 'StoreController@postAdd');
//    Route::get('/store/edit/{id}', 'StoreController@getEdit');
//    Route::post('/store/edit/{id}', 'StoreController@postEdit');
//    Route::post('/store/check', 'StoreController@postCheck');

//    Route::get('/admin', 'HomepageController@index');

//    Route::get('/setting',                    'SettingController@getIndex');
//    Route::get('/setting/edit/{id}',          'SettingController@getEdit');
//    Route::post('/setting/edit/{id}',         'SettingController@postEdit');

    //商品管理 (段泽宇)
    Route::get('/goods',                    'GoodsController@getIndex');
    Route::post('/goods/delete',            'GoodsController@apiDelete');
    Route::post('/goods/add',              'GoodsController@postAdd');
    Route::get('/goods/add',              'GoodsController@getAdd');
    Route::get('/goods/edit/{id}',          'GoodsController@getEdit');
    Route::post('/goods/edit/{id}',         'GoodsController@postEdit');
    Route::get('/goods/copy/{id}',          'GoodsController@getCopy');
    Route::post('/goods/copy/{id}',             'GoodsController@postCopy');




    //系统设置=>支付管理 （靳宗雨）
    Route::get('/payment',                    'PaymentController@getIndex');
    Route::get('/payment/add',                'PaymentController@getAdd');
    Route::post('/payment/add',               'PaymentController@postAdd');
    Route::get('/payment/edit/{id}',          'PaymentController@getEdit');
    Route::post('/payment/edit/{id}',         'PaymentController@postEdit');
    Route::post('/payment/change',          'PaymentController@postChange');

    // 系统设置（段泽宇）
    Route::get('/setting/edition_ios',   'SettingController@getEditionIos');
    Route::post('/setting/edition_ios',  'SettingController@postSetEditionIos');
    Route::get('/setting/edition_and',   'SettingController@getEditionAnd');
    Route::post('/setting/edition_and',  'SettingController@postSetEditionAnd');
    Route::get('/setting',  'SettingController@getIndex');
    Route::get('/setting/wifi',   'SettingController@getWifi');
    Route::post('/setting/wifi',  'SettingController@postSetWifi');
    Route::get('/setting/protocol',   'SettingController@getProtocol');
    Route::post('/setting/protocol',  'SettingController@postSetProtocol');
    Route::get('/setting/about_us',   'SettingController@getAboutus');
    Route::post('/setting/about_us',  'SettingController@postSetAboutus');
    Route::get('/setting/weather',   'SettingController@getWeather');
    Route::post('/setting/weather',  'SettingController@postSetWeather');
    Route::get('/setting/store_code',   'SettingController@getStoreCode');
    Route::post('/setting/store_code',  'SettingController@postStoreCode');

    //事件管理
/*     Route::get('/fact',                    'FactController@getIndex');
    Route::post('/fact/delete',            'FactController@apiDelete');
    Route::get('/fact/add',                'FactController@getAdd');
    Route::post('/fact/add',               'FactController@postAdd');
    Route::get('/fact/edit/{id}',          'FactController@getEdit');
    Route::post('/fact/edit/{id}',         'FactController@postEdit'); */

    //计费定价（靳宗雨）
    Route::get('/charging_price',                    'Charging_priceController@getIndex');
    Route::post('/charging_price/delete',            'Charging_priceController@apiDelete');
    Route::get('/charging_price/add',                'Charging_priceController@getAdd');
    Route::post('/charging_price/add',               'Charging_priceController@postAdd');
    Route::get('/charging_price/bundcardid/{id}',          'Charging_priceController@getBund');
    Route::post('/charging_price/bundcardid/{id}',         'Charging_priceController@postBund');
    Route::get('/charging_price/edit/{id}',          'Charging_priceController@getEdit');
    Route::post('/charging_price/edit/{id}',         'Charging_priceController@postEdit');

    //计费管理（靳宗雨）
    Route::get('/charging',                    'ChargingController@getIndex');
    //start  xuchunlong
    Route::get('/room',                    'RoomController@getIndex');
    Route::post('/room/delete',            'RoomController@apiDelete');
    Route::get('/room/add',               'RoomController@getAdd');
    Route::post('/room/add',               'RoomController@postAdd');
    Route::get('/room/edit/{id}',          'RoomController@getEdit');
    Route::post('/room/edit/{id}',          'RoomController@postEdit');
    Route::get('/seat',                      'SeatController@getIndex');
    Route::post('/seat/delete',            'SeatController@postDelete');
    Route::get('/seat/add',            'SeatController@getAdd');
    Route::post('/seat/getroom',            'SeatController@getRoom');
    Route::post('/seat/add',            'SeatController@postAdd');
    Route::get('/seat/edit/{id}',          'SeatController@getEdit');
//    Route::get('/seat/order_add',          'SeatController@postAddOrder');
    Route::post('/seat/lease',     'SeatController@getAddOrder');
    Route::post('/seat/order_add',     'SeatController@postAddOrder');
    Route::post('/seat/edit/{id}',          'SeatController@postEdit');
    Route::get('/seat/fast',          'SeatController@getFast');
    Route::post('/seat/fast',          'SeatController@postFast');
    Route::get('/seat_price',                    'Seat_priceController@getIndex');
    Route::post('/seat_price/delete',            'Seat_priceController@apiDelete');
    Route::get('/seat_price/add',                'Seat_priceController@getAdd');
    Route::post('/seat_price/add',               'Seat_priceController@postAdd');
    Route::get('/seat_price/edit/{id}',          'Seat_priceController@getEdit');
    Route::post('/seat_price/edit/{id}',         'Seat_priceController@postEdit');
    Route::get('/room/fast',               'RoomController@getFast');
    Route::post('/room/fast',               'RoomController@postFast');
    Route::get('/floor/add',               'FloorController@getAdd');
    Route::post('/floor/add',               'FloorController@postAdd');
    //end  xuchunlong
});

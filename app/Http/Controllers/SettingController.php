<?php

namespace App\Http\Controllers;

use App\Eloquents\Setting;

class SettingController extends \BaseController
{
    public function postProtocol()
    {
        $array = [
            'result'  => true,
            'message' =>'成功',
            'data'    => '',
        ];

        $array1 = [
            'protocol' => '',
        ];

        $result = Setting::select('value')
                         ->where('key', '=', 'protocol')
                         ->orderBy('id','desc')
                         ->first();

        $result_1 = $result->toArray();

        $array1['protocol'] = $result_1['value'];

        $array['data'] = $array1;

        return $array;
    }

    public function postAboutus()
    {
        $array = [
            'result'  => true,
            'message' => '成功',
            'data'    => '',
        ];

        $array1 = [
            'about_us' => '',
        ];

        $result = Setting::select('value')
                         ->where('key', '=', 'about_us')
                         ->orderBy('id','desc')
                         ->first();

        $result_1 = $result->toArray();

        $array1['about_us'] = $result_1['value'];

        $array['data'] = $array1;

        return $array;
    }

    public function postWifi()
    {
        $array = [
            'result'  => true,
            'message' => '成功',
            'data'    => '',
        ];

        $array1 = [
            'wifi_pw'=>'',
        ];

        $result = Setting::select('value')
                         ->where('key', '=', 'wifi_pw')
                         ->orderBy('id','desc')
                         ->first();

        $result_1 = $result->toArray();

        $array1['wifi_pw'] = $result_1['value'];

        $array['data'] = $array1;

        return $array;
    }

    public function postInfoIos()
    {
        $array = [
            'result'  => true,
            'message' => '成功',
            'data'    => '',
        ];

        $result = Setting::select('value')
                         ->where('key', '=', 'ios')
                         ->orderBy('id','desc')
                         ->first();

        $result->value;

        $array['data'] = json_decode($result->value,true);

        return $array;
    }

    public function postInfoAnd()
    {
        $array = [
            'result'  => true,
            'message' => '成功',
            'data'    => '',
        ];

        $result = Setting::select('value')
                         ->where('key', '=', 'android')
                         ->orderBy('id','desc')
                         ->first();

        $result->value;

        $array['data'] = json_decode($result->value,true);

        return $array;
    }
}

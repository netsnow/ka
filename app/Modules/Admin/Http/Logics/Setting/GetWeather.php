<?php

namespace App\Modules\Admin\Http\Logics\Setting;

use App\Eloquents\Setting;
use Request;

class GetWeather extends \BaseLogic
{
    protected function execute()
    {
        $this->getSetting();
    }

    protected function getSetting()
    {
        $getid = Setting::where('key','=','weather')
                        ->get();

        $id = $getid['0']['id'];

        $getWeather = Setting::find($id);

        $result1 = $getWeather['value'];

        $result = json_decode($result1,true);

        if (!$getWeather) {
            abort(404, '没有这个说明');
        }

        $this->result = $result;
    }
}

<?php

namespace App\Modules\Admin\Http\Logics\Setting;

use App\Eloquents\Setting;
use Request;

class GetEditionIos extends \BaseLogic
{
    protected function execute()
    {
        $this->getSetting();
    }

    protected function getSetting()
    {
        $getid = Setting::where('key','=','ios')
                        ->get();

        $id = $getid['0']['id'];

        $getEditionIos = Setting::find($id);

        $result1 = $getEditionIos['value'];

        $result = json_decode($result1,true);

        if (!$getEditionIos) {
            abort(404, '没有这个说明');
        }

        $this->result = $result;
    } 
}

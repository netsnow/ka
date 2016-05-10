<?php

namespace App\Modules\Admin\Http\Logics\Setting;

use App\Eloquents\Setting;
use Request;

class GetWifi extends \BaseLogic
{
    protected function execute()
    {
        $this->getSetting();
    }

    protected function getSetting()
    {
        $getid = Setting::where('key','=','wifi_pw')
                        ->get();

        $id = $getid['0']['id'];

        $getwifi = Setting::find($id);

        if (!$getwifi) {
            abort(404, '没有这个说明');
        }

        $this->result['setting'] = $getwifi;
    }
}

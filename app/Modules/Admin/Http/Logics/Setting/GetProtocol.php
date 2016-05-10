<?php

namespace App\Modules\Admin\Http\Logics\Setting;

use App\Eloquents\Setting;
use Request;

class GetProtocol extends \BaseLogic
{
    protected function execute()
    {
        $this->getSetting();
    }

    protected function getSetting()
    {
        $getid = Setting::where('key','=','protocol')
                        ->get();

        $id = $getid['0']['id'];

        $getprotocol = Setting::find($id);

        if (!$getprotocol) {
            abort(404, '没有这个说明');
        }

        $this->result = $getprotocol;
    }
}

<?php

namespace App\Modules\Admin\Http\Logics\Setting;

use App\Eloquents\Setting;
use Request;

class GetStoreCode extends \BaseLogic
{
    protected function execute()
    {
        $this->getSetting();
    }

    protected function getSetting()
    {
        $getid = Setting::where('key','=','store')
                        ->get();

        $id = $getid['0']['id'];

        $getStore = Setting::find($id);

        $result1 = $getStore['value'];

        $result = json_decode($result1,true);

        if (!$getStore) {
            abort(404, '没有这个说明');
        }

        $this->result = $result;
    }
}

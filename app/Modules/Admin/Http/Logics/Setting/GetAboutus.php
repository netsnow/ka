<?php

namespace App\Modules\Admin\Http\Logics\Setting;

use App\Eloquents\Setting;
use Request;

class GetAboutus extends \BaseLogic
{
    protected function execute()
    {
        $this->getSetting();
    }

    protected function getSetting()
    {
        $getid = Setting::where('key','=','about_us')
                        ->get();

        $id = $getid['0']['id'];

        $getaboutus = Setting::find($id);

        if (!$getaboutus) {
            abort(404, '没有这个说明');
        }

        $this->result = $getaboutus;
    }
}

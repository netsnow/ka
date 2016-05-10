<?php

namespace App\Modules\Admin\Http\Logics\Ad;

use App\Eloquents\Ad;
use Request;

class Appointment extends \BaseLogic
{
    protected function execute()
    {
        $this->getAdList();
    }
    
    protected function getAdList()
    {	
        /* $result = Ad::select('ad_pic')
                      ->where('room_id', '=', Request::input('room_id'))
                      ->where('is_show', '=', '1')
                      ->orderBy('sort_order','desc')
                      ->get(); */
        $result = Ad::where('is_show', '=', '1')
                      ->orderBy('sort_order','asc')
                      ->get();
        $this->result['fangjian'] = Request::input('room_id');
        $this->result['ads'] = $result;
    }
}


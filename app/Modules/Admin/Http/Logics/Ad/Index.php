<?php

namespace App\Modules\Admin\Http\Logics\Ad;

use App\Eloquents\Room;

class Index extends \BaseLogic
{
    protected function execute()
    {
        $this->getAdList();
    }
    
    protected function getAdList()
    {	
        $result = Room::select('room_id','room_num')
                        ->orderBy('room_id','desc')
                        ->get();
        $this->result['rooms'] = $result;
    }
}

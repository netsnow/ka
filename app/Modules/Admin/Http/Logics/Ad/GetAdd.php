<?php

namespace App\Modules\Admin\Http\Logics\Ad;

use App\Eloquents\Room;
use Request;
use Exception;

class GetAdd extends \BaseLogic
{
    protected function execute()
    {
        $this->getRoom();
    }
    
    protected function getRoom()
    {
        $getRoom=Room::all();
        $this->result['room']=$getRoom;
    }
}
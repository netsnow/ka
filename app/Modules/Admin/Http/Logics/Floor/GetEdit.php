<?php

namespace App\Modules\Admin\Http\Logics\Floor;

use App\Eloquents\Floor;
use App\Eloquents\Store;
use Request;

class GetEdit extends \BaseLogic
{
    protected function execute()
    {
        $this->getFloor();
    }

    protected function getFloor()
    {
        $getFloor = Floor::find($this->floorId);
       
      
        
        if (!$getFloor) {
            abort(404, '没有这个楼层');
        }

        $this->result['floor'] = $getFloor;
    }
}

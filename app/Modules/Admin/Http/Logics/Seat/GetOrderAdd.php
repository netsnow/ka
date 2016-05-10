<?php

namespace App\Modules\Admin\Http\Logics\Seat;

use App\Eloquents\Seat;
use Exception;
use Request;

class GetOrderAdd extends \BaseLogic
{
    protected function execute()
    {
        $this->addOrder();
    }
    
    protected function addOrder()
    {
        $sd=Request::input('start_date');
        $lt=Request::input('lease_time');
        $ed=date('Y-m-d' ,strtotime($sd)+$lt*30*24*3600);
        $q=Request::input('seat_id');
        $result=Seat::find($q);
        $this->result['seat']=$result;
        $this->result['startdate']=$sd;
        $this->result['enddate']=$ed;
        $this->result['lt']=$lt;
    }
}

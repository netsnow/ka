<?php

namespace App\Modules\Admin\Http\Logics\Seat;

use App\Eloquents\Seat;
use Exception;
use Request;

class Order_add extends \BaseLogic
{
    protected function execute()
	{
		$this->addOrder();
	}
	
	protected function addOrder()
	{
	    $q=Request::input('seat_id');
	    $result=Seat::find($q);
		$this->result['seat']=$result;
	    
	}
}

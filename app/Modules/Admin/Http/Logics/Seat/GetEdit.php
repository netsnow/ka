<?php

namespace App\Modules\Admin\Http\Logics\Seat;

use App\Eloquents\Floor;
use App\Eloquents\Seat;
use Request;

class GetEdit extends \BaseLogic
{
	protected function execute()
	{
		$this->getSeat();
		$this->getFloorList();
	
	}

	protected function getSeat()
	{    $seat_id=$this->seat_id;
		 $result=Seat::where('seat_id','=',$seat_id)->first();
		 
		 $this->result['seat'] = $result;
	}
	protected function getFloorList()
	{
		$result = Floor::all();
		$this->result['floor'] = $result;
	
	}
}
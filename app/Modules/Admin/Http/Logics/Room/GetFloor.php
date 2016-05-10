<?php

namespace App\Modules\Admin\Http\Logics\Room;

use Illuminate\Support\Facades\DB;
use App\Eloquents\Floor;
use App\Eloquents\Seat_price;
use Request;

class GetFloor extends \BaseLogic
{
	protected function execute()
	{	
		$this->getFloorList();	
		$this->getSeat_price();
	}
	protected function getFloorList()
	{
		$result = Floor::all();
		$this->result['floor'] = $result;
		
	}
	
	protected function getSeat_price()
	{
		$getSeat_price=Seat_price::all();
		$this->result['seat_price']=$getSeat_price;
	}
}
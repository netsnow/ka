<?php

namespace App\Modules\Admin\Http\Logics\Seat;

use Illuminate\Support\Facades\DB;
use App\Eloquents\Room;
use Request;

class GetRoom extends \BaseLogic
{
	protected function execute()
	{
		
		$this->getRoomList();
		
	}
	protected function getRoomList()
	{
		$result1 = Room::where('floor_id','=',request::input('floor_id'))
		->where('room_type','workshop')->get();
		$result=json_encode($result1);
		
		$this->result = $result;
		
	}
}
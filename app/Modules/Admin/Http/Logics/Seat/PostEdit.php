<?php

namespace App\Modules\Admin\Http\Logics\Seat;

use App\Eloquents\Seat;
use App\Eloquents\Room;
use Request;
use Validator;
use Exception;
use DB;

class PostEdit extends \BaseLogic
{
	protected function execute()
	{
		try {
			$this->validate();
			$this->saveSeat();
	
			$this->result['result'] = true;
	
		} catch (Exception $e) {
	
			$this->result['result'] = false;
			$this->result['message'] = $e->getMessage();
	
		}
		
	}
	protected function validate()
	{
		$validator = Validator::make(Request::all(), [
				
				]);
	
		if ($validator->fails()) {
			throw new Exception($validator->messages()->first());
		}
	}
	protected function saveSeat()
	{
	    $room_type=Room::select('room_type')->where('room_id','=',Request::input('room_id'))->first();
        if($room_type['room_type']!='workshop'){
            throw new Exception('该房间不是工作间不能添加工位');
        }
		
		$seat_id=$this->seat_id;
	
		$room_id = Request::input('room_id');
	    $result=Seat::where('seat_id','=',$seat_id)
	               ->where('room_id','=',$room_id)
		           ->get()->toArray();
	    if($result==""||$result==null){
	    	{
		DB::table('seat')
		->where('seat_id', $seat_id)
		->update(array('room_id' => $room_id));
		
		
		$this->result['message'] = '房间修改成功';
	    	}
	    }else{
	    	throw new Exception('该房间已存在该座位号');
	    }
		
	}
}
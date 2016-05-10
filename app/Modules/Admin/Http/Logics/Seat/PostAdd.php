<?php

namespace App\Modules\Admin\Http\Logics\Seat;

use App\Eloquents\Seat;
use App\Eloquents\Room;
use Exception;
use Request;
use Validator;

class PostAdd extends \BaseLogic
{
	protected function execute()
	{  
		 try {
	
			$this->validate();
			 $this->saveSeat();
	
			$this->result['result'] = true;
	
		} catch (Exception $e) {
	
			$this->result['result']  = false;
			$this->result['message'] = $e->getMessage();
	
		} 
	}
	protected function validate()
	{
		$validator = Validator::make(Request::all(), [
				'seat_name'  => 'required|max:50',
				'room_id'  => 'required|numeric',
				]);
	
		if ($validator->fails()) {
			throw new Exception($validator->messages()->first());
		}
	}
	protected function saveSeat()
	{
	
		$seat_name=Request::input('seat_name');	
		
		if($seat_name==null||$seat_name=="")
		{
			 throw new Exception('请输入座位名称');
			return;
		}
		$room_id=Request::input('room_id');
	
		$result1=Seat::where('room_id','=',$room_id)
		            ->where('seat_name','=',$seat_name)
		            ->get();
		$result=$result1->toArray();
		
		if($result==null||$result=="")
		{
            $room_type=Room::select('room_type')->where('room_id','=',Request::input('room_id'))->first();
            if($room_type['room_type']!='workshop'){
            throw new Exception('该房间不是工作间不能添加工位');
            }
    		$newSeat = new Seat();
    		$newSeat->seat_name = Request::input('seat_name');
    		$newSeat->room_id = Request::input('room_id');
    		$newSeat->save();
         	$this->result['message'] = '座位添加成功';
		}else{
		
			 throw new Exception('座位已经存在');
		}
	}
}
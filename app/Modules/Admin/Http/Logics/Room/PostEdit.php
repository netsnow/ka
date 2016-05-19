<?php

namespace App\Modules\Admin\Http\Logics\Room;

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
			$this->saveRoom();

			$this->result['result'] = true;

		} catch (Exception $e) {

			$this->result['result'] = false;
			$this->result['message'] = $e->getMessage();

		}

	}
	protected function validate()
	{
		$validator = Validator::make(Request::all(), [
				'room_num'  => 'required|max:50',
				//'room_size'  => 'required',
				'room_descript'   => 'max:225',
				//'room_price'  => 'required',
				]);

		if ($validator->fails()) {
			throw new Exception($validator->messages()->first());
		}

		// 判断id是否存在
		$this->room = Room::find($this->room_id);
		if (!$this->room) {
			throw new Exception('房间不存在');
		}
	}
	protected function saveRoom()
	{



		$room_id=$this->room_id;

		$room_size = Request::input('room_size');
		$room_type = Request::input('room_type');
		$room_price = Request::input('room_price');
		$seat_type_id = Request::input('seat_type');

		if (Request::has('room_descript')) {
			$room_descript = Request::input('room_descript');
		}else{
        	$room_descript='';
        }
       	if (Request::hasFile('room_pic'))
		{
			$targetDir = public_path() . '/data/uploads';
			$newName   = time() . '_' . rand( 1 , 1000000 ) . ".png";
			Request::file('room_pic')->move($targetDir, $newName);
			$floor_pic = '/data/uploads/' . $newName;

		}else{
            	$resulturl=Room::where('room_id',$room_id)->get();
                $floor_pic=$resulturl[0]['room_url'];
        }

		/* DB::table('room')
		->where('room_id', $room_id)
		->update(array('room_size' => $room_size,'room_type' => $room_type,'room_url' => $floor_pic,'room_descript' => $room_descript,'seat_type_id' => $seat_type_id,'room_price' => $room_price));


		$this->result['message'] = '房间修改成功'; */

		$this->room->room_size = $room_size;
		$this->room->room_type = $room_type;
		$this->room->room_url = $floor_pic;
		$this->room->room_descript = $room_descript;
		if(Request::has('seat_type') && Request::input('room_type')=='workshop'){
			$this->room->seat_type_id = $seat_type_id;
		}
		if(Request::input('room_type')!='workshop'){
			$this->room->seat_type_id = 0;
		}
		$this->room->room_price = $room_price;
		$this->room->save();

		$this->result['message'] = '卡机编辑成功';


	}
}

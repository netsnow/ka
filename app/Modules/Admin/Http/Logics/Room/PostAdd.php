<?php

namespace App\Modules\Admin\Http\Logics\Room;

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
			$this->saveRoom();

			$this->result['result'] = true;

		} catch (Exception $e) {

			$this->result['result']  = false;
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
				//'seat_type' => 'required',
				]);

		if ($validator->fails()) {
			throw new Exception($validator->messages()->first());
		}
	}
	protected function saveRoom()
	{

        if (Request::hasFile('room_pic'))
		{
			$targetDir = public_path() . '/data/uploads';
			$newName   = time() . '_' . rand( 1 , 1000000 ) . ".png";
			Request::file('room_pic')->move($targetDir, $newName);
			$floor_pic = '/data/uploads/' . $newName;

		}
		$room_num=Request::input('room_num');
		$result1=Room::where('room_num','=',$room_num)
		            ->get();
		$result=$result1->toArray();

		if($result==null||$result=="")
		{

		$newRoom = new Room();
		$newRoom->room_num = Request::input('room_num');
		$newRoom->room_size = Request::input('room_size');
		$newRoom->room_type = Request::input('room_type');

		$newRoom->room_price = Request::input('room_price');

		$newRoom->floor_id = Request::input('floor_id');

		if(Request::has('seat_type') && Request::input('room_type')=='workshop'){
		$newRoom->seat_type_id = Request::input('seat_type');
		}
		if(Request::input('room_type')!='workshop')
			$newRoom->seat_type_id = 0;

        if(Request::hasFile('room_pic')){
            $newRoom->room_url= $floor_pic;
        }
		if (Request::has('room_descript')) {
			$newRoom->room_descript = Request::input('room_descript');
		}

		$newRoom->save();

		$this->result['message'] = '卡机添加成功';
		}else{

			$this->result['message'] = '该卡机已存在';
		}
	}
}

<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Room;

class RoomController extends \BaseController
{
	public function __construct()
	{
		view()->share('active', 'room');
	}
	public function getIndex()
	{
		$logic = new Room\GetIndex();
		$result = $logic->run();
	
		if ($result['redirect'] === true) {
			return redirect($result['redirectUrl']);
		}
	
		return view(tpl('admin.room.room_list'))->with('result', $result);
	}
	public function apiDelete()
	{
		$logic = new Room\ApiDelete();
		$result = $logic->run();
	
		return $result;
	}
	public function getAdd()
	{	
		$logic = new Room\GetFloor();
		$result = $logic->run();
			
		return view(tpl('admin.room.add'))->with('result', $result);
	}
	public function postAdd()
	{
		$logic = new Room\PostAdd();
		$result = $logic->run();
		
		return $result;
	}
	public function getEdit($room_id)
	{
	
		$logic = new Room\GetEdit();
		$logic->set('room_id', $room_id);
		$result = $logic->run();

		return view(tpl('admin.room.edit'))->with('result', $result);
	}
	public function postEdit($room_id)
	{   
		$logic = new Room\PostEdit();
		$logic->set('room_id', $room_id);
		$result = $logic->run();
	
		return $result;
	}
	public function getFast()
	{		
			
		return view(tpl('admin.room.fast'));
	}
	public function postFast()
	{  
		$logic = new Room\PostFast();
		$result = $logic->run();
		
		return $result;
	}
	
}
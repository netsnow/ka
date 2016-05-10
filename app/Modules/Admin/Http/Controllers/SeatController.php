<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Seat;

class SeatController extends \BaseController
{
	public function __construct()
	{
		view()->share('active', 'seat');
	}
	public function getIndex()
	{
		$logic = new Seat\GetIndex();
		$result = $logic->run();
		if ($result['redirect'] === true) {
			return redirect($result['redirectUrl']);
		}
		
		return view(tpl('admin.seat.seat_list'))->with('result', $result);
		
	}
	public function postDelete()
	{
		$logic = new seat\PostDelete();
		$result = $logic->run();
	
		return $result;
	}
	public function getAdd()
	{
		$logic = new Seat\GetFloor();
		$result = $logic->run();
			
		return view(tpl('admin.seat.add'))->with('result', $result);
	}
	public function getRoom()
	{  
		$logic = new Seat\GetRoom();
		$result = $logic->run();
			
		return $result;
	}
	public function postAdd()
	{
		$logic = new Seat\PostAdd();
		$result = $logic->run();
	
		return $result;
	}
	public function getEdit($seat_id)
	{
	
		$logic = new Seat\GetEdit();
		$logic->set('seat_id', $seat_id);
		$result = $logic->run();
	
		return view(tpl('admin.seat.add'))->with('result', $result);
	}
	public function postEdit($seat_id)
	{
		$logic = new Seat\PostEdit();
		$logic->set('seat_id', $seat_id);
		$result = $logic->run();
	
		return $result;
	}
	public function getFast()
	{
			
		return view(tpl('admin.seat.fast'));
	}
	public function postFast()
	{
		$logic = new Seat\PostFast();
		$result = $logic->run();
	
		return $result;
	}
	
	public function getAddOrder()
	{
		$logic= new Seat\GetOrderAdd();
		$result=$logic->run();
		return view(tpl('admin.seat.add_order'))->with('result', $result);
	}
	
	public function postAddOrder()
	{
		$logic=new Seat\PostOrderAdd();
		$result=$logic->run();
		return $result;
	}
}
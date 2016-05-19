<?php

namespace App\Modules\Admin\Http\Logics\Room;

use App\Eloquents\Floor;
use App\Eloquents\Seat_price;
use App\Eloquents\Room;
use Request;

class GetEdit extends \BaseLogic
{
	protected function execute()
	{
		$this->getFloorList();
		$this->getRoom();
		$this->getFloor();
	    $this->getRoomtype();
	    $this->getSeat_price();
	}
	protected function getFloorList()
	{
		$result = Floor::all();
		$this->result['floor'] = $result;

	}
	protected function getRoom()
	{    $room_id=$this->room_id;
		 $result=Room::where('room_id','=',$room_id)->get()->first();
		 $id = $result->toArray()['seat_type_id'];
		 //根据room表中的seat_type_id在seat_price中找name
		 $result1 = Seat_price::where('seat_type_id','=',$id)->first();
		 $this->result['findseatname'] = $result1;
		 $this->result['room'] = $result;
	}
	protected function getFloor()
	{   $room_id=$this->room_id;
	    $floor_id=Room::select('floor_id')->where('room_id','=',$room_id)->get();
	    $floor=$floor_id->toArray();
	    $floorid=$floor['0']['floor_id'];
		$result = Floor::find($floorid);

		$this->result['floorone'] = $result;

	}
    protected function getRoomtype()
	{
        $room_id=$this->room_id;
		$result=Room::where('room_id','=',$room_id)->first();
		if($result['room_type']=='boardroom'){
            $this->result['get_room'] = '会议室';
        }
        elseif($result['room_type']=='workshop'){
            $this->result['get_room'] = '工作间';
        }
        elseif($result['room_type']=='photography'){
            $this->result['get_room'] = '摄影棚';
        }
        elseif($result['room_type']=='roadshow'){
            $this->result['get_room'] = '路演厅';
        }else{
            $this->result['get_room'] = $result['room_type'];
        }
    }
    protected function getSeat_price()
    {
    	$getSeat_price=Seat_price::all();
    	$this->result['seat_price']=$getSeat_price;
    }
}

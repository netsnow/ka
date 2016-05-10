<?php

namespace App\Modules\Admin\Http\Logics\Room;

use App\Eloquents\Room;
use App\Eloquents\Seat;
use App\Eloquents\Booking;
use Exception;
use Request;

class ApiDelete extends \BaseLogic
{
	protected function execute()
	{
		try {

			$this->validate();
			$this->deleteroom();

			$this->result['result'] = true;

		} catch (Exception $e) {

			$this->result['result']  = false;
			$this->result['message'] = $e->getMessage();

		}
	}

	protected function validate()
	{
		foreach (Request::input('room_id') as $value) {
			if (!is_numeric($value)) {
				throw new Exception('system error');
			}
		}
	}

	/**
	 * 删除品牌
	 * @return void
	 */
	protected function deleteroom()
	{
		//有订单不能删room
		
		//有工位不能删除room
        $room_seat=0;
        $room_order = 0;
        $room_id_item=Request::input('room_id');
        $room_id_num=count($room_id_item);
        for($i=0;$i<$room_id_num;$i++){
            $Seat=Seat::where('room_id','=',$room_id_item[$i])
                 ->get()->toArray();
            if(!empty($Seat)){
                $room_seat=1;
            }
        }
        if($room_seat==1){
            throw new Exception('该房间有工位不能删除');
        } 
        
        for($j=0;$j<$room_id_num;$j++){
        	$result = Booking:: select('order_id')
                             ->whereHas('order', function($query) 
                             {
                                 $query->where('order_type', '=', 'room')
                                       ->where(function($query2) {
                                            $query2->orWhere('status', '=', 1)
                                                   ->orWhere(function($query3) {
                                                        $query3->where('status', '=', 0)
                                                               ->where('created_at', '>', date('Y-m-d H:i:s', time() - 600));
                                                    });
                                         });
                             })
                             ->where('booking_type', '=', 'room')
                             ->where('end_time','>',date('H:m:d H:m:s',time()))
                             
                             ->where('item_id',$room_id_item[$j])
                             ->get()
                             ->toArray();
                             
        	if(!empty($result)){
        		$room_order=1;
        	}
        }
        if($room_order==1){
        	throw new Exception('该房间已出租不能删除');
        }
         
        
        Room::destroy(Request::input('room_id'));
            $this->result['message'] = '房间删除成功';
        
	}
}

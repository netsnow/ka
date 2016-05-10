<?php

namespace App\Modules\Admin\Http\Logics\Seat_price;

use App\Eloquents\Seat_price;
use App\Eloquents\Room;
use Exception;
use Request;

class ApiDelete extends \BaseLogic
{
    protected function execute()
    {
        try {
            $this->validate();
            $this->deleteSeat_price();
            $this->result['result'] = true;
        }
        catch (Exception $e) {
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
        }
    }

    protected function validate()
    {
        foreach (Request::input('seat_price_id') as $value) {
            if (!is_numeric($value)) {
                throw new Exception('system error');
            }
        }
    }

    protected function deleteSeat_price()
    {
    	$seat_price_room=0;
    	$seat_price_id_item=Request::input('seat_price_id');
    	$seat_price_id_num=count($seat_price_id_item);
    	for($i=0;$i<$seat_price_id_num;$i++){
    		$room=Room::where('seat_type_id','=',$seat_price_id_item[$i])
    		->get()->toArray();
    		if(!empty($room)){
    			$seat_price_room=1;
    		}
    	}
    	if($seat_price_room==1){
    		throw new Exception('该工位类型有工作间绑定不能删除');
    	}
    	else{
    		Seat_price::destroy(Request::input('seat_price_id'));
        	$this->result['message'] = '工位类型删除成功';
    	}   
    }
}

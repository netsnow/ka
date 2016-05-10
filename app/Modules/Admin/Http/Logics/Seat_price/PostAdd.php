<?php

namespace App\Modules\Admin\Http\Logics\Seat_price;

use App\Eloquents\Seat_price;
use Exception;
use Request;
use Validator;

class PostAdd extends \BaseLogic
{
    protected function execute()
    {
    	if(Request::has('seat_price_price'))
    	{
    		if(!is_numeric(Request::input('seat_price_price')) ){
    			$this->result['message'] = '输入的价格不为数字';
    			return;
    		}
    		if(Request::input('seat_price_price') < 0 )
    		{
    			$this->result['message'] = '输入的价格小于0';
    			return;
    		}
    		if(Request::input('seat_price_price') == 0 )
    		{
    			$this->result['message'] = '输入的价格等于0';
    			return;
    		}
    	}
        try {
            $this->validate();
            $this->saveSeat_price();
            $this->result['result'] = true;
        } catch (Exception $e) {
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
        }
    }

    protected function validate()
    {
        $validator = Validator::make(Request::all(), [
            'seat_price_name'  => 'required|max:50',]);
        if ($validator->fails()) {
            throw new Exception($validator->messages()->first());
        }
        // 判断事件名是否已经存在
        $getSeat_price = Seat_price::where('seat_type_name', Request::input('seat_price_name'))
        ->first();
        if ($getSeat_price) {
        	throw new Exception('工位类型已经存在');
        }
    }

    protected function saveSeat_price()
    {
        $newSeat_price = new Seat_price;
        $newSeat_price->seat_type_name = Request::input('seat_price_name');
        $newSeat_price->seat_price = Request::input('seat_price_price');
        $newSeat_price->save();
        $this->result['message'] = '工位类型添加成功';
    }
}

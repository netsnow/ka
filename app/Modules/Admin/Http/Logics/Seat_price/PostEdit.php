<?php

namespace App\Modules\Admin\Http\Logics\Seat_price;

use App\Eloquents\Seat_price;
use Exception;
use Request;
use Validator;

class PostEdit extends \BaseLogic
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
            'seat_price_name'  => 'required|max:50',
        	'seat_price_price'  => 'required|max:20',
        ]);
        if ($validator->fails()) {
            throw new Exception($validator->messages()->first());
        }
        // 判断id是否存在
        $this->seat_price = Seat_price::find($this->seat_priceId);
        if (!$this->seat_price) {
            throw new Exception('工位类型不存在');
        }
        // 判断事件名是否已经存在
        $getSeat_price = Seat_price::where('seat_type_name', Request::input('seat_price_name'))
                         ->whereRaw('seat_type_id != '.$this->seat_priceId)
                         ->first();
        if ($getSeat_price) {
            throw new Exception('工位类型已经存在');
        }
    }

    protected function saveSeat_price()
    {
        $this->seat_price->seat_type_name = Request::input('seat_price_name');
        $this->seat_price->seat_price = Request::input('seat_price_price');
        $this->seat_price->save();
        $this->result['message'] = '工位类型编辑成功';
    }
}

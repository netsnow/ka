<?php

namespace App\Modules\Admin\Http\Logics\Charging_price;

use App\Eloquents\Charging_price;
use Exception;
use Request;
use Validator;

class PostEdit extends \BaseLogic
{
    protected function execute()
    {
    	if(Request::has('charging_price_price'))
    	{
    		if(!is_numeric(Request::input('charging_price_price')) ){
    			$this->result['message'] = '输入的价格不为数字';
    			return;
    		}
    		if(Request::input('charging_price_price') < 0 )
    		{
    			$this->result['message'] = '输入的价格小于0';
    			return;
    		}
    	}
        try {
            $this->validate();
            $this->saveCharging_price();
            $this->result['result'] = true;
        } catch (Exception $e) {
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
        }
    }

    protected function validate()
    {
        $validator = Validator::make(Request::all(), [
            'charging_price_name'  => 'required|max:50',
        	'charging_price_price'  => 'required|max:20',
        ]);
        if ($validator->fails()) {
            throw new Exception($validator->messages()->first());
        }
        // 判断id是否存在
        $this->charging_price = Charging_price::find($this->charging_priceId);
        if (!$this->charging_price) {
            throw new Exception('事件不存在');
        }
        // 判断事件名是否已经存在
        $getCharging_price = Charging_price::where('charging_type_name', Request::input('charging_price_name'))
                         ->whereRaw('charging_type_id != '.$this->charging_priceId)
                         ->first();
        if ($getCharging_price) {
            throw new Exception('事件已经存在');
        }
    }

    protected function saveCharging_price()
    {
        $this->charging_price->charging_type_name = Request::input('charging_price_name');
        $this->charging_price->charging_price = Request::input('charging_price_price');
        $this->charging_price->describe = Request::input('describe');
        $this->charging_price->save();
        $this->result['message'] = '事件编辑成功';
    }
}

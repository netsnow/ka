<?php

namespace App\Modules\Admin\Http\Logics\Charging_price;

use App\Eloquents\Charging_price;
use Exception;
use Request;
use Validator;

class PostAdd extends \BaseLogic
{
    protected function execute()
    {
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
            'charging_price_name'  => 'required|max:50',]);
        if ($validator->fails()) {
            throw new Exception($validator->messages()->first());
        }
    }

    protected function saveCharging_price()
    {
        $newCharging_price = new Charging_price;
        $newCharging_price->charging_type_name = Request::input('charging_price_name');
        $newCharging_price->charging_price = Request::input('charging_price_price');
        $newCharging_price->save();
        $this->result['message'] = '事件添加成功';
    }
}

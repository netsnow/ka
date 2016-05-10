<?php

namespace App\Modules\Admin\Http\Logics\Charging_price;

use App\Eloquents\Charging_price;
use Exception;
use Request;

class ApiDelete extends \BaseLogic
{
    protected function execute()
    {
        try {
            $this->validate();
            $this->deleteCharging_price();
            $this->result['result'] = true;
        }
        catch (Exception $e) {
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
        }
    }

    protected function validate()
    {
        foreach (Request::input('charging_price_id') as $value) {
            if (!is_numeric($value)) {
                throw new Exception('system error');
            }
        }
    }

    protected function deleteCharging_price()
    {
        Charging_price::destroy(Request::input('charging_price_id'));
        $this->result['message'] = '事件删除成功';
    }
}

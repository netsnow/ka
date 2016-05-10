<?php

namespace App\Modules\Admin\Http\Logics\Charging_price;

use App\Eloquents\Charging_price;
use Exception;

class GetEdit extends \BaseLogic
{
    protected function execute()
    {
        $this->getCharging_price();
    }

    protected function getCharging_price()
    {
        $getCharging_price = Charging_price::find($this->charging_priceId);
        if (!$getCharging_price) {
            abort(404, '没有这个事件');
        }
        $this->result['charging_price'] = $getCharging_price;
    }
}

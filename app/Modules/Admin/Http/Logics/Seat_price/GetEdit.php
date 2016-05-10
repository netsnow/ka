<?php

namespace App\Modules\Admin\Http\Logics\Seat_price;

use App\Eloquents\Seat_price;
use Exception;

class GetEdit extends \BaseLogic
{
    protected function execute()
    {
        $this->getSeat_price();
    }

    protected function getSeat_price()
    {
        $getSeat_price = Seat_price::find($this->seat_priceId);
        if (!$getSeat_price) {
            abort(404, '没有这个工位类型');
        }
        $this->result['seat_price'] = $getSeat_price;
    }
}

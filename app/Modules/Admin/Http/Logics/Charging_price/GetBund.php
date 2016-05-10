<?php

namespace App\Modules\Admin\Http\Logics\Charging_price;

use App\Eloquents\Equpt;
use Exception;

class GetBund extends \BaseLogic
{
    protected function execute()
    {
        $this->getEqupt();
    }

    protected function getEqupt()
    {
    	$getEqupt = Equpt::where('charging_type_id','=',$this->charging_priceId)->get();
        $this->result['equpt'] = $getEqupt;
        
    }
}

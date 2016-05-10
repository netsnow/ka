<?php

namespace App\Modules\Admin\Http\Logics\Goods;

use App\Eloquents\Goods;
use Exception;
use Request;

class GetCopy extends \BaseLogic
{
    protected function execute()
    {
        $this->getGoods();
    }


    protected function getGoods()
    {
        $getGoods = Goods::find($this->goodsid);

        $this->result['goods'] = $getGoods;
    }
}

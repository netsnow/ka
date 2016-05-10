<?php

namespace App\Modules\Admin\Http\Logics\Ad;

use App\Eloquents\Ad;
use Exception;
use Request;

class GetEdit extends \BaseLogic
{
    protected function execute()
    {
        $this->getAd();
    }

    /**
     * 取得广告信息
     * @return void
     */
    protected function getAd()
    {
        $getAd = Ad::find($this->adId);

        $this->result['ad'] = $getAd;
    }
}

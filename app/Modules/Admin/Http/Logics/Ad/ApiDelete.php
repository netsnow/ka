<?php

namespace App\Modules\Admin\Http\Logics\Ad;

use App\Eloquents\Ad;
use Exception;
use Request;

class ApiDelete extends \BaseLogic
{
    protected function execute()
    {
        try {

            $this->validate();
            $this->deleteAd();

            $this->result['result'] = true;

        } catch (Exception $e) {

            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();

        }
    }

    protected function validate()
    {
        foreach (Request::input('ad_id') as $value) {
            if (!is_numeric($value)) {
                throw new Exception('system error');
            }
        }
    }

    /**
     * 删除广告
     * @return void
     */
    protected function deleteAd()
    {
        Ad::destroy(Request::input('ad_id'));
        $this->result['message'] = '广告删除成功';
    }
}

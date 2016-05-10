<?php

namespace App\Modules\Admin\Http\Logics\Fact;

use App\Eloquents\Fact;
use Exception;
use Request;

class ApiDelete extends \BaseLogic
{
    protected function execute()
    {
        try {

            $this->validate();
            $this->deleteFact();

            $this->result['result'] = true;

        } catch (Exception $e) {

            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();

        }
    }

    protected function validate()
    {
        foreach (Request::input('fact_id') as $value) {
            if (!is_numeric($value)) {
                throw new Exception('system error');
            }
        }
    }

    protected function deleteFact()
    {
        Fact::destroy(Request::input('fact_id'));
        $this->result['message'] = '品牌删除成功';
    }
}

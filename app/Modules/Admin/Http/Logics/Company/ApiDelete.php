<?php

namespace App\Modules\Admin\Http\Logics\Company;

use App\Eloquents\Company;
use Exception;
use Request;

class ApiDelete extends \BaseLogic
{
    protected function execute()
    {
        try
        {
            $this->validate();
            $this->deleteCompany();
            $this->result['result'] = true;
        }
        catch (Exception $e)
         {
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
         }
    }

    protected function validate()
    {
        foreach (Request::input('company_id') as $value) {
            if (!is_numeric($value))
            {
                throw new Exception('system error');
            }
        }
    }

    protected function deleteCompany()
    {
        Company::destroy(Request::input('company_id'));
        $this->result['message'] = '班级删除成功';
    }
}

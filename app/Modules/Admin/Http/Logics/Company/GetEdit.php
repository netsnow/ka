<?php

namespace App\Modules\Admin\Http\Logics\Company;

use App\Eloquents\Company;
use Request;
use Exception;

class GetEdit extends \BaseLogic
{
    protected function execute()
    {
        $this->getCompany();
    }

    protected function getCompany()
    {
        $getCompany=Company::find($this->companyid);
        if(!$getCompany)
        {
            abort(404, '没有这个班级');
        }
        $this->result['company']=$getCompany;
    }
}

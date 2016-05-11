<?php

namespace App\Modules\Admin\Http\Logics\StudentManage;

use App\Eloquents\Company;
use Request;
use Exception;

class GetAdd extends \BaseLogic
{
    protected function execute()
    {
        $this->getCompany();
    }

    protected function getCompany()
    {
        $getCompany=Company::all();
        $this->result['company']=$getCompany;
    }
}

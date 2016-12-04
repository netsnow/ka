<?php

namespace App\Modules\Teacher\Http\Logics\Stumange;

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

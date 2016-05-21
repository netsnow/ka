<?php

namespace App\Modules\Admin\Http\Logics\UserManage;

use App\Eloquents\User;
use App\Eloquents\Company;
use Request;
use Exception;

class GetEdit extends \BaseLogic
{
    protected function execute()
    {
        $this->getUser();
    }

    protected function getUser()
    {
        $getUser=User::find($this->userid);
        if(!$getUser)
        {
            abort(404, '没有这个教师');
        }
        $getCompany=Company::all();
        $this->result['company']=$getCompany;
        $this->result['user']=$getUser;
    }
}

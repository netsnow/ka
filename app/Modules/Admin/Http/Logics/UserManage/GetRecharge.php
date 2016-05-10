<?php

namespace App\Modules\Admin\Http\Logics\UserManage;

use App\Eloquents\User;
use Request;
use Exception;

class GetRecharge extends \BaseLogic
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
            abort(404, '没有这个会员');
        }
        $this->result['user']=$getUser;
    }
}
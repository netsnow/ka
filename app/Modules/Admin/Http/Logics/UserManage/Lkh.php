<?php

namespace App\Modules\Admin\Http\Logics\UserManage;

use App\Eloquents\AccountHistory;
use App\Eloquents\User;
use Request;

class Lkh extends \BaseLogic
{
    protected function execute()
    {
        $this->init();
        $this->getLkhList();
    }

    protected function init()
    {
        $page       = (int) Request::input('page');
        $this->page = ($page < 1) ? 1 : $page;
        $this->result['redirect'] = false;
    }
    
    protected function getLkhList()
    {
        $user=User::find($this->userid);
       
        $result = AccountHistory::where('user_id',$this->userid)
                           ->where('ac_type',1)
                           ->orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);
        if ($this->page > $result->lastPage() && $result->lastPage() > 0) 
        {
            return $this->getRedirectUrl($result->lastPage());
        }
        $this->result['user']=$user;
        $this->result['history'] = $result;
    }

    protected function getRedirectUrl($lastPage)
    {
        $this->result['redirect'] = true;
        $query = [];
        foreach (Request::query() as $key => $value) 
        {
            if ($key !== 'page') 
            {
                $query[] = $key . '=' . $value;
            } 
            else 
            {
                $query[] = $key . '=' . $lastPage;
            }
        }
        $a = $this->userid;
        $this->result['redirectUrl'] = '/admin/usermanage/lkh/'.$a.'?'. implode('&', $query);
    }
}

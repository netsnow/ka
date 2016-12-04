<?php

namespace App\Modules\Teacher\Http\Logics\Stumange;

use App\Eloquents\Student;
use App\Eloquents\Order;
use Request;
use Auth;

class GetIndex extends \BaseLogic
{
    protected function execute()
    {
        $this->init();
        $this->getStudentList();
        
    }

    protected function init()
    {
        $page       = (int) Request::input('page');
        $this->page = ($page < 1) ? 1 : $page;
        $this->result['redirect'] = false;
    }

    protected function getStudentList()
    {   
        $classname = Auth::user()->company_name;
        if (Request::has('name'))
        {
            $result = Student::whereRaw('real_name like "%' . Request::input('name') . '%" and company_name = "' .$classname.'"')
                           ->orderBy('created_at', 'desc')
                           ->paginate(50);
        }
        else
        {
            $result = Student::whereRaw('company_name = "' . $classname.'"')
                           ->orderBy('created_at', 'desc')
                           ->paginate(50);
        }





        if ($this->page > $result->lastPage() && $result->lastPage() > 0)
        {
            return $this->getRedirectUrl($result->lastPage());
        }
        $this->result['students'] = $result;
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
        $this->result['redirectUrl'] = '/admin/studentmanage?' . implode('&', $query);
    }
}

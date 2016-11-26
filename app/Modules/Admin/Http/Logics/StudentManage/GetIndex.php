<?php

namespace App\Modules\Admin\Http\Logics\StudentManage;

use App\Eloquents\Student;
use App\Eloquents\Order;
use Request;

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
        if (Request::has('name')&&Request::has('class'))
        {
            $result = Student::whereRaw('real_name like "%' . Request::input('name') . '%" and company_name like "%' .Request::input('class') . '%"')
                           ->orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);
        }
        else if (Request::has('name')&&not(Request::has('class')))
        {
            $result = Student::whereRaw('real_name like "%' . Request::input('name') . '%"')
                           ->orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);
        }
        else if (not(Request::has('name'))&&Request::has('class'))
        {
            $result = Student::whereRaw('company_name like "%' . Request::input('class') . '%"')
                           ->orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);
        }
        else
        {
            $result = Student::with('order')
                           ->orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);

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

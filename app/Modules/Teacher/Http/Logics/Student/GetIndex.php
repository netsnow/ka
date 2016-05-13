<?php

namespace App\Modules\Teacher\Http\Logics\Student;

use App\Eloquents\Student;
use Request;
use Auth;
use Cache;
use Validator;
use Exception;
use DB;

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
      $company = Auth::user()->company_name;
      $qb= Student::where('company_name',$company);
      $result = $qb->orderBy('real_name', 'desc')
      ->paginate(50);
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
        $this->result['redirectUrl'] = '/teacher/teacherattedance?' . implode('&', $query);
    }
}

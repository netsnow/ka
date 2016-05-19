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
      $today = "20".date('ymd',time());
      $company = Auth::user()->company_name;
      $qb= Student::where('company_name',$company)
      ->leftjoin('checkin_data', function ($join) {
            $join->on('students.student_id', '=', 'checkin_data.user_id');
            //     ->where('students_checkin.checkin_date','=',$today);
        });
      //$checkin= StudentCheckin::where('students_checkin.checkin_date',$today);
      //$qb->leftjoin('students_checkin', 'students.student_id', '=', 'students_checkin.student_id');
         //->where('students_checkin.status',Null)
         //->where('students_checkin.checkin_date',$today);
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

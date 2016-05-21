<?php

namespace App\Modules\Teacher\Http\Logics\Student;

use App\Eloquents\Student;
use App\Eloquents\CheckinData;
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
      $student= Student::where('company_name',$company)->get();
      $checkin= CheckinData::whereRaw('floor(checkin_datetime/10000) ='.$today)->get();
      foreach($student as $key => $values){
        foreach($checkin as $valuec){
          if($values->student_id == $valuec->user_id){
            $student[$key]['logins'] = 1;
          }
        }
      }
      $result = $student;
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

<?php

namespace App\Modules\Admin\Http\Logics\StudentManage;

use App\Eloquents\Student;
use App\Eloquents\Company;
use Request;
use Exception;

class GetEdit extends \BaseLogic
{
    protected function execute()
    {
        $this->getStudent();
    }

    protected function getStudent()
    {
        $getStudent=Student::find($this->studentid);
        if(!$getStudent)
        {
            abort(404, '没有这个会员');
        }
        $getCompany=Company::all();
        $this->result['company']=$getCompany;
        $this->result['student']=$getStudent;
    }
}

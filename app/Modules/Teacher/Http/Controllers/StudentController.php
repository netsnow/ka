<?php

namespace App\Modules\Teacher\Http\Controllers;

use App\Modules\Teacher\Http\Logics\Student;
use Request;

class StudentController extends \BaseController
{

    public function __construct()
    {
        view()->share('active', 'student');
    }

    public function getIndex()
    {
        $logic = new Student\GetIndex();
        $result = $logic->run();
        echo "zz";
        return view(tpl('teacher.student.index'))->with('result', $result);
    }


}

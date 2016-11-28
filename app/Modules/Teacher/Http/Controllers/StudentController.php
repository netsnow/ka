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
        return view(tpl('teacher.student.index'))->with('result', $result);
    }
    public function getResign($studentid,$date)
    {
        $logic = new Student\GetResign();
        $logic->set('studentid', $studentid);
        $logic->set('date', $date);
        $result = $logic->run();
        return view(tpl('teacher.student.index'))->with('result', $result);
    }
    public function getDelsign($studentid,$date)
    {
        $logic = new Student\GetDelsign();
        $logic->set('studentid', $studentid);
        $logic->set('date', $date);
        $result = $logic->run();
        return view(tpl('teacher.student.index'))->with('result', $result);
    }
}

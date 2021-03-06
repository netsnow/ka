<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\StuReport;
use Request;

class StuReportController extends \BaseController
{

    public function __construct()
    {
        view()->share('active', 'stureport');
    }

    public function getIndex()
    {
        $logic = new StuReport\GetIndex();
        $result = $logic->run();
        if ($result['redirect'] === true)
        {
            return redirect($result['redirectUrl']);
        }
        return view(tpl('admin.stuReport.index'))->with('result', $result);
    }
    public function getDetail($student_id)
    {
        $logic = new StuReport\GetDetail();
        $logic->set('student_id', $student_id);
        $result = $logic->run();
        if ($result['redirect'] === true)
        {
            return redirect($result['redirectUrl']);
        }
        return view(tpl('admin.stuReport.detail'))->with('result', $result);
    }
    public function getExport($class,$month,$name)
    {
        $logic = new StuReport\GetExport();
        $logic->set('class', $class);
        $logic->set('month', $month);
        $logic->set('name', $name);
        $result = $logic->run();
    }

}

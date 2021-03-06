<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Report;
use Request;

class ReportController extends \BaseController
{

    public function __construct()
    {
        view()->share('active', 'report');
    }

    public function getIndex()
    {
        $logic = new Report\GetIndex();
        $result = $logic->run();
        if ($result['redirect'] === true)
        {
            return redirect($result['redirectUrl']);
        }
        return view(tpl('admin.report.index'))->with('result', $result);
    }
    public function getDetail($phone)
    {
        $logic = new Report\GetDetail();
        $logic->set('phone', $phone);
        $result = $logic->run();
        if ($result['redirect'] === true)
        {
            return redirect($result['redirectUrl']);
        }
        return view(tpl('admin.report.detail'))->with('result', $result);
    }
    public function getExport()
    {
        $logic = new Report\GetExport();
        $result = $logic->run();
    }

}

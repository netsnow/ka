<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Report;
use Request;

class ReportController extends \BaseController
{

    public function __construct()
    {
        view()->share('active', 'orders');
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


}

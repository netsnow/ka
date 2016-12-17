<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\LeaderReport;
use Request;

class LeaderReportController extends \BaseController
{

    public function __construct()
    {
        view()->share('active', 'leaderreport');
    }

    public function getIndex()
    {
        $logic = new LeaderReport\GetIndex();
        $result = $logic->run();
        if ($result['redirect'] === true)
        {
            return redirect($result['redirectUrl']);
        }
        return view(tpl('admin.leaderReport.index'))->with('result', $result);
    }
    public function getDetail($park_name)
    {
        $logic = new LeaderReport\GetDetail();
        $logic->set('park_name', $park_name);
        $result = $logic->run();
        if ($result['redirect'] === true)
        {
            return redirect($result['redirectUrl']);
        }
        return view(tpl('admin.leaderReport.detail'))->with('result', $result);
    }

}

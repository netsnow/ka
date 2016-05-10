<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Charging;

class ChargingController extends \BaseController
{
    public function __construct()
    {
        view()->share('active', 'charging');
    }

    public function getIndex()
    {
        $logic = new Charging\GetIndex();
        $result = $logic->run();
        if ($result['redirect'] === true)
        {
        	return redirect($result['redirectUrl']);
        }
        return view(tpl('admin.charging.index'))->with('result', $result);
    }
}

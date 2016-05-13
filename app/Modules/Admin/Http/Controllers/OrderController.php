<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Order;
use Request;

class OrderController extends \BaseController
{

    public function __construct()
    {
        view()->share('active', 'order');
    }

    public function getIndex()
    {
        $logic = new Order\GetIndex();
        $result = $logic->run();
        if ($result['redirect'] === true)
        {
            return redirect($result['redirectUrl']);
        }
        return view(tpl('admin.order.index'))->with('result', $result);
    }

    public function getImport()
    {
    	return view(tpl('admin.order.import'));
    }

    public function postImport()
    {
      $logic = new Order\PostImport();
    	$result = $logic->run();
    	return $result;
    }
}

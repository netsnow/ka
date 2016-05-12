<?php

namespace App\Modules\Teacher\Http\Controllers;

use App\Modules\Teacher\Http\Logics\Order;
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
        return view(tpl('teacher.order.index'))->with('result', $result);
    }

    public function getEdit($id)
    {
    	$logic = new Order\GetEdit();
    	$logic->set('orderid', $id);
    	$result = $logic->run();
    	return view(tpl('teacher.order.edit'))->with('result', $result);
    }

    public function postEdit($id)
    {
        $logic = new Order\PostEdit();
    	$logic->set('orderid', $id);
    	$result = $logic->run();
    	return $result;
    }
}

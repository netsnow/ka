<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Seat_price;

class Seat_priceController extends \BaseController
{
    public function __construct()
    {
        view()->share('active', 'seat_price');
    }
	
    public function getIndex()
    {
        $logic = new Seat_price\GetIndex();
        $result = $logic->run();
        if ($result['redirect'] === true)
        {
            return redirect($result['redirectUrl']);
        }
        return view(tpl('admin.seat_price.index'))->with('result', $result);
    }

    public function getAdd()
    {
        return view(tpl('admin.seat_price.add'));
    }

    public function getEdit($id)
    {
        $logic = new Seat_price\GetEdit();
        $logic->set('seat_priceId', $id);
        $result = $logic->run();
        return view(tpl('admin.seat_price.edit'))->with('result', $result);
    }

    public function postAdd()
    {
        $logic = new Seat_price\PostAdd();
        $result = $logic->run();
        return $result;
    }

    public function postEdit($id)
    {
        $logic = new Seat_price\PostEdit();
        $logic->set('seat_priceId', $id);
        $result = $logic->run();
        return $result;
    }

    /* 区别于form表单ajax请求的api，以下是无form专用api
    ============================================================== */
    public function apiDelete()
    {
        $logic = new Seat_price\ApiDelete();
        $result = $logic->run();
        return $result;
    }
}

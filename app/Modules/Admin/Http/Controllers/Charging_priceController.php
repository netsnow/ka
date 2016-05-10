<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Charging_price;

class Charging_priceController extends \BaseController
{
    public function __construct()
    {
        view()->share('active', 'charging_price');
    }
	
    public function getIndex()
    {
        $logic = new Charging_price\GetIndex();
        $result = $logic->run();
        if ($result['redirect'] === true)
        {
            return redirect($result['redirectUrl']);
        }
        return view(tpl('admin.charging_price.index'))->with('result', $result);
    }

    public function getAdd()
    {
        return view(tpl('admin.charging_price.add'));
    }

    public function getEdit($id)
    {
        $logic = new Charging_price\GetEdit();
        $logic->set('charging_priceId', $id);
        $result = $logic->run();
        return view(tpl('admin.charging_price.edit'))->with('result', $result);
    }

    public function postAdd()
    {
        $logic = new Charging_price\PostAdd();
        $result = $logic->run();
        return $result;
    }

    public function postEdit($id)
    {
        $logic = new Charging_price\PostEdit();
        $logic->set('charging_priceId', $id);
        $result = $logic->run();
        return $result;
    }
    
    public function getBund($id)
    {
    	$logic = new Charging_price\GetBund();
    	$logic->set('charging_priceId', $id);
    	$result = $logic->run();
    	return view(tpl('admin.charging_price.bund'))->with('result', $result);
    }
    
    public function postBund($id)
    {
    	$logic = new Charging_price\postBund();
    	$logic->set('charging_priceId', $id);
    	$result = $logic->run();
    	return $result;
    }

    /* 区别于form表单ajax请求的api，以下是无form专用api
    ============================================================== */
    public function apiDelete()
    {
        $logic = new Charging_price\ApiDelete();
        $result = $logic->run();
        return $result;
    }
}

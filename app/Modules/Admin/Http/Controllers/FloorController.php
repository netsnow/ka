<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Floor;

class FloorController extends \BaseController
{
    public function __construct()
    {
        view()->share('active', 'floor');
    }

    public function getIndex()
    {
        $logic = new Floor\GetIndex();
        $result = $logic->run();

        if ($result['redirect'] === true) {
            return redirect($result['redirectUrl']);
        }

        return view(tpl('admin.floor.index'))->with('result', $result);
    }

    public function getEdit($floorId)
    {
        $logic = new Floor\GetEdit();
        $logic->set('floorId', $floorId);
        $result = $logic->run();

        return view(tpl('admin.floor.edit'))->with('result', $result['floor'])->with('floor_store', $result['floor']);
    }

    public function postEdit($floorId)
    {
        $logic = new Floor\PostEdit();
        $logic->set('floorId', $floorId);
        $result = $logic->run();

        return $result;
    }

    public function apiDelete()
    {
        $logic = new Floor\ApiDelete();
        $result = $logic->run();

        return $result;
    }
    public function getAdd()
    {
    	return view(tpl('admin.floor.add'));
    }
    public function postAdd()
    {
    	$logic = new Floor\PostAdd();
        $result = $logic->run();

        return $result;
    }
}

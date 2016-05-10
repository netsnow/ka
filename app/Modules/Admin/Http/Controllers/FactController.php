<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Fact;

class FactController extends \BaseController
{
    public function getIndex()
    {
        $logic = new Fact\GetIndex();
        $result = $logic->run();

        if ($result['redirect'] === true) {
            return redirect($result['redirectUrl']);
        }

        return view(tpl('admin.fact.index'))->with('result', $result);
    }

    public function getAdd()
    {
        return view(tpl('admin.fact.add'));
    }

    public function getEdit($id)
    {
        $logic = new Fact\GetEdit();
        $logic->set('factId', $id);
        $result = $logic->run();

        return view(tpl('admin.fact.edit'))->with('result', $result);
    }

    public function postAdd()
    {
        $logic = new Fact\PostAdd();
        $result = $logic->run();

        return $result;
    }

    public function postEdit($id)
    {
        $logic = new Fact\PostEdit();
        $logic->set('factId', $id);
        $result = $logic->run();

        return $result;
    }

    /* 区别于form表单ajax请求的api，以下是无form专用api
    ============================================================== */
    public function apiDelete()
    {
        $logic = new Fact\ApiDelete();
        $result = $logic->run();

        return $result;
    }
}

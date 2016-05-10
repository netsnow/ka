<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\StudentManage;

class StudentManageController extends \BaseController
{
    public function __construct()
    {
      //左侧菜单的选择状态
        view()->share('active', 'usermanage');
    }

    public function getIndex ()
    {
        $logic=new StudentManage\GetIndex();
        $result=$logic->run();
        if ($result['redirect'] === true)
        {
            return redirect($result['redirectUrl']);
        }
        return view(tpl('admin.studentmanage.index'))->with('result', $result);
    }

    public function getAdd()
    {
    	$logic=new UserManage\GetAdd();
    	$result=$logic->run();
        return view(tpl('admin.usermanage.add'))->with('result', $result);
    }

    public function  postAdd()
    {
        $logic=new UserManage\PostAdd();
        $result=$logic->run();
        return $result;
    }

    public function apiDelete()
    {
        $logic = new UserManage\ApiDelete();
        $result = $logic->run();
        return $result;
    }

    public function getEdit($id)
    {
        $logic = new UserManage\GetEdit();
        $logic->set('userid', $id);
        $result = $logic->run();
        return view(tpl('admin.usermanage.edit'))->with('result', $result);
    }

    public function postEdit($id)
    {
        $logic = new UserManage\PostEdit();
        $logic->set('userid', $id);
        $result = $logic->run();
        return $result;
    }

    public function getRecharge($id)
    {
        $logic=new UserManage\GetRecharge();
        $logic->set('userid',$id);
        $result=$logic->run();
        return view(tpl('admin.usermanage.recharge'))->with('result', $result);
    }

    public function postRecharge($id)
    {
        $logic=new UserManage\PostRecharge();
        $logic->set('userid',$id);
        $result=$logic->run();
        return $result;
    }

    public function lkh ($id)
    {
        $logic=new UserManage\Lkh();
        $logic->set('userid',$id);
        $result=$logic->run();
        if ($result['redirect'] === true)
        {
            return redirect($result['redirectUrl']);
        }
        return view(tpl('admin.usermanage.lkh'))->with('result', $result);
    }
}

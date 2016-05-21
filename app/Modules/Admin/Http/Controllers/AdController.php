<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Ad;
use Request;

class AdController extends \BaseController
{
	public function __construct()
	{
		view()->share('active', 'ad');
	}

    /**
     * 显示幻灯片管理页
     * @return view 管理页的视图及第一页数据
     */
    public function getIndex()
    {
        $logic = new Ad\GetIndex();
        $result = $logic->run();
        if ($result['redirect'] === true) {
            return redirect($result['redirectUrl']);
        }

        return view(tpl('admin.ad.index'))->with('result', $result);
    }

    /**
     * 加载新建幻灯片页面
     * @return
     */
    public function getAdd()
    {
    	$logic = new Ad\GetAdd();
    	$result = $logic->run();
        return view(tpl('admin.ad.add'))->with('result', $result);
    }

    /**
     * 保存新建的幻灯片信息
     * @return 保存结果
     */
    public function postAdd()
    {
        $logic = new Ad\PostAdd();
        $result = $logic->run();

        return $result;
    }

    /**
     * 幻灯片页面预加载
     * @param  $id 被编辑的幻灯片Id
     * @return 幻灯片数据
     */
    public function getEdit($id)
    {
        $logic = new Ad\GetEdit();
        $logic->set('adId', $id);
        $result = $logic->run();

        return view(tpl('admin.ad.edit'))->with('result', $result);
    }

    /**
     * 保存编辑的幻灯片信息
     * @param 幻灯片ID $id
     * @return string 返回保存结果
     */
    public function postEdit($id)
    {
        $logic = new Ad\PostEdit();
        $logic->set('adId', $id);
        $result = $logic->run();

        return $result;
    }


    /* 区别于form表单ajax请求的api，以下是无form专用api
    ============================================================== */
    public function apiDelete()
    {
        $logic = new Ad\ApiDelete();
        $result = $logic->run();

        return $result;
    }
}

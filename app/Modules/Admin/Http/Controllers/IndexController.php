<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Ad;

class IndexController extends \BaseController
{
    public function getIndex()		//显示一个个的房间
    {
    	$logic = new Ad\Index();
    	$result = $logic->run();
    	return view(tpl('admin.index'))->with('result', $result);
    }
}

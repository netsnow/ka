<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Ad;

class AppointmentController extends \BaseController
{
    public function getIndex()		//显示房间（ID）对应的图片广告
    {
    	$logic = new Ad\Appointment();
    	$result = $logic->run();
    	return view(tpl('admin.ad_appointment.index'))->with('result', $result);
    }
    public function getIndexH()      //显示房间（ID）对应的图片广告
    {
        $logic = new Ad\Appointment();
        $result = $logic->run();
        return view(tpl('admin.ad_appointment.indexh'))->with('result', $result);
    }

    public function showIndex()		//应该根据房间号参数找出order表中对用的数据数组
    {
    	$logic = new Ad\Show();
    	$result = $logic->run();
    	return view(tpl('admin.ad_appointment.appoint'))->with('result', $result);
    }
}

<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Api;

class ApiController extends \BaseController
{
    public function testapi()		//显示房间（ID）对应的图片广告
    {
    	$logic = new Api\Testapi();
    	$result = $logic->run();
    }

}

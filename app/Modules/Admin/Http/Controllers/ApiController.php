<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Api;

class ApiController extends \BaseController
{
    public function testapi()
    {
    	$logic = new Api\Testapi();
    	$result = $logic->run();
    }
    public function Checkinapi($userid,$machineid,$checkintime)
    {
      $logic = new Api\Checkinapi();
      $logic->set('userid', $userid);
      $logic->set('machineid', $machineid);
      $logic->set('checkintime', $checkintime);
      $result = $logic->run();
    }

}

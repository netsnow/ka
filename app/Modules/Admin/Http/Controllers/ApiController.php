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
    public function Checkinapi($cardno,$roleid,$machineid)
    {
      $logic = new Api\Checkinapi();
      $logic->set('cardno', $cardno);
      $logic->set('machineid', $machineid);
      $logic->set('roleid', $roleid);
      $result = $logic->run();
    }

}

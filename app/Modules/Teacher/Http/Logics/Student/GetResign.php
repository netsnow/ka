<?php

namespace App\Modules\Teacher\Http\Logics\Student;

use App\Eloquents\Student;
use App\Eloquents\CheckinData;
use Request;
use Auth;
use Cache;
use Validator;
use Exception;
use DB;

class GetResign extends \BaseLogic
{
    protected function execute()
    {
      $today = "20".date('ymd',time());

        $newCheckinData = new CheckinData;
        $newCheckinData->user_id = $this->studentid;
        $newCheckinData->machine_id = "";
        $newCheckinData->checkin_date = $today;
        $newCheckinData->checkin_datetime = $today*10000;

        try
        {
        $newCheckinData->save();
         echo "ok";
        }
        catch (Exception $e)
        {
         echo $e->getMessage();
        }
        $url = '"/teacher/student"';
        echo "<script>window.location =".$url.";</script>";
      }



}

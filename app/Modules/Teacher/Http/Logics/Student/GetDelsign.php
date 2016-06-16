<?php

namespace App\Modules\Teacher\Http\Logics\Student;

use App\Eloquents\CheckinData;
use Request;
use Auth;
use Cache;
use Validator;
use Exception;
use DB;

class GetDelsign extends \BaseLogic
{
    protected function execute()
    {
      $today = date('Ymd',time());
      $delrow = DB::table('checkin_data')->whereRaw('user_id ='.$this->studentid.' and checkin_date ='.$today)->delete();
      $url = '"/teacher/student"';
      echo "<script>window.location =".$url.";</script>";
    }



}

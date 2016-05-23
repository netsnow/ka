<?php

namespace App\Modules\Admin\Http\Logics\Api;

use App\Eloquents\User;
use App\Eloquents\Student;
use App\Eloquents\Order;
use App\Eloquents\Room;
use App\Eloquents\CheckinData;
use Request;
use Exception;

class Checkinapi extends \BaseLogic
{
    protected function execute()
    {
      //这3个是入力参数
        echo $this->cardno."/".$this->machineid."/".$this->roleid;
      //根据入力参数取得用户的信息
      //学生身份
        $student = Student::where('card_num',$this->cardno)->first();
        if($student){
          $img = $student->img;
          $audio = $student->audio;
          $machineid = $this->machineid;
          echo $img."|".$audio."|".$machineid;

          $today =date('Ymd',time());
          $today_time =date('YmdHi',time());

          //把接收的数据放入本系统db，打卡记录表（checkindata）
          $newCheckinData = new CheckinData;

          $newCheckinData->user_id = $student->student_id;
          $newCheckinData->checkin_date = $today;
          $newCheckinData->machine_id = $this->machineid;
          $newCheckinData->checkin_datetime = $today_time;

          try
          {
           $newCheckinData->save();
           echo "ok";
          }
          catch (Exception $e)
          {
           echo $e->getMessage();
          }
        }

        //教师身份
          $user = User::where('card_num',$this->cardno)->first();
          if($user){
            $img = $user->img;
            $audio = $user->audio;
            $machineid = $this->machineid;
            echo $img."|".$audio."|".$machineid;

            $today =date('Ymd',time());
            $today_time =date('YmdHi',time());

            //把接收的数据放入本系统db，教师考勤表（order）
            Order::where('buyer_phone',$user->phone)
                  ->where('attendance_date',$today)
                  ->update(['check_time' => $today_time]);
          }
        //调用websocket，把用户信息传给打卡终端广告机
         $room = Room::where('room_num',$machineid)->first();
         echo "----".$room->room_id;
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, "http://0.0.0.0:2121?type=publish&to=".$room->room_id."&content=".$img."|".$audio);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
         $output = curl_exec($ch);
         curl_close($ch);
    }
}

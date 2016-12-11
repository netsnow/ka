<?php

namespace App\Modules\Admin\Http\Logics\Api;

use App\Eloquents\User;
use App\Eloquents\Student;
use App\Eloquents\Order;
use App\Eloquents\Room;
use App\Eloquents\CheckinData;
use Request;
use Exception;

class CheckinApi extends \BaseLogic
{
  protected function execute()
  {
      //这3个是入力参数
      //echo $this->cardno."/".$this->machineid."/".$this->roleid;

      //学生身份
    $student = Student::where('card_num',$this->cardno)->first();
    if($student){
      $img = $student->img;

      $audio = $student->audio;

      $machineid = $this->machineid;
      $name = $student->real_name;
      $classname = $student->company_name;
      $studentid = $student->student_id;
          //echo $img."|".$audio."|".$machineid;

      $today =date('Ymd',time());
      $today_time =date('YmdHi',time());

      $today_day = substr($today_time,6,2);
      $today_hour = substr($today_time,8,2);
      $today_min = substr($today_time,10,2);

          //把接收的数据放入本系统db，打卡记录表（checkindata）
      $newCheckinData = new CheckinData;

      $newCheckinData->user_id = $student->student_id;
      $newCheckinData->checkin_date = $today;
      $newCheckinData->machine_id = $this->machineid;
      $newCheckinData->checkin_datetime = $today_time;


      $checkindata = CheckinData::whereRaw('user_id = '.$studentid.' and checkin_date = '.$today)->first();
      //16点前正常刷卡,及16点后正常刷卡

      if($today_hour < 15 || $today_hour >= 15 && $checkindata){

          //调用websocket，把用户信息传给打卡终端广告机
       $room = Room::where('room_num',$machineid)->first();
         //echo "|roomid=".$room->room_id;
       $uriname = urlencode($name);
       $uriclassname = urlencode($classname);
         //echo $name;
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, "http://0.0.0.0:2121?type=publish&to=".$room->room_id."&content=".$img."|".$audio."|".$uriname."|".$uriclassname."|".$this->cardno."|".$today_day."|".$today_hour."|".$today_min);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
       $output = curl_exec($ch);
       curl_close($ch);

       try
       {
         $newCheckinData->save();
         echo "ok";
       }
       catch (Exception $e)
       {
         echo $e->getMessage();
       }
          //调用短信接口，发送短信
       $phone = $student->store_name;
       $content = "家长你好，".$name."已刷卡入园。";
       $url = "http://115.28.112.245:8082/SendMT/SendMessage?UserName=hedongyiyou&UserPass=123456&Mobile=".$phone."&Content=".$content;
          //echo $url;
       $message = curl_init();
       curl_setopt($message, CURLOPT_URL, $url);
       curl_setopt($message, CURLOPT_RETURNTRANSFER, 1 );
       $output2 = curl_exec($message);
       curl_close($message);
     }else{

          //调用websocket，把用户信息传给打卡终端广告机
      $img = "/assets/admin/images/jinzhi.jpeg";
      $audio = "/data/audio/jinzhirunei.mp3";
      $room = Room::where('room_num',$machineid)->first();
         //echo "|roomid=".$room->room_id;
      $uriname = urlencode($name);
      $uriclassname = urlencode($classname);
         //echo $name;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "http://0.0.0.0:2121?type=publish&to=".$room->room_id."&content=".$img."|".$audio."|".$uriname."|".$uriclassname."|".$this->cardno."|".$today_day."|".$today_hour."|".$today_min);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
      $output = curl_exec($ch);
      curl_close($ch);
    }
  }

        //教师身份
  $user = User::where('card_num',$this->cardno)->first();
  if($user){
    $img = $user->img;
    $audio = $user->audio;
    $machineid = $this->machineid;
    $name = $user->real_name;
    $classname = $user->company_name;
            //echo $img."|".$audio."|".$machineid;

    $today =date('Ymd',time());
    $today_time =date('YmdHi',time());

    $today_day = substr($today_time,6,2);
    $today_hour = substr($today_time,8,2);
    $today_min = substr($today_time,10,2);

        //调用websocket，把用户信息传给打卡终端广告机
    $room = Room::where('room_num',$machineid)->first();
    echo "|roomid=".$room->room_id;
    $uriname = urlencode($name);
    $uriclassname = urlencode($classname);
    echo $name;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://0.0.0.0:2121?type=publish&to=".$room->room_id."&content=".$img."|".$audio."|".$uriname."|".$uriclassname."|".$this->cardno."|".$today_day."|".$today_hour."|".$today_min);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
    $output = curl_exec($ch);
    curl_close($ch);

            //把接收的数据放入本系统db，教师考勤表（order）
    try
    {
      $qb=Order::where('buyer_phone',$user->phone)
      ->where('attendance_date',$today);
      $qb->update(['status' => 1]);
      $qb->update(['check_time' => $today_time]);
    }
    catch (Exception $e)
    {
     echo $e->getMessage();
   }
 }

}
}

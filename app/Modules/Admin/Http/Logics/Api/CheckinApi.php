<?php

namespace App\Modules\Admin\Http\Logics\Api;

use App\Eloquents\User;
use App\Eloquents\CheckinData;
use Request;
use Exception;

class Checkinapi extends \BaseLogic
{
    protected function execute()
    {
      //这3个是入力参数
      //echo $this->userid."/".$this->machineid."/".$this->checkintime;
      //根据入力参数取得用户的信息
      $this->user = User::find($this->userid);
      $img = $this->user->img;
      $audio = $this->user->audio;
      $machineid = $this->machineid;
      //echo $img."|".$audio."|".$machineid;


      if ($this->user)
      {
        //调用websocket，把用户信息传给打卡终端广告机
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, "http://0.0.0.0:2121?type=publish&to=".$machineid."&content=".$img."|".$audio);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
         $output = curl_exec($ch);
         curl_close($ch);

         //把接收的数据放入本系统db，打卡记录表（checkindata）
         $newCheckinData = new CheckinData;
         $newCheckinData->user_id = $this->userid;
         $newCheckinData->machine_id = $this->machineid;
         $newCheckinData->checkin_datetime = $this->checkintime;
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
    }
}

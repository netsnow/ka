<?php

namespace App\Modules\Admin\Http\Logics\Ad;

use App\Eloquents\Booking;
use Request;

class Show extends \BaseLogic
{
    protected function execute()
    {
        $this->getBookingList();
    }
    
    protected function getBookingList()
    {
        $time1 = date('Y-m-d',time());				//今天的日期
    	$time2 = date('Y-m-d',strtotime("+1 day")); //第一天的日期
    	$time3 = date('Y-m-d',strtotime("+2 day"));
    	$time4 = date('Y-m-d',strtotime("+3 day"));
    	$time5 = date('Y-m-d',strtotime("+4 day"));
    	$time6 = date('Y-m-d',strtotime("+5 day"));
    	$time7 = date('Y-m-d',strtotime("+6 day"));
    	$i = date("w");  //用来判断周几
    	if($i == 0)
    	{
    		$week1 = "本周日";
    		$week2 = "下周一";
    		$week3 = "下周二";
    		$week4 = "下周三";
    		$week5 = "下周四";
    		$week6 = "下周五";
    		$week7 = "下周六";
    	}
    	elseif ($i == 1)
    	{
    		$week1 = "本周一";
    		$week2 = "本周二";
    		$week3 = "本周三";
    		$week4 = "本周四";
    		$week5 = "本周五";
    		$week6 = "本周六";
    		$week7 = "本周日";
    	}
    	elseif ($i == 2)
    	{
    		$week1 = "本周二";
    		$week2 = "本周三";
    		$week3 = "本周四";
    		$week4 = "本周五";
    		$week5 = "本周六";
    		$week6 = "本周日";
    		$week7 = "下周一";
    	}
    	elseif ($i == 3)
    	{
    		$week1 = "本周三";
    		$week2 = "本周四";
    		$week3 = "本周五";
    		$week4 = "本周六";
    		$week5 = "本周日";
    		$week6 = "下周一";
    		$week7 = "下周二";
    	}
    	elseif ($i == 4)
    	{
    		$week1 = "本周四";
    		$week2 = "本周五";
    		$week3 = "本周六";
    		$week4 = "本周日";
    		$week5 = "下周一";
    		$week6 = "下周二";
    		$week7 = "下周三";
    	}
    	elseif ($i == 5)
    	{
    		$week1 = "本周五";
    		$week2 = "本周六";
    		$week3 = "本周日";
    		$week4 = "下周一";
    		$week5 = "下周二";
    		$week6 = "下周三";
    		$week7 = "下周四";
    	}
    	elseif ($i == 6)
    	{
    		$week1 = "本周六";
    		$week2 = "本周日";
    		$week3 = "下周一";
    		$week4 = "下周二";
    		$week5 = "下周三";
    		$week6 = "下周四";
    		$week7 = "下周五";
    	}
    	
        $result1 = Booking::whereHas('order',function($q){
        	$q->where('status',1);
        })
                          ->where('item_id', '=', Request::input('room_id'))
                          ->where('start_time','like','%'.$time1.'%')
                          ->where('booking_type','room')
                          ->with('order')
                          ->orderBy('start_time', 'asc')
                          ->get();
        
        $result2 = Booking::whereHas('order',function($q){
        	$q->where('status',1);
        })
        					->where('item_id', '=', Request::input('room_id'))
        					->where('start_time','like','%'.$time2.'%')
        					->where('booking_type','room')
        					->with('order')
        					->orderBy('start_time', 'asc')
        					->get();
        
        $result3 = Booking::whereHas('order',function($q){
        	$q->where('status',1);
        })
        					->where('item_id', '=', Request::input('room_id'))
        					->where('start_time','like','%'.$time3.'%')
        					->where('booking_type','room')
        					->with('order')
        					->orderBy('start_time', 'asc')
        					->get();
        
        $result4 = Booking::whereHas('order',function($q){
        	$q->where('status',1);
        })
        					->where('item_id', '=', Request::input('room_id'))
        					->where('start_time','like','%'.$time4.'%')
        					->where('booking_type','room')
        					->with('order')
        					->orderBy('start_time', 'asc')
        					->get();
        
        $result5 = Booking::whereHas('order',function($q){
        	$q->where('status',1);
        })
        					->where('item_id', '=', Request::input('room_id'))
        					->where('start_time','like','%'.$time5.'%')
        					->where('booking_type','room')
        					->with('order')
        					->orderBy('start_time', 'asc')
        					->get();
        
        $result6 = Booking::whereHas('order',function($q){
        	$q->where('status',1);
        })
        ->where('item_id', '=', Request::input('room_id'))
        ->where('start_time','like','%'.$time6.'%')
        ->where('booking_type','room')
        ->with('order')
        ->orderBy('start_time', 'asc')
        ->get();
        
        $result7 = Booking::whereHas('order',function($q){
        	$q->where('status',1);
        })
        ->where('item_id', '=', Request::input('room_id'))
        ->where('start_time','like','%'.$time7.'%')
        ->where('booking_type','room')
        ->with('order')
        ->orderBy('start_time', 'asc')
        ->get();
        
        
        
        $this->result['date1'] = $time1;
        $this->result['date2'] = $time2;
        $this->result['date3'] = $time3;
        $this->result['date4'] = $time4;
        $this->result['date5'] = $time5;
        $this->result['date6'] = $time6;
        $this->result['date7'] = $time7;
        
        $this->result['week1'] = $week1;
        $this->result['week2'] = $week2;
        $this->result['week3'] = $week3;
        $this->result['week4'] = $week4;
        $this->result['week5'] = $week5;
        $this->result['week6'] = $week6;
        $this->result['week7'] = $week7;
        $this->result['yuyue1'] = $result1;
        $this->result['yuyue2'] = $result2;
        $this->result['yuyue3'] = $result3;
        $this->result['yuyue4'] = $result4;
        $this->result['yuyue5'] = $result5;
        $this->result['yuyue6'] = $result6;
        $this->result['yuyue7'] = $result7;
    }
}


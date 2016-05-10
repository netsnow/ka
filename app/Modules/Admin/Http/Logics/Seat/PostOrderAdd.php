<?php

namespace App\Modules\Admin\Http\Logics\Seat;

use App\Eloquents\Seat;
use App\Eloquents\Room;
use App\Eloquents\Seat_price;
use App\Eloquents\Booking;
use App\Eloquents\Order;
use App\Eloquents\User;
use Exception;
use Request;

class PostOrderAdd extends \BaseLogic
{
protected function execute()
    {
        try 
        {
            $this->saveOrder();
            $this->result['result'] = true;
        } 
        catch (Exception $e) 
        {
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
        }
    }
	
    protected function saveOrder()
    {   
        $seatid=Request::input('seat_id');		//工位id数组room_name[]
        $room_name=Request::input('room_name');
        $seatname=Request::input('seat_name');
        $buyername=Request::input('user_name');
        $phone=Request::input('phone');
        $sd=Request::input('start_date');		//开始时刻
        $ed=Request::input('end_date');			//结束时刻
        $long_time = Request::input('long_time');	//租用几个三十天
        
        $user=User::where('phone',$phone)->get();
        $user_isnull=$user->toArray();
        
        if(empty($user_isnull))
        {
            throw new Exception('查无此号，请添加');
        }
        $userid=$user_isnull['0']['user_id'];
        if(!$sd)
        {
            throw new Exception('请输入开始时间');
        }
        if(!$ed)
        {
            throw new Exception('请输入结束时间');
        }
        if(!strtotime(Request::input('start_date'))||!strtotime(Request::input('end_date')))
        {
            throw new Exception('请输入正确的时间');
        } 
        if(strtotime("-1 day") > strtotime(Request::input('start_date')))
        {
            throw new Exception('开始时间小于当前系统时间');
        }
        if(Request::input('start_date')>=Request::input('end_date'))
        {
            throw new Exception('结束时间必须大于开始时间');
        }  
        $seat=Seat::find($seatid);
        if (!$seat)
        {
        throw new Exception('没有这个工位');
        }
        //计算order表中的价钱
       $amount = 0;
       for($i = 0;$i<count($seatid);$i++)
       {
	       	$res1 = Seat::where('seat_id',$seatid[$i])
	       	 ->get()
	       	->toArray();
	       	$get_room_id = $res1[0]['room_id'];
	       	
	       	$res2 = Room::where('room_id',$get_room_id)
	       	->get()
	       	->toArray();
	       	$get_seat_id = $res2[0]['seat_type_id'];
	       	
	       	$res3 = Seat_price::where('seat_type_id',$get_seat_id)
	       	->get()
	       	->toArray();
	       	$get_seat_price = $res3[0]['seat_price'];
	       	if($get_seat_price < 0 || $get_seat_price == 0 )
	       	{
	       		throw new Exception('工位定价非法');
	       	}
	       	$amount += $get_seat_price*$long_time;
       }
        foreach ($seatid as $id)
        {   
            $booking=Booking::where('item_id',$id)
                    ->where('booking_type','seat')
                    ->join('order', 'booking.order_id', '=', 'order.order_id')
                    ->where('order.order_type', '=', 'seat')
                    ->where('order.status', '=', 1)
                    ->where('start_time','<',$ed)
                    ->where('end_time','>',$sd)
                    ->get();
        }
        $booking_isnull=$booking->toArray();
        if(!empty($booking_isnull))
        {
        throw new Exception('工位被预定');
        } 
        else
        {
        	
            $order_sn=time().'-'.$userid.'-'.rand(10000,99999);
            $neworder=new Order;
            $neworder->order_type='seat';
            $neworder->status='1';
            $neworder->buyer_phone=$phone;
            $neworder->buyer_id=$userid;
            $neworder->order_sn=$order_sn;
            $neworder->order_amount = $amount;
            $neworder->save();
            
            foreach ($seatid as $a=>$id)
            {

                $newbooking=new Booking;
                $newbooking->order_id=$neworder->order_id;
                $newbooking->item_id=$id;
                $newbooking->item_id=$id;
                $newbooking->item_name=$seatname[$a];
                $newbooking->booking_type='seat';
                $newbooking->start_time=$sd;
                $newbooking->end_time=$ed;
                $newbooking->user_id=$userid;
                $newbooking->room_num=$room_name[$a];
                $newbooking->save();
            }
            $this->result['message']='添加成功';
        }
    }
}


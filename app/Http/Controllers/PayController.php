<?php

namespace App\Http\Controllers;

use App\Eloquents\Payment;
use App\Eloquents\Order;
use Request;

class PayController extends \BaseController
{
    public function postIndex()
    { 
    	if(!Request::has('order_sn')){
    		/* return [
    		'result'  => false,
    		'message' => '订单号错误',
    		]; */
    		$array = [
    		'result'  => true,
    		'message' => '成功',
    		'data'    => '',
    		
    		];
    		$result = Payment::select('payment_name','config','is_enabled')
    		->orderBy('sort_order')
    		->orderBy('payment_id', 'desc')
    		->get();
    		foreach($result as $key=>$value)
    		{
    			$result[$key]['config']=json_decode($result[$key]['config']);
    		}
    		$array['data']['payment_info'] = $result;	
    		return $array;
    	}
    	else 
    	{
    	$order = Order::where('order_sn','=',Request::input('order_sn'))
    	->with('user')
    	->get();
    	 
    	$data = $order->toArray();
    	$order_type = $data[0]['order_type'];			//订单类型
    	$account = $data[0]['user']['account'];			//账户金额
    	$other_account = $data[0]['user']['other_account'];	//账户其他金额
    	$total_account = 0;
    	
    	if($order_type == 'room')		//可用其它余额的类型
    	{
    		$total_account = ($account + $other_account); 
	        
    	}
    	else
    	{
    		$total_account = $account;
    	}
    		
    		$array = [
    		'result'  => true,
    		'message' => '成功',
    		'data'    => '',
    		
    		];
    		$result = Payment::select('payment_name','config','is_enabled')
    		->orderBy('sort_order')
    		->orderBy('payment_id', 'desc')
    		->get();
    		foreach($result as $key=>$value)
    		{
    			$result[$key]['config']=json_decode($result[$key]['config']);
    		}
    		$array['data']['payment_info'] = $result;
    		$array['data']['total'] = strval($total_account);
    		$array['data']['account'] = $account;
    		$array['data']['other_account'] = $other_account;
    		
    		return $array;
    	}
    }
}

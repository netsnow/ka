<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Eloquents\Booking;
use App\Eloquents\Order;
use App\Eloquents\User;
use App\Eloquents\AccountHistory;
use Request;
use Auth;
use Log;

class AlipayController extends \BaseController
{
    public function postAlipay()
    {
        $_POST = Request::all();
        require_once(base_path() ."/public/third-party/php-payment/alipay/alipay.config.php");
        require_once(base_path() . "/public/third-party/php-payment/alipay/lib/alipay_notify.class.php");
        $alipayNotify = new \AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyNotify();
        if($verify_result) {
            $out_trade_no = $_POST['out_trade_no'];//商户订单号
            $trade_no = $_POST['trade_no'];//支付宝交易号
            $trade_status = $_POST['trade_status'];//交易状态
            $buyer_id = $_POST['buyer_id'];
            $total_fee = $_POST['total_fee'];
            $buyer_email = $_POST['buyer_email'];
            $gmt_payment = $_POST['gmt_payment'];
            if($_POST['trade_status'] == 'TRADE_FINISHED') {
                
            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                $bill_other=[];
                $bill_other['buyer_id']=$buyer_id;
                $bill_other['total_fee']=$total_fee;
                $bill_other['buyer_email']=$buyer_email;
                $bill=json_encode($bill_other);
                /* $result = Order::where('order_sn', $out_trade_no)
                     ->update(array('status' => 1,'bill_number' => $trade_no,'bill_other' => $bill,'pay_at' => $gmt_payment)); */
                Order::where('order_sn', $out_trade_no)
                     ->update(array('status' => 1,'bill_number' => $trade_no,'bill_other' => $bill,'pay_at' => $gmt_payment));
/*                 $otherhistory=new AccountHistory;
                $otherhistory->user_id = $result->buyer_id;
                $otherhistory->order_id = $result->order_id;
                $otherhistory->ac_type = 2;
                $otherhistory->account = $result->order_amount;
                $otherhistory->charge_name='Alipay';
                $otherhistory->save(); */
            }
            echo "success";

        }
        else {
            echo "fail";
        }
    }
    public function alipayCheck()
    {
        require_once(base_path() ."/public/third-party/php-payment/alipay_single/alipay.config.php");
        require_once(base_path() . "/public/third-party/php-payment/alipay_single/lib/alipay_submit.class.php");
        if(!Request::has('out_trade_no') )
        {
            return [
                    'result'    => false,
                    'message'   =>'请填全信息'
                ];
        }
      
        //$trade_no = Request::input('trade_no');
        $out_trade_no =Request::input('out_trade_no');
        $parameter = array(
                "service" => "single_trade_query",
                "partner" => trim($alipay_config['partner']),
                //"trade_no"    => $trade_no,
                "out_trade_no"    => $out_trade_no,
                "_input_charset"    => trim(strtolower($alipay_config['input_charset']))
        );
                
        $alipaySubmit = new \AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestHttp($parameter);
     
        $doc = new \DOMDocument();
        $doc->loadXML($html_text);
      
        if(  isset($doc->getElementsByTagName( "trade_status" )->item(0)->nodeValue) ) {
            $alipay = $doc->getElementsByTagName( "trade_status" )->item(0)->nodeValue;
            $buyer_id = $doc->getElementsByTagName( "buyer_id" )->item(0)->nodeValue;
            $total_fee = $doc->getElementsByTagName( "total_fee" )->item(0)->nodeValue;
            $buyer_email = $doc->getElementsByTagName( "buyer_email" )->item(0)->nodeValue;
            $gmt_payment = $doc->getElementsByTagName( "gmt_payment" )->item(0)->nodeValue;
            $bill_other=[];
            $bill_other['buyer_id']=$buyer_id;
            $bill_other['total_fee']=$total_fee;
            $bill_other['buyer_email']=$buyer_email;
            $bill=json_encode($bill_other);
            if($alipay=="TRADE_SUCCESS"){
                $result=Order::where('order_sn', $out_trade_no)
                     ->update(array('status' => 1,'bill_other' => $bill,'pay_at' => $gmt_payment));
                if($result){
                	//保存到history
/*                 	$otherhistory=new AccountHistory;
                	$otherhistory->user_id = $result->buyer_id;
                	$otherhistory->order_id = $result->order_id;
                	$otherhistory->ac_type = 2;
                	$otherhistory->account = $result->order_amount;
                	$otherhistory->charge_name='Alipay';
                	$otherhistory->save(); */
                     return [
                    'result'    => true,
                    'message'   =>'成功',
                    'data'=>"交易成功"
                ];
                     
                }else{
                     return [
                    'result'    => false,
                    'message'   =>'交易失败请联系管理员',
                      ];
                }
            }

        }else{
             return [
                    'result'    => false,
                    'message'   =>'该交易支付宝尚未操作成功',
                      ];
        }
    }
    
    public function returnRecharge()
    {
    	if(!Request::has('recharge_amount') )
    	{
    		return [
    		'result'    => false,
    		'message'   =>'充值金额为空'
    				];
    	}
    	
    	if(Request::input('recharge_amount') < 0)
    	{
    		return [
    		'result'    => false,
    		'message'   =>'充值金额小于0'
    				];
    	}
    	 
    	$user=Auth::user();			//当前登录用户
    	$order_sn=time().'-'.$user->user_id.'-'.rand(10000,99999);
    	$neworder = new Order;
    	$neworder->order_type = 'recharge';
    	$neworder->status = '0';
    	$neworder->buyer_phone = $user->phone;
    	$neworder->buyer_id = $user->user_id;
    	$neworder->buyer_name = $user->real_name;
    	$neworder->order_sn = $order_sn;
    	$neworder->order_amount = Request::input('recharge_amount');
    	$neworder->save();
    	
    	$array = [
    	'result'    => true,
    	'message'   => '成功',
    	'data'      => '',
    	];
    	
    	$result = Order::select('order_sn')
    	               ->where('order_sn',$order_sn)
    				   ->first();
    	
    	$array['data'] = $result;
    	
    	return $array;
    }
    
    public function postRechargeAlipay()
    {
    	$_POST = Request::all();
    	require_once(base_path() ."/public/third-party/php-payment/alipay/alipay.config.php");
    	require_once(base_path() . "/public/third-party/php-payment/alipay/lib/alipay_notify.class.php");
    	$alipayNotify = new \AlipayNotify($alipay_config);
    	$verify_result = $alipayNotify->verifyNotify();
    	if($verify_result) {
    		$out_trade_no = $_POST['out_trade_no'];//商户订单号
    		$trade_no = $_POST['trade_no'];//支付宝交易号
    		$trade_status = $_POST['trade_status'];//交易状态
    		$buyer_id = $_POST['buyer_id'];
    		$total_fee = $_POST['total_fee'];
    		$buyer_email = $_POST['buyer_email'];
    		$gmt_payment = $_POST['gmt_payment'];
    		if($_POST['trade_status'] == 'TRADE_FINISHED') {
    
    		}
    		else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
    			$bill_other=[];
    			$bill_other['buyer_id']=$buyer_id;
    			$bill_other['total_fee']=$total_fee;
    			$bill_other['buyer_email']=$buyer_email;
    			$bill=json_encode($bill_other);
    			
    			
    			$res_check = Order::where('order_sn', $out_trade_no)->first();
    			if($res_check->status == 0)
    			{
    				$result=Order::where('order_sn', $out_trade_no)
    				->first();
    				
    				//检验订单号对应的充值金额和支付宝充值金额是否一致
    				if($result->order_amount != $total_fee)
    				{
    					return [
    					'result'    => false,
    					'message'   =>'操作非法，充值金额不一致'
    							];
    				}
    				
    				//users充钱
    				$res_user = User::where('user_id',$result->buyer_id)->first();
    				$res_user->account += $total_fee;
    				$res_user->save();
    			
    				Order::where('order_sn', $out_trade_no)
    				->update(array('status' => 1,'bill_number' => $trade_no,'bill_other' => $bill,'pay_at' => $gmt_payment));

    				//保存到history
    				$otherhistory=new AccountHistory;
    				$otherhistory->user_id = $result->buyer_id;
    				$otherhistory->order_id = $result->order_id;
    				$otherhistory->ac_type = 1;
    				$otherhistory->account = $total_fee;
    				$otherhistory->charge_name='Alipay';
    				$otherhistory->save();
    			
    			}
    			if($res_check->status == 1 && $res_check->bill_number == '')
    			{
    				Order::where('order_sn', $out_trade_no)
    				->update(array('bill_number' => $trade_no));
    			}
    		}
    		echo "success";
    
    	}
    	else {
    		echo "fail";
    	}
    }
    
    
    public function rechargeAlipayCheck()
    {
    	require_once(base_path() ."/public/third-party/php-payment/alipay_single/alipay.config.php");
    	require_once(base_path() . "/public/third-party/php-payment/alipay_single/lib/alipay_submit.class.php");
    	
    	if(!Request::has('out_trade_no') )
    	{
    		return [
    		'result'    => false,
    		'message'   =>'请填全信息'
    				];
    	}
    
    	//$trade_no = Request::input('trade_no');
    	$out_trade_no =Request::input('out_trade_no');
    	$parameter = array(
    			"service" => "single_trade_query",
    			"partner" => trim($alipay_config['partner']),
    			//"trade_no"    => $trade_no,
    			"out_trade_no"    => $out_trade_no,
    			"_input_charset"    => trim(strtolower($alipay_config['input_charset']))
    	);
    
    	$alipaySubmit = new \AlipaySubmit($alipay_config);
    	$html_text = $alipaySubmit->buildRequestHttp($parameter);
    	 
    	$doc = new \DOMDocument();
    	$doc->loadXML($html_text);
    
    	if(  isset($doc->getElementsByTagName( "trade_status" )->item(0)->nodeValue) ) 
    	{
    		$alipay = $doc->getElementsByTagName( "trade_status" )->item(0)->nodeValue;
    		$buyer_id = $doc->getElementsByTagName( "buyer_id" )->item(0)->nodeValue;
    		$total_fee = $doc->getElementsByTagName( "total_fee" )->item(0)->nodeValue;
    		$buyer_email = $doc->getElementsByTagName( "buyer_email" )->item(0)->nodeValue;
    		$gmt_payment = $doc->getElementsByTagName( "gmt_payment" )->item(0)->nodeValue;
    		$bill_other=[];
    		$bill_other['buyer_id']=$buyer_id;
    		$bill_other['total_fee']=$total_fee;
    		$bill_other['buyer_email']=$buyer_email;
    		$bill=json_encode($bill_other);
    		if($alipay=="TRADE_SUCCESS")
    		{
    			$success = false;
    			
    			$res_check = Order::where('order_sn', $out_trade_no)->first();
    			if($res_check->status == 0)
    			{
    				$result=Order::where('order_sn', $out_trade_no)
    				->first();
    				//检验订单号对应的充值金额和支付宝充值金额是否一致
    				if($result->order_amount != $total_fee)
    				{
    					return [
    					'result'    => false,
    					'message'   =>'操作非法，充值金额不一致'
    					];
    				}
    				
    				//users充钱
    				$res_user = User::where('user_id',$result->buyer_id)->first();
    				$res_user->account += $total_fee;
    				$res_user->save();
    				
    				$res=Order::where('order_sn', $out_trade_no)
    				->update(array('status' => 1,'bill_other' => $bill,'pay_at' => $gmt_payment));
    				
    				//保存到history
    				$otherhistory=new AccountHistory;
    				$otherhistory->user_id = $result->buyer_id;
    				$otherhistory->order_id = $result->order_id;
    				$otherhistory->ac_type = 1;
    				$otherhistory->account = $total_fee;
    				$otherhistory->charge_name='Alipay';
    				$otherhistory->save();
    				
    				$success = true;
    			}
    				
    			if($success)
    			{
    				return [
    					'result'    => true,
    					'message'   =>'成功',
    					'data'=>"交易成功"
    				];
    			}
    			else
    			{
    				return [
    					'result'    => false,
    					'message'   =>'交易失败请联系管理员',
    				];
    			}
    				
    		}
    	}
    	else
    	{
    		return [
    		'result'    => false,
    		'message'   =>'该交易支付宝尚未操作成功',
    		];
    	}
    }
    
}
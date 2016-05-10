<?php

namespace App\Http\Controllers;

use App\Eloquents\OrderGoods;

use App\Eloquents\Charging_price;

use Illuminate\Support\Facades\DB;
use App\Eloquents\AccountHistory;
use App\Eloquents\Booking;
use App\Eloquents\Room;
use App\Eloquents\Order;
use App\Eloquents\User;
use App\Eloquents\Payment;
use App\Eloquents\Goods;
use Request;
use Auth;
use Config;
//use DB;

class OrderController extends \BaseController
{
    //增加订单
	public function postAdd()
	{
		if(!Request::has('type') || !Request::has('item_id') || !Request::has('time'))
        {
            return [
                    'result'    => false,
                    'message'   =>'请填全信息'
                ];
        }
        
        $time=json_decode(Request::input('time'), true);
       
        if(empty($time)){
            return [
                        'result'    => false,
                        'message'   =>'时间格式不正确'
                    ];
        }
        
        if(!is_array($time)){
            return [
                        'result'    => false,
                        'message'   =>'时间格式不正确'
                    ];
        }
        $arr=$time;
        
        $array_num=count($time);
         
        for($i=0;$i<$array_num;$i++){
         
           if(!isset($arr[$i]['start_time'])||!isset($arr[$i]['end_time'])){
                return [
                    'result'    => false,
                    'message'   =>'时间格式不正确'
                ];
            }
            if(time() > strtotime($arr[$i]['start_time'])){
                return [
                    'result'    => false,
                    'message'   =>'开始时间小于系统时间'
                ];
            }
            if(!strtotime($arr[$i]['start_time'])||!strtotime($arr[$i]['end_time']))
           {
                return [
                    'result'    => false,
                    'message'   =>'请输入合法时间'
                ];
            }
            if(strtotime($arr[$i]['start_time']) >= strtotime($arr[$i]['end_time'])){
                return [
                    'result'    => false,
                    'message'   =>'开始时间小于结束时间'
                ];
            }
        }
        $room_id=Room::where('room_id','=',Request::input('item_id'))->get();
        $room_id_ifnull=$room_id->toArray();
        if(empty($room_id_ifnull))
        {
            return [
                    'result'    => false,
                    'message'   =>'选择的该房间并不存在'
                ];
        }
        for($i=0;$i<$array_num;$i++){
            $result = Booking:: select('booking_id')
                             ->whereHas('order', function($query)
                             {
                                 $query->where('order_type', '=', Request::input('type'))
                                       ->where(function($query2) {
                                            $query2->orWhere('status', '=', 1)
                                                   ->orWhere(function($query3) {
                                                        $query3->where('status', '=', 0)
                                                               ->where('created_at', '>', date('Y-m-d H:i:s', time() - 600));
                                                    });
                                         });
                             })
                             ->where('booking_type', '=', Request::input('type'))
                             ->where('item_id', '=', Request::input('item_id'))
                             ->where('end_time','>',$arr[$i]['start_time'])
                             ->where('start_time','<',$arr[$i]['end_time'])
                             ->get();
            $result_isnull=$result->toArray();
            if(!empty($result_isnull)){
                return [
                    'result'    => false,
                    'message'   =>'该房间已经被预订'
                ];
            }
        }
        $room_num = $room_id[0]['room_num'];			//房间号
        $room_price = $room_id[0]['room_price'];		//房间单价
        $room_type = $room_id[0]['room_type'];			//房间类型
        $room_size = $room_id[0]['room_size'];			//房间最大人数
        $room_url = $room_id[0]['room_url'];			//房间图片
        $order_amount=$room_price*$array_num;
        $user=Auth::user();
        
      $qb = Order::where('buyer_id', $user->user_id)
                   ->where('order_type','bath')
                   ->where('status','=',0)
                   ->get();
        $qb2 = Order::where('buyer_id', $user->user_id)
                    ->where('order_type','sleep')
                    ->where('status','=',0)
                    ->get();
        if((count($qb) > 0)||(count($qb2) > 0))
        {
                return [
                    'result'    => false,
                    'message'   =>'有未付款的洗浴或睡眠舱订单，不能预约'
                ];
        }
        
        $userid=$user->user_id;
        $username=$user->user_name;
        $phone=$user->phone;
        $order_sn=time().'-'.$userid.'-'.rand(10000,99999);
        $order = new Order;
                    $order->order_type=Request::input('type');
                    $order->buyer_id=$userid;
                    $order->buyer_name=$username;
                    $order->order_sn=$order_sn;
                    $order->order_amount=$order_amount;
                    $order->buyer_phone=$phone;
                    $order->save();
                    $LastInsertId = $order->order_id;
        for($i=0;$i<$array_num;$i++){
            $booking = new Booking;
                    $booking->booking_type = Request::input('type');
                    $booking->item_id = Request::input('item_id');
                    $booking->room_num = $room_num;
                    $booking->room_price = $room_price;
                    $booking->room_type = $room_type;
                    $booking->room_size = $room_size;
                    $booking->room_url = $room_url;
                    $booking->order_id = $LastInsertId;
                    $booking->start_time = $arr[$i]['start_time'];
                    $booking->end_time = $arr[$i]['end_time'];
                    $booking->user_id =$userid;
                    $booking->save();
        }
        $array=[
                    'result'=> true,
                    'message'=>"该房间预订成功",
                    'data'=>""
                    ];
        $array['data']['order_sn'] = $order_sn;
        return $array;
    }
    
    public function postGoodsAdd()
    {
    	if(!Request::has('goods_id') || !Request::has('number'))
    	{
    		return [
    		'result'    => false,
    		'message'   =>'请填全信息'
    				];
    	}

    	$goods_id=Goods::where('goods_id','=',Request::input('goods_id'))->get();
    	$goods_id_ifnull=$goods_id->toArray();
    	if(empty($goods_id_ifnull))
    	{
    		return [
    		'result'    => false,
    		'message'   =>'选择的该商品并不存在'
    				];
    	}
        $number=Request::input('number');

       // DD($number);
    	$price=$goods_id[0]['price'];
    	$goods_name=$goods_id[0]['goods_name'];
    	$goods_image=$goods_id[0]['goods_image'];
    	$order_amount=$price*$number;
    	$user=Auth::user();
    	$userid=$user->user_id;
    	$username=$user->user_name;
    	$phone=$user->phone;
    	$order_sn=time().'-'.$userid.'-'.rand(10000,99999);
    	$order = new Order;
    	$order->order_type='goods';
    	$order->buyer_id=$userid;
    	$order->buyer_name=$username;
    	$order->order_sn=$order_sn;
    	$order->order_amount=$order_amount;
    	$order->buyer_phone=$phone;
    	$order->goods_name=$goods_name;
    	$order->goods_image=$goods_image;
    	$order->save();
    	$LastInsertId = $order->order_id;
    	$order_goods = new OrderGoods;
    	$order_goods->order_id = $LastInsertId;
    	$order_goods->goods_id = Request::input('goods_id');
    	$order_goods->goods_name = $goods_id[0]['goods_name'];
    	$order_goods->goods_image = $goods_id[0]['goods_image'];
    	$order_goods->store_name = $goods_id[0]['store_name'];
    	$order_goods->price = $price;
    	$order_goods->user_id = $user->user_id;
    	
    	$order_goods->save();

    	$array=[
    	'result'=> true,
    	'message'=>"该商品预订成功",
    	'data'=>""
    			];
    	$array['data']['order_sn'] = $order_sn;
    	return $array;
    }
    
    public function postTypeBath(){
        $user=Auth::user();
        $userid=$user->user_id;
        /*Order::where('buyer_id', $userid)
        ->where('order_type', 'bath')
        ->where('status',0)
        ->where('created_at', '<' ,date('Y-m-d H:i:s', time() - 600))
        ->update(array('status' => '99'));*/
        
        $bath=Order::where('buyer_id',$userid)
                    ->where('order_type','bath')
                    ->with('charging')
                    ->orderBy('status')
                    ->orderBy('created_at','desc')
                    ->get();
     
        $data = $bath->toArray();
        $i = count($data);
        $arry = [];
        $arry=
        [
        'result'=> true,
        'message'=>"成功",
        'data'=>""
        ];
        $arry1 = [];
        for($j = 0;$j < $i;$j++)
        {
            $arry1[$j]['start_time'] = $bath[$j]['charging']['start_time'];
            $arry1[$j]['end_time'] = $bath[$j]['charging']['end_time'];
            $arry1[$j]['order_amount'] = $bath[$j]['order_amount'];
            $arry1[$j]['status'] = $bath[$j]['status'];
            $arry1[$j]['order_sn'] = $bath[$j]['order_sn'];	
            $arry1[$j]['charging_price'] = $bath[$j]['charging']['charging_price'];
            $arry1[$j]['unit'] = LIMIT_CHARGING_PRICE.'分钟'; 
            $_time = strtotime($arry1[$j]['end_time']) - strtotime($arry1[$j]['start_time']);
            $minute = ceil($_time%86400/60);
            $num_price = ceil($minute/LIMIT_CHARGING_PRICE);
            $arry1[$j]['number'] = $num_price;  
             $arry1[$j]['url'] =Config::get('app.url')."/data/uploads/xizao.jpg"; 
        }
        $arry['data']['order_info'] = $arry1;
        return $arry;
        
    }

    public function postTypeSleep()
    {
       $user=Auth::user();
       $userid=$user->user_id;
        /*Order::where('buyer_id', $userid)
        ->where('order_type', 'sleep')
        ->where('status',0)
        ->where('created_at', '<' ,date('Y-m-d H:i:s', time() - 600))
        ->update(array('status' => '99'));*/
        
        $sleep=Order::where('buyer_id',$userid)
                    ->where('order_type','sleep')
                    ->with('charging')
                    ->orderBy('status')
                    ->orderBy('created_at','desc')
                    ->get();
        $data = $sleep->toArray();
        $i = count($data);
        $arry = [];
        $arry=
        [
        'result'=> true,
        'message'=>"成功",
        'data'=>""
        ];
        $arry1 = [];
        for($j = 0;$j < $i;$j++)
        {
            $arry1[$j]['start_time'] = $sleep[$j]['charging']['start_time'];
            $arry1[$j]['end_time'] = $sleep[$j]['charging']['end_time'];
            $arry1[$j]['order_amount'] = $sleep[$j]['order_amount'];
            $arry1[$j]['status'] = $sleep[$j]['status'];
            $arry1[$j]['order_sn'] = $sleep[$j]['order_sn'];	
            $arry1[$j]['charging_price'] = $sleep[$j]['charging']['charging_price'];
            $arry1[$j]['unit'] = LIMIT_CHARGING_PRICE.'分钟';   
            $_time = strtotime($arry1[$j]['end_time']) - strtotime($arry1[$j]['start_time']);
            $minute = ceil($_time%86400/60);
            $num_price = ceil($minute/LIMIT_CHARGING_PRICE);
            $arry1[$j]['number'] = $num_price;
              $arry1[$j]['url'] =Config::get('app.url')."/data/uploads/sleep.jpg"; 
        }
        $arry['data']['order_info'] = $arry1;
        return $arry;
    
    }
    
    public function postTypeRoom()
    {
        $user=Auth::user();
        $userid=$user->user_id; 
        Order::where('buyer_id', $userid)
        ->where('order_type', 'room')
        ->where('status',0)
        ->where('created_at', '<' ,date('Y-m-d H:i:s', time() - 600))
        ->update(array('status' => '99'));
        
        $array=
        [
        'result'=> true,
        'message'=>"成功",
        'data'=>""
        ];
        
        $result = Order::where('buyer_id', $userid)
                     ->where('order_type', 'room')
                     ->with('booking')
                     ->orderBy('status')
                     ->orderBy('created_at','desc')
                     ->get();

        $data = [];
        
        foreach ($result as $order) 
        {
            $temp = [
                "order_amount" => $order->order_amount,
                "order_sn" => $order->order_sn,
                "status" => $order->status,
                'booking_info' => $order->booking->map(function($item, $key)
                {
                    return [
                        'start_time'    => $item->start_time,
                        'end_time'      => $item->end_time,
                    ];
                }),
            ];

             if(count($order->booking)>0){
                        $temp['room_num'] =$order->booking[0]->room_num;
                        $temp['room_size'] =$order->booking[0]->room_size;
                        $temp['room_price'] =$order->booking[0]->room_price;
                        $room_url =$order->booking[0]->room_url;
                        if(empty($room_url)){
                            $temp['room_url'] =Config::get('app.url')."/data/uploads/fangjian.jpg"; 
                        }else{
                            $temp['room_url'] = Config::get('app.url').$room_url ;
                        }
                        $temp['unit'] = LIMIT_ROOM_PRICE.'分钟';
                        $room_type =$order->booking[0]->room_type;
                        $config=Config::get('attributes.room_type');
                        if(isset($config[ $room_type])){
                            $temp['room_type']=$config[ $room_type];
                        }else{
                            $temp['room_type']="undefinition";
                        }
                    }else{
                         $temp['room_num']='该房间被删除';
                        $temp['room_size']='请联系管理员';
                        $temp['room_price']="undefinition";
                        $temp['room_url'] =Config::get('app.url')."/data/uploads/fangjian.jpg"; 
                        $temp['unit']=LIMIT_ROOM_PRICE.'分钟';
                        $temp['room_type']="undefinition";
                     }
                      $data[] = $temp;
            }
           
            $array['data']['order_info'] = $data;
            return $array;
    }
    
    public function postTypeGoods()
    {
    	$user=Auth::user();
    	$userid=$user->user_id;
    	Order::where('buyer_id', $userid)
    	->where('order_type', 'goods')
    	->where('status',0)
    	->where('created_at', '<' ,date('Y-m-d H:i:s', time() - 1800))
    	->update(array('status' => '99'));
    
    	$array=
    	[
    	'result'=> true,
    	'message'=>"成功",
    	'data'=>""
    			];
    
    	$result = Order::where('buyer_id', $userid)
    	->where('order_type', 'goods')
    	->with('order_goods')
    	->orderBy('status')
    	->orderBy('created_at','desc')
    	->get();
    
    	$data = [];
    
    	foreach ($result as $order)
    	{
    		$temp = [
    		"order_amount" => $order->order_amount,
    		"order_sn" => $order->order_sn,
    		"status" => $order->status,
    		];
    		
    		if (count($order->order_goods) > 0)
    		{
    			if(count($order->order_goods[0]) > 0)
    			{
    				$temp['goods_id'] =$order->order_goods[0]->goods_id;
    				$temp['goods_name'] =$order->order_goods[0]->goods_name;
    				$temp['store_name'] =$order->order_goods[0]->store_name;
    				$temp['price'] =$order->order_goods[0]->price;
    				$goods_image =$order->order_goods[0]->goods_image;
    				if(empty($goods_image))
    				{
    					$temp['goods_image'] =Config::get('app.url')."/data/uploads/shangpin.jpg";
    				}
    				else
    				{
    					$temp['goods_image'] = Config::get('app.url').$goods_image ;
    				}	    
    			}	
     	    	else
    		    {
    			    $temp['goods_name']='该商品已不存在';
    		    } 
    		}
    		$data[] = $temp;
    	}
    	$array['data']['order_info'] = $data;
    	return $array;
    }
    
    //订单查询是否能付款
    public function orderCheck(){
        if(!Request::has('order_sn')){
            return [
                    'result'    => false,
                    'message'   =>'请输入订单号'
                ];
        }
        $order=Order::with('booking')->where('order_sn','=',Request::input('order_sn'))->first();
        if(empty($order)){
             return [
                    'result'    => false,
                    'message'   =>'该订单已经不存在'
                ];
        }
        if($order['status']==1){
            return [
                    'result'    => false,
                    'message'   =>'该订单已经付完款'
                ];
        }
        if($order['created_at']<date('Y-m-d H:i:s', time() - 600) && $order['order_type']=='room'){
            $affectedRows = Order::where('order_sn', '=',Request::input('order_sn'))
                                 ->update(array('status' => '99'));
            
            return [
                'result'    => false,
                'message'   =>'该订单超过十分钟不能付款'
            ];
        }
        
        if($order['created_at']<date('Y-m-d H:i:s', time() - 1800) && $order['order_type']=='goods'){
        	$affectedRows = Order::where('order_sn', '=',Request::input('order_sn'))
        	->update(array('status' => '99'));
        
        	return [
        	'result'    => false,
        	'message'   =>'该订单超过三十分钟不能付款'
        			];
        }
        
        if($order['order_type']=='room'){
        $order_id=$order['order_id'];
        $order_type=$order['order_type'];
        $booking=Booking::select('start_time','end_time')->where('order_id',$order_id)->get();
        $booking_isnull=$booking->toArray();
        if(empty($booking_isnull)){
             return [
                    'result'    => false,
                    'message'   =>'该订单出错请重新预订'
                ];
        }
        $booking_num=count($booking);
        for($i=0;$i<$booking_num;$i++){
            
            $result = Booking:: select('order_id')
                             ->whereHas('order', function($query) use ($order_type)
                             {
                                 $query->where('order_type', '=', $order_type)
                                       ->where(function($query2) {
                                            $query2->orWhere('status', '=', 1)
                                                   ->orWhere(function($query3) {
                                                        $query3->where('status', '=', 0)
                                                               ->where('created_at', '>', date('Y-m-d H:i:s', time() - 600));
                                                    });
                                         });
                             })
                             ->where('booking_type', '=', $order_type)
                             ->where('end_time','>',$booking[$i]['start_time'])
                             ->where('item_id',$order->booking[0]->item_id)
                             ->where('start_time','<',$booking[$i]['end_time'])
                             ->get();
            $result_isnull=$result->toArray();
            if(empty($result_isnull)){
                return [
                        'result'    => false,
                        'message'   =>'该订单已经超过十分钟不能付费'
                    ];
            };
            $result_num=count($result_isnull);
            for($j=0;$j<$result_num;$j++){
                if($result[$j]['order_id']!=$order_id){
                     return [
                    'result'    => false,
                    'message'   =>'该订单冲突，不能付费'
                ];
                }
            }
        }
        }
        if($order['order_type'] == 'goods')
        {
        	$order_goods_id = $order['order_id'];	//改订单号对应的order表的ID
        	$res_order_goods = OrderGoods::where('order_id',$order_goods_id)
        								 ->get();
        	if(count($res_order_goods) <0)
        	{
        		return [
        		'result'    => false,
        		'message'   =>'该订单冲突，不能付费'
        		];
        	}
        }
        return [
                    'result'    => true,
                    'message'   =>'该订单可以付费'
                ];
    }
    //用户删除订单
    public function orderDelete()
    {
        if(!Request::has('order_sn')){
            return [
                    'result'    => false,
                    'message'   =>'请输入订单号'
                ];
        }
        $user=Auth::user();
        $userid=$user->user_id;
        $username=$user->user_name;
        $order=Order::with('booking')->where('order_sn','=',Request::input('order_sn'))->first();
        if(empty($order)){
             return [
                    'result'    => false,
                    'message'   =>'该订单已经不存在'
                ];
        }
        if($order['buyer_id']!=$userid){
             return [
                    'result'    => false,
                    'message'   =>'该订单不属于该用户'
                ];
        }
        $affectedRows = Order::where('order_sn', '=',Request::input('order_sn'))->delete();
        if($affectedRows>0){
            return [
                    'result'    => true,
                    'message'   =>'订单删除成功'
                ];
        } else {
            return [
                    'result'    => false,
                    'message'   =>'订单删除失败'
                ];
        }
    }
    //用户未支付的订单
    public function nopayOrder(){
        if(!Request::has('type')){
            return [
                    'result'    => false,
                    'message'   =>'请输入查询类别'
                ];
        }
        $user=Auth::user();
        $userid=$user->user_id;
        $result=Order::select('order_id','order_sn','order_type','buyer_id','buyer_name')
                     ->where('order_type','=',Request::input('type'))
                     ->where('status','=',0)
                     ->where('buyer_id','=',$userid)
                     ->get();
        $result_isnull=$result->toArray();
        if(empty($result_isnull)){
            return [
                    'result'    => false,
                    'message'   =>'该用户没有未支付订单'
                ];
        }
        $array=[
                    'result'=> true,
                    'message'=>"成功",
                    'data'=>""
                    ];
        $array['data']['nopayOrder'] = $result;
        return $array;
    }
    //用户最近快要到期的预定时间
    public function overdueOrder(){
        $user=Auth::user();
        $userid=$user->user_id;
        $nowtime=date('Y-m-d H:m:s',time());
        $result=Booking::select('end_time')
                        ->whereHas('order', function($query){
                        $query->where('status','=',1);
                        })
                        ->where('booking_type','=','room')
                        ->where('user_id','=',$userid)
                        ->where('end_time','>',$nowtime)
                        ->orderBy('end_time')
                        ->first();
        if(empty($result)){
            return [
                        'result'    => false,
                        'message'   =>'该用户最近没有预定信息'
                    ];
        }
        $array=[
                    'result'=> true,
                    'message'=>"成功",
                    'data'=>""
                    ];
        $array['data']['room'] = $result['end_time'];
        return $array;
    }
    public function sleepbathNopay(){
          $user=Auth::user();
          $userid=$user->user_id;
          $sleep=Order::where('buyer_id',$userid)
                      ->where('order_type','sleep')
                      ->where('status',0)->get()->toArray();
          $sleepnum=count($sleep);
          $bath=Order::where('buyer_id',$userid)
                      ->where('order_type','bath')
                      ->where('status',0)->get()->toArray();
          $bathnum=count($bath);
          $array=[
                    'result'=> true,
                    'message'=>"成功",
                    'data'=>""
                    ];
          $array['data']['sleep'] =  $sleepnum;
          $array['data']['bath'] =  $bathnum;
          return $array;
    }
    public function userSuminfo(){
        $user=Auth::user();
        $userid=$user->user_id; 
        $sleep=Order::where('buyer_id',$userid)
                    ->where('order_type','sleep')
                    ->where('status',0)->get()->toArray();
        $sleepnum=count($sleep);
        $bath=Order::where('buyer_id',$userid)
                    ->where('order_type','bath')
                    ->where('status',0)->get()->toArray();
        $bathnum=count($bath);
        $room=Order::where('buyer_id',$userid)
                    ->where('order_type','room')
                    ->where('status',0)->get()->toArray();
        $roomnum=count($room);
        $goods=Order::where('buyer_id',$userid)
                    ->where('order_type','goods')
                    ->where('status',0)->get()->toArray();
        $goodsnum=count($goods);
        $nopaynum=$sleepnum+$bathnum+$roomnum+$goodsnum;
        $real_name=User::select('real_name','account','other_account')->where('user_id',$userid)->first();
        $array=[
        'result'=> true,
        'message'=>"成功",
        'data'=>""
        		];
        $get_roleid = User::where('user_id',$userid)
                          ->first();
        $is_roleid = $get_roleid->role_id;
        if($is_roleid == 1)
        {
        	if(empty($real_name['real_name'])){
        		$array['data']['real_name']="管理员";
        	}
        	else 
        	{
        		$array['data']['real_name']= $real_name['real_name']."(管理员)";
        	}
        	
        }
        else
        {
        	$array['data']['real_name'] =  $real_name['real_name'];
        }
         
        
        $array['data']['nopaynum'] =  $nopaynum;
        $array['data']['account'] =  $real_name['account'];
        $array['data']['other_account'] =  $real_name['other_account'];
        return $array;
        
    }
    
    protected function Synchronous()		//同步
    {
    	//拿到类型为扣费，为同步的历史记录
    	$res_his = AccountHistory::where('flag',0)
    	->where('charge_name','account')
    	->where('ac_type',2)
    	->get();
    	
    
    	foreach ($res_his as $res)
    	{
    		//$res->user_id;	//用户ID
    		//$res->ac_type;	//动作类型1为充值2为消费
    		//$res->account;	//扣费金额
    		//$res->created_at; //开始时间
    		$res_user = User::where('user_id',$res->user_id)
    		->first();
    
    		$xiaofei = DB::connection('xiaofei')
    		->table('ryxx')
    		->where('rfkh',$res_user->card_num)	//卡号
    		->first();
    		$ryid = $xiaofei->ryid;		//通过卡号拿到ID
    		$account = $xiaofei->rfye;	//通过卡号拿到余额
    		$account -= $res->account;
    		$aa = DB::connection('xiaofei')
    		->table('ryxx')
    		->where('rfkh',$res_user->card_num)	//卡号
    		->update(array('rfye' => $account));//同步信息表余额
    
    		//流水表同步扣费记录
    		DB::connection('xiaofei')
    		->table('lssj')
    		->insert(array('ryid' => $ryid,'xfjh' => 0,'xffs' => 'PHP','xfzl' => '减款','sky' => '管理员  ','rfkh' => $res_user->card_num,'xfje' => $res->account,'rfye' => $account,'xfsj'=> $res->created_at));
    
    		$res->flag = 1;
    		$res->save();
    	}
    	 
    
    }
    
    public function orderPay(){						//余额支付
    	
    	$user=Auth::user();
    	$userid=$user->user_id;
    	
    	$isable_pay = Payment::where('payment_id','24')->get();
    	if($isable_pay->toArray()[0]['is_enabled'] == 0)
    	{
    		return [
    		'result'    => false,
    		'message'   =>'该种支付方式已被管理员禁用'
    				];
    	}
    	
    	$order = Order::where('order_sn','=',Request::input('order_sn'))
    	->with('user')
    	->get();
    	
    	$data = $order->toArray();
    	$order_id = $data[0]['order_id'];			//订单ID
    	//$status = $data[0]['status'];					//订单状态 0 99 1
    	$order_type = $data[0]['order_type'];			//订单类型
    	$order_amount = $data[0]['order_amount'];		//订单应付金额
    	$account = $data[0]['user']['account'];			//账户金额
    	$other_account = $data[0]['user']['other_account'];	//账户其他金额
    	$card_no = $data[0]['user']['card_num'];	//用户卡号
    	

    	if($order_type == 'room')		//可用其它余额的类型
    	{
    		if( $account + $other_account < $order_amount)
    		{
    			return [
    			'result'    => false,
    			'message'   =>'账户余额不足'
    			];
    		}
    		else
    		{
    			if($other_account > $order_amount || $other_account == $order_amount)
    			{
    				$issucess = DB::transaction(function() use ($other_account,$order_amount,$userid,$order_id) {
    				
    				
    				$other_account -= $order_amount;
    				DB::table('users')
    				  ->where('user_id','=',$userid)
    				  ->update(array('other_account' => $other_account));
    				DB::table('order')
    				  ->where('order_sn','=',Request::input('order_sn'))
    				  ->update(array('status' => 1));
    				
    				$otherhistory=new AccountHistory;
    				$otherhistory->user_id = $userid;
    				$otherhistory->order_id = $order_id;
    				$otherhistory->ac_type = 2;
    				$otherhistory->account = $order_amount;
    				$otherhistory->charge_name='other_account';
    				$otherhistory->flag = 1;
    				$otherhistory->save();
    				});
    				
    				DB::transaction(function() {
    				//$this->Synchronous();
    				});
    				//$is_true = is_null($issucess) ? true : false;
    				if(is_null($issucess))
    				{
    				  
    				return [
    				'result'    => true,
    				'message'   =>'支付成功'
    			    ];
    				}
    				else
    				{
    					return [
    					'result'    => false,
    					'message'   =>'数据库异常，联系管理员'
    							];
    				}
    			}
    			else
    			{
    				$issucess_1 = DB::transaction(function() use ($other_account,$order_amount,$account,$userid,$order_id) {
    				
    				$order_amount -= $other_account;
    				DB::table('users')
    				->where('user_id','=',$userid)
    				->update(array('other_account' => 0));
    				$account -= $order_amount;
    				DB::table('users')
    				->where('user_id','=',$userid)
    				->update(array('account' => $account));
    				
    				DB::table('order')
    				->where('order_sn','=',Request::input('order_sn'))
    				->update(array('status' => 1));
    				
    				$otherhistory_1=new AccountHistory;
    				$otherhistory_1->user_id = $userid;
    				$otherhistory_1->order_id = $order_id;
    				$otherhistory_1->ac_type = 2;
    				$otherhistory_1->account = $other_account;
    				$otherhistory_1->charge_name='other_account';
    				$otherhistory_1->flag = 1;
    				$otherhistory_1->save();
    				
    				$otherhistory_2=new AccountHistory;
    				$otherhistory_2->user_id = $userid;
    				$otherhistory_2->order_id = $order_id;
    				$otherhistory_2->ac_type = 2;
    				$otherhistory_2->account = $order_amount;
    				$otherhistory_2->charge_name='account';
    				$otherhistory_2->flag = 0;
    				$otherhistory_2->save();

    				});
    				
    				DB::transaction(function() {
    				//$this->Synchronous();
    				});
    				$is_true_1 = is_null($issucess_1) ? true : false;
    				if($is_true_1)
    				{
    					
    					return [
    					'result'    => true,
    					'message'   =>'支付成功'
    					];
    				}
    				else
    				{
    					return [
    					'result'    => false,
    					'message'   =>'数据库异常，联系管理员'
    					];
    				}
    				
    			}
    		}
    		
    	}
    	else
    	{
    		if( $account < $order_amount)
    		{
    			return [
    			'result'    => false,
    			'message'   =>'账户余额不足'
    					];
    		}
    		else
    		{
    			$issucess_2 = DB::transaction(function() use ($order_amount,$account,$userid,$order_id) {
    			$account -= $order_amount;
    			DB::table('users')
    			->where('user_id','=',$userid)
    			->update(array('account' => $account));
    			
    			DB::table('order')
    			->where('order_sn','=',Request::input('order_sn'))
    			->update(array('status' => 1));
    			
    			$otherhistory_3=new AccountHistory;
    			$otherhistory_3->user_id = $userid;
    			$otherhistory_3->order_id = $order_id;
    			$otherhistory_3->ac_type = 2;
    			$otherhistory_3->account = $order_amount;
    			$otherhistory_3->charge_name='account';
    			$otherhistory_3->flag = 0;
    			$otherhistory_3->save();
    			
    			});
    			DB::transaction(function() {
    			//$this->Synchronous();
    			});
    			
    				$is_true_2 = is_null($issucess_2) ? true : false;
    				if($is_true_2)
    				{
    						
    					return [
    					'result'    => true,
    					'message'   =>'支付成功'
    							];
    				}
    				else
    				{
    					return [
    					'result'    => false,
    					'message'   =>'数据库异常，联系管理员'
    							];
    				}
    			
    		}	
    	}

    }
}

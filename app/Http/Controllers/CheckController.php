<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Eloquents\Booking;
use App\Eloquents\Room;
use App\Eloquents\Order;
use Request;
use Auth;

class CheckController extends \BaseController
{
    public function postCheck(){
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
        return [
                    'result'    => true,
                    'message'   =>'该订单可以付费'
                ];
    }
}
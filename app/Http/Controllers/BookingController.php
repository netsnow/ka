<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Eloquents\Booking;
use App\Eloquents\Room;
use Request;

class BookingController extends \BaseController
{
    public function postIndex()
    {
        if (!Request::has('type') || !Request::has('date')) {
             return [
                    'result'    => false,
                    'message'   =>'请填全信息'
                ];
        }

        if(!strtotime(Request::input('date'))) {
            return [
                    'result'    => false,
                    'message'   =>'请填写合法时间'
                ];
        }

        if (Request::input('type') == 'room') {
            // 输入的日期
            $time = date('Y-m-d', strtotime(Request::input('date')));
            $getRoom = Room::find(Request::input('item_id'));
            
            if (!$getRoom) {
                return [
                    'result'    => false,
                    'message'   =>'房间号不存在'
                ];
            }
            // 取得订单
            $result = Booking::select('start_time','end_time')
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
                             ->where('start_time', 'like', '%' . $time . '%')
                             ->get();
            $resultarr=$result->toArray();
            
            if(empty($resultarr)) {

                $array = [
                    'result'    => true,
                    'message'   => '该日期没有预订信息',
                    'data'      => '',
                ];
                $array['data']['booking_info'] = $result;

                return $array;
            } else {
                $array = [
                    'result'    => true,
                    'message'   => '成功',
                    'data'      => '',
                ];
                $array['data']['booking_info'] = $result;

                return $array;
            }
        }

        return [
                    'result'    => false,
                    'message'   =>'输入type不存在'
                ];
    }
}

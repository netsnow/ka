<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Eloquents\Order;
use Request;
use Auth;

class DeleteController extends \BaseController
{
    public function postDelete()
    {
        if(!Request::has('order_id')){
            return [
                    'result'    => false,
                    'message'   =>'请输入订单号'
                ];
        }
        $order=Order::with('booking')->where('order_id','=',Request::input('order_id'))->first();
        if(empty($order)){
             return [
                    'result'    => false,
                    'message'   =>'该订单已经不存在'
                ];
        }
        $affectedRows = Order::where('order_id', '=',Request::input('order_id'))->delete();
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
}
<?php

namespace  App\Modules\Admin\Http\Logics\Order;

use App\Eloquents\OrderGoods;

use App\Eloquents\Order;
use Exception;
use Request;
use App\Eloquents\Booking;
use App\Eloquents\Charging;

class GetEdit extends \BaseLogic
{
    protected function execute()
    {
        $this->getOrder();
        $this->getInformation();
    }

    protected function getOrder()
    {
        $getOrder = Order::find($this->orderid);

        if (!$getOrder) 
        {
            abort(404, '没有这个订单');
        }
        $this->result['order'] = $getOrder;
    }
    
    protected function getInformation()
    {
        $getOrder = Order::find($this->orderid);
        $ordertype = $getOrder->order_type;
        $order_id = $getOrder->order_id;
        if($ordertype=='room' || $ordertype=='seat')
        {
            $getInformation = Booking::where('order_id',$order_id)->get() ;
            if (!$getInformation) 
            {
                abort(404, '没有订单详细信息');
            }
        }
        elseif($ordertype=='bath')
        {
            $getInformation = Charging::where('order_id',$order_id)->get() ;
            if (!$getInformation) 
            {
                abort(404, '没有订单详细信息');
            }
        }
        elseif ($ordertype=='sleep')
        {
            $getInformation = Charging::where('order_id',$order_id)->get() ;
            if (!$getInformation) 
            {
                abort(404, '没有订单详细信息');
            }
        }
        elseif ($ordertype=='goods')
        {
        	$getInformation = OrderGoods::where('order_id',$order_id)->get() ;
        	if (!$getInformation)
        	{
        		abort(404, '没有订单详细信息');
        	}
        }
        $this->result['information'] = $getInformation;
}
}

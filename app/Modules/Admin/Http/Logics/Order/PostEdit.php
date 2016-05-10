<?php

namespace App\Modules\Admin\Http\Logics\Order;

use App\Eloquents\Order;
use App\Eloquents\OrderChange;
use Exception;
use Request;
use Validator;

class PostEdit extends \BaseLogic
{
    protected function execute()
    {
    	if(Request::has('order_amount'))
    	{
    		if(!is_numeric(Request::input('order_amount')) ){
    			$this->result['message'] = '请输入数字';
    			return;
    		}
    		if(Request::input('order_amount') < 0 )
    		{
    			$this->result['message'] = '输入的金额小于0';
    			return;
    		}
    	}
    	
        try {
            $this->validate();
            $this->saveChange();
            $this->saveOrder();
           
            $this->result['result'] = true;
        } 
        catch (Exception $e) 
        {
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
        }
	}
    protected function validate()
    {
        $validator = Validator::make(Request::all(), [
            'order_amount'  => 'numeric',
            'order_amount'  => 'required|max:20',
        ]);
        
        if ($validator->fails()) 
        {
            throw new Exception($validator->messages()->first());
        }
    }
    
    protected function saveOrder()
    {
        $this->order = Order::find($this->orderid);
        $this->order->order_amount = Request::input('order_amount');
        $this->order->status = Request::input('status');
        $this->order->save();
        $this->result['message'] = '修改成功'; 
    } 
    
    protected function saveChange()
    {
        if(Request::has('order_amount')){
            if(Request::input('order_amount')<0){
                throw new Exception('请输入一个正数');
            }
        }
        $order=Order::find($this->orderid);
        $status1=$order->status;
        $status2=Request::input('status');
        $status3=array('status1'=>$status1,'status2'=>$status2);
        $status=json_encode($status3);
        $order_amount1=$order->order_amount;
        $order_amount2=Request::input('order_amount');
        $order_amount3=array('order_amount1'=>$order_amount1,'order_amount2'=>$order_amount2);
        $order_amount=json_encode($order_amount3);
        
        $orderchange=new OrderChange;
        $orderchange->order_id=$order->order_id;
        $orderchange->status=$status;
        $orderchange->order_amount=$order_amount;
        $orderchange->save();
    }  
}

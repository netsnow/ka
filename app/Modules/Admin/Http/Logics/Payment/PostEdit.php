<?php
/**
 * Created by PhpStorm.
 * User: jinzongyu
 * Date: 2015/8/18
 * Time: 10:44
 */

namespace App\Modules\Admin\Http\Logics\Payment;

use Hamcrest\Arrays\IsArray;

use App\Eloquents\Payment;
use Exception;
use Request;
use Validator;

class PostEdit extends \BaseLogic
{
    protected function execute()
    {
    	if(Request::has('sort_order'))
    	{
    		if(!is_numeric(Request::input('sort_order')) ){
    			$this->result['message'] = '排序请输入数字';
    			return;
    		}
    		if(Request::input('sort_order') < 0 )
    		{
    			$this->result['message'] = '输入的排序小于0';
    			return;
    		}
    	}
        try {
            $this->validate();
            $this->savePayment();
            $this->result['result'] = true;
        } catch (Exception $e) {
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
        }
    }

    protected function validate()
    {
        $validator = Validator::make(Request::all(), [
            'payment_name'  => 'required|max:50',
            'sort_order'        => 'required',
        ]);
        if ($validator->fails()) {
            throw new Exception($validator->messages()->first());
        }
        // 判断id是否存在
        $this->payment = Payment::find($this->paymentId);
        if (!$this->payment) {
            throw new Exception('支付方式不存在');
        }
        $getPayment = Payment::where('payment_name', Request::input('payment_name'))
                               ->whereRaw('payment_id != '.$this->paymentId)
                               ->first();
        if ($getPayment) {
            throw new Exception('支付方式名已经存在');
        }
        
        /* $config = Request::input('config');
        if( !is_array( json_decode($config,true) ) )
        {
        	throw new Exception('格式非法');
        } */
    }

    protected function savePayment()
    {
    	
    	/* $aa = Request::input('config');
    	if (!preg_match('/^[A-Za-z0-9:,]+$/', $aa))
    	{
    		throw new Exception('输入格式不正确');
    	}
    	$len = 0;
    	for($i = 0;$i < strlen( $aa );$i++)
    	{
    		if($aa[$i] == ":" or $aa[$i] == ",")
    			$len+=1;
    	}
    	$arr = [];
    	$arr[] = strtok($aa, ":,");
    	for($j = 1;$j < $len;$j++)
    	{
    	$arr[] = strtok(":,");
    	}
    	$array = [];
    	for($k = 0;$k < $len;$k++)
    	{
    		$array[$arr[$k]] = $arr[++$k];
    	}
    	$data = json_encode($array); */
        $this->payment->payment_name = Request::input('payment_name');
        //$this->payment->config = Request::input('config');
        //$this->payment->config = $data;
        $this->payment->payment_desc = Request::input('payment_desc');
        $this->payment->is_enabled = Request::input('is_enabled');
        $this->payment->sort_order = Request::input('sort_order');
        $this->payment->save();
        $this->result['message'] = '支付管理编辑成功';
    }
}

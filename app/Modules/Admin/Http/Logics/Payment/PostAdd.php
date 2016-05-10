<?php
/**
 * Created by PhpStorm.
 * User: jinzongyu
 * Date: 2015/8/18
 * Time: 10:45
 */

namespace App\Modules\Admin\Http\Logics\Payment;

use App\Eloquents\Payment;
use Exception;
use Request;
use Validator;

class PostAdd extends \BaseLogic
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
            'payment_name'  => 'required|max:50|unique:payment',
            'sort_order'        => 'required',
        ]);
        if ($validator->fails()) {
            throw new Exception($validator->messages()->first());
        }
    }

    protected function savePayment()
    {
    	/* $aa = Request::input('config');
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
        $newPayment = new Payment;
        $newPayment->payment_name = Request::input('payment_name');
        //$newPayment->config = Request::input('config');
        //$newPayment->config = $data;
        $newPayment->payment_desc = Request::input('payment_desc');
        $newPayment->is_enabled = Request::input('is_enabled');
        $newPayment->sort_order = Request::input('sort_order');
        $newPayment->save();
        $this->result['message'] = '支付方式添加成功';
    }
}

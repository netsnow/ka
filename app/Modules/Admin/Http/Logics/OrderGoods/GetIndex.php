<?php

namespace App\Modules\Admin\Http\Logics\OrderGoods;

use App\Eloquents\OrderGoods;
use App\Eloquents\Order;
use App\Eloquents\Setting;
use Exception;
use Request;

class GetIndex extends \BaseLogic
{
    protected function execute()
    {
        $this->getStore();
    }


    protected function getStore()
    {
    	$store_code=$this->store_code;
    	
    	$store=Setting::where('key','=','store')
    	               ->first();
    	$storecode=$store['value'];
    	$store_result=json_decode($storecode,true);
    	for($i=0;$i<count($store_result);$i++){
    		if($store_result[$i]['store_code']==$store_code){
    			$store_name=$store_result[$i]['store_name'];
    		}
    		
    	}
    	if(empty($store_name)){
    		
    		$this->result['order_goods']=null;
    	}
    	else{
    		//dd($store_name);
        $getStore = OrderGoods::where('store_name',$store_name)
            ->whereHas('order', function($query)
                             {
                                 $query->where('order_type', '=', 'goods')
                                     ->Where('status', '=', 1);
                             })
                              ->get();
         //dd($getStore);
         $res = [];
         for($i=0;$i<count($getStore);$i++)
        {
         $id = $getStore[$i]->order_id;
        //dd($id);
         $res[] = Order::where('order_id',$id)
                               ->first()->toArray();
    	}
    // if(empty($res)){
   //         $re=null;
   //     } else{
    //        $re=$res->toArray();
    //    }
    	//dd($res);
    	$this->result['store_code'] = $res;
    	$this->result['canshu'] = $store_code;
        $this->result['ceshi'] = $getStore;
    }
    }}

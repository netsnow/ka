<?php
namespace App\Modules\Admin\Http\Logics\Goods;

use App\Eloquents\Goods;
use Exception;
use Request;

class GoodsEdit extends \BaseLogic
{
    protected function execute()
    {   $this->editGoods();
      /* try {	
			$this->validate();
			
			$this->result['result'] = true;
		} catch (Exception $e) {
			$this->result['result']  = false;
			$this->result['message'] = $e->getMessage();	
		}	  */
    	
    }
     protected function validate()
    {
    	foreach (Request::input('goods_id') as $value) {
    		if (!is_numeric($value)) {
    			throw new Exception('system error');
    		}
    	}
    } 
    protected function editGoods()
    {   
    	$goods_id=Request::input('goods_id')[0];
    	$result = Goods::find($goods_id);  
    	if($result->is_on_sale==0){
    	  $result->is_on_sale = '1' ;
    	  $result->save();
    	  $this->result['message'] = '品牌上架成功';
    	 }else{
    	 	$result->is_on_sale = '0';
    	 	$result->save();
    	 	$this->result['message'] = '品牌下架成功';
    	 }   	   
    }
}
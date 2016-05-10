<?php
namespace App\Modules\Admin\Http\Logics\Goods;

use App\Eloquents\Goods;
use Exception;
use Request;

class ApiDelete extends \BaseLogic
{
	protected function execute()
	{
		try {	
			$this->validate();
			$this->deleteGoods();	
			$this->result['result'] = true;
		} catch (Exception $e) {
			$this->result['result']  = false;
			$this->result['message'] = $e->getMessage();	
		}			
	}
	protected function validate()
	{
		foreach (Request::input('goods_id') as $value) {
			if (!is_numeric($value)) {
				throw new Exception('system error');
			}
		}
	}
	protected function deleteGoods()
	{   
		Goods::destroy(Request::input('goods_id'));
		$this->result['message'] = '商品删除成功';
	}
}
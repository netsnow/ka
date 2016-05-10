<?php
namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\OrderGoods;

class StoreCodeController extends \BaseController
{
	public function getIndex($store_code)
	{
		$logic = new OrderGoods\GetIndex();
		$logic->set('store_code', $store_code);
		$result = $logic->run();
	   
		return view(tpl('admin.storeOrder.storeOrder'))->with('result', $result);
	}
	

}
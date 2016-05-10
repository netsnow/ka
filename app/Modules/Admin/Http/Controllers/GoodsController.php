<?php
namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Goods;

class GoodsController extends \BaseController
{
	public function __construct()
	{
		view()->share('active', 'goods');
	}
	public function getIndex()
	{
		$logic = new Goods\GetIndex();
		$result = $logic->run();
	
		if ($result['redirect'] === true) {
			return redirect($result['redirectUrl']);
		}
	
		return view(tpl('admin.goods.index'))->with('result', $result);
	}
	public function apiDelete()
	{
		$logic = new Goods\ApiDelete();
		$result = $logic->run();
	
		return $result;
	}
	public function goodsEdit()
	{   
		$logic = new Goods\GoodsEdit();
		$result = $logic->run();
		return $result;
	}
	
	public function getAdd()
	{
		return view(tpl('admin.goods.add'));
	}
	
	public function postAdd()
	{
    	$logic = new Goods\PostAdd();
        $result = $logic->run();

        return $result;
	}
	
	public function getEdit($id)
	{
		$logic = new Goods\GetEdit();
		$logic->set('goodsid', $id);
		$result = $logic->run();
	
		return view(tpl('admin.goods.edit'))->with('result', $result);
	}
	
	public function postEdit($id)
	{
		$logic = new Goods\PostEdit();
		$logic->set('goodsid', $id);
		$result = $logic->run();
	
		return $result;
	}
	
	public function getCopy($id)
	{
		$logic = new Goods\GetCopy();
		$logic->set('goodsid', $id);
		$result = $logic->run();
	
		return view(tpl('admin.goods.copy'))->with('result', $result);
	}
	
	public function postCopy()
	{
		
		$logic = new Goods\PostCopy();
		$result = $logic->run();
	
		return $result;
	}
}
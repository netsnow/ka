<?php

namespace App\Modules\Admin\Http\Logics\Goods;

use App\Eloquents\Goods;
use Request;
use Validator;
use Exception;

class PostCopy extends \BaseLogic
{
    protected function execute()
	{   
		if(Request::has('price'))
		{
			if(Request::input('price') < 0 )
			{
				$this->result['message'] = '输入的金额小于0';
				return;
			}
		}
		
		try {
	
			$this->validate();
			$this->saveGoods();
	
			$this->result['result'] = true;
	
		} catch (Exception $e) {
	
			$this->result['result']  = false;
			$this->result['message'] = $e->getMessage();
	
		} 
	}
	protected function validate()
	{
		$validator = Validator::make(Request::all(), [
				'goods_name'  => 'required',
				'price'       => 'required',
				]);
	
		if ($validator->fails()) {
			throw new Exception($validator->messages()->first());
		}
	}
	protected function saveGoods()
	{
		if (Request::hasFile('goods_img'))
		{
			$targetDir = public_path() . '/data/uploads';
			$newName   = time() . '_' . rand( 1 , 1000000 ) . ".png";
			Request::file('goods_img')->move($targetDir, $newName);
			$goods_img = '/data/uploads/' . $newName;
			 
		}
		$goods_name=Request::input('goods_name');
		$price=Request::input('price');
		$goods_brief=Request::input('goods_brief');
		$store_name=Request::input('store_name');
		$goods=Goods::where('store_name','=',$store_name)->get();

		if(!(count($goods) > 0))
		{
			$newGoods = new Goods();
			$newGoods->goods_name = $goods_name;
			if(Request::hasFile('goods_img')){
				$newGoods->goods_img  = $goods_img;
			}
			$newGoods->price = $price;
			$newGoods->goods_brief = $goods_brief;
			$newGoods->store_name = $store_name;
			$newGoods->save();
			$this->result['message'] = '商品添加成功';
		}
		else 
		{
			$getGood = Goods::where('goods_name',$goods_name )
			->where('store_name',$store_name)
			->get();
			if(count($getGood)>0)
			{
				throw new Exception('该商品已经存在');
			}
			else {
			$newGoods = new Goods();
			$newGoods->goods_name = $goods_name;
			if(Request::hasFile('goods_img')){
				$newGoods->goods_img  = $goods_img;
			}
			$newGoods->price = $price;
			$newGoods->goods_brief = $goods_brief;
			$newGoods->store_name = $store_name;
			$newGoods->save();
			$this->result['message'] = '商品添加成功';
			}
		}		
	}
}

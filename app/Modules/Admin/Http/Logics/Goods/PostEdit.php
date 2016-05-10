<?php

namespace App\Modules\Admin\Http\Logics\Goods;

use App\Eloquents\Goods;
use Exception;
use Request;
use Validator;

class PostEdit extends \BaseLogic
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

        // 判断id是否存在
        $this->goods = Goods::find($this->goodsid);
        if (!$this->goods) {
            throw new Exception('此商品已被删除');
        }
    }

    /**
     * 保存商品
     * @return void
     */
    protected function saveGoods()
    {
        $this->goods->goods_name = Request::input('goods_name');
        $this->goods->price = Request::input('price');
        $this->goods->goods_brief = Request::input('goods_brief');
        $this->goods->store_name = Request::input('store_name');
        if (Request::hasFile('goods_img'))
        {
            $targetDir = public_path() . '/data/uploads';
            $newName   = time() . '_' . rand( 1 , 1000000 ) . ".png";
        
            Request::file('goods_img')->move($targetDir, $newName);
        
            $this->goods->goods_img = '/data/uploads/' . $newName;
        }

        $this->goods->save();

        $this->result['message'] = '商品编辑成功';
    }
}

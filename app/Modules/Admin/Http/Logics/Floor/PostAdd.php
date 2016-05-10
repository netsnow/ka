<?php

namespace App\Modules\Admin\Http\Logics\Floor;

use App\Eloquents\Floor;
use App\Eloquents\Store;
use Request;
use Validator;
use Exception;

class PostAdd extends \BaseLogic
{
    protected function execute()
	{   
		try {
	
			$this->validate();
			$this->saveFloor();
	
			$this->result['result'] = true;
	
		} catch (Exception $e) {
	
			$this->result['result']  = false;
			$this->result['message'] = $e->getMessage();
	
		} 
	}
	protected function validate()
	{
		$validator = Validator::make(Request::all(), [
				'floor_name'  => 'required|max:50',
			
				]);
	
		if ($validator->fails()) {
			throw new Exception($validator->messages()->first());
		}
	}
	protected function saveFloor()
	{
		if (Request::hasFile('floor_pic'))
		{
			$targetDir = public_path() . '/data/uploads';
			$newName   = time() . '_' . rand( 1 , 1000000 ) . ".png";
			Request::file('floor_pic')->move($targetDir, $newName);
			$floor_pic = '/data/uploads/' . $newName;
			 
		}
		$floor_name=Request::input('floor_name');
		$floor=Floor::where('floor_name','=',$floor_name)->get();
		$floor_isnull=$floor->toArray();
		if(empty($floor_isnull)){
			$newFloor = new Floor();
			$newFloor->floor_name = $floor_name;
            if(Request::hasFile('floor_pic')){
			$newFloor->floor_map_url  = $floor_pic;
            }
			$newFloor->save();
			$this->result['message'] = '楼层添加成功';
		}else{
			throw new Exception('该楼层已经存在');
		}
		
	}
}

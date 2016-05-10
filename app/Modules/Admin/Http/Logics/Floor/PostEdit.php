<?php

namespace App\Modules\Admin\Http\Logics\Floor;

use App\Eloquents\Floor;
use Request;
use Validator;
use Exception;
use DB;

class PostEdit extends \BaseLogic
{
    protected function execute()
    {
        try {
            $this->validate();
            $this->saveFloorStore();

            $this->result['result'] = true;

        } catch (Exception $e) {

            $this->result['result'] = false;
            $this->result['message'] = $e->getMessage();

        }
    }

    protected function validate()
    {
        // 判断id是否存在
        $this->floor = Floor::find($this->floorId);
        if (!$this->floor) {
            throw new Exception('此楼层数据已被删除');
        }
    }
    
    protected function saveFloorStore()
    {
     if (Request::hasFile('floor_pic'))
        {
            $targetDir = public_path() . '/data/uploads';
            $newName   = time() . '_' . rand( 1 , 1000000 ) . ".png";
            Request::file('floor_pic')->move($targetDir, $newName);
            $floor_pic = '/data/uploads/' . $newName;
           
        }
       
           $floor_id=$this->floorId;
           $floor = Floor::find($floor_id);
           if(Request::hasFile('floor_pic')){
           $floor->floor_map_url  = $floor_pic;
           }
           $floor->save();
           $this->result['message'] = '修改成功';
    }
}

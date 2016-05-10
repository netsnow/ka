<?php

namespace App\Modules\Admin\Http\Logics\Floor;

use App\Eloquents\Floor;
use App\Eloquents\Room;
use Exception;
use Request;

class ApiDelete extends \BaseLogic
{
    protected function execute()
    {
        try {

            $this->validate();
            $this->deleteFloor();

            $this->result['result'] = true;

        } catch (Exception $e) {

            $this->result['result'] = false;
            $this->result['message'] = $e->getMessage();

        }
    }

    protected function validate()
    {
        foreach (Request::input('floor_id') as $value) {
            if (!is_numeric($value)) {
                throw new Exception('system error');
            }
        }
    }

    /**
     * 删除品牌
     * @return void
     */
    protected function deleteFloor()
    {
    	$floor_room=0;
        $floor_id_item=Request::input('floor_id');
        $floor_id_num=count($floor_id_item);
        for($i=0;$i<$floor_id_num;$i++){
            $room=Room::where('floor_id','=',$floor_id_item[$i])
            ->get()->toArray();
            if(!empty($room)){
                $floor_room=1;
            }
        }
        if($floor_room==1){
            throw new Exception('该楼层还有房间不能删除');
        }
        else{
            Floor::destroy(Request::input('floor_id'));
            $this->result['message'] = '楼层删除成功';
        }
    }
}

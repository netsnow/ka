<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Eloquents\Room;
use Request;
use Config;

class RoomController extends \BaseController
{
    public function getInfo()
    {
        if (!Request::has('type')){
             return [
                    'result'    => false,
                    'message'   =>'请填全房间类型'
                ];
        }
        $result=Room::select('room_id','room_num','floor_id','room_size','room_type','room_price','room_url')->where('room_type','=',Request::input('type'))->get();
        //dd($result);
        $result_isnull=$result->toArray();
        if(empty($result_isnull)){
             return [
                    'result'    => false,
                    'message'   =>'该房间类型没有房间存在'
                ];
        }
        $array = [
                    'result'    => true,
                    'message'   => '成功',
                    'data'      => '',
                ];
        foreach($result as $key=>$value){
            $url=$result[$key]['room_url'];
            if(empty($url)){
                $result[$key]['room_url']=Config::get('app.url')."/data/uploads/fangjian.jpg";
            }else{
                $result[$key]['room_url']= Config::get('app.url').$url;
            }
        }
        $array['data']['room_info'] = $result;
        return $array;
    }
}
<?php

namespace App\Modules\Admin\Http\Logics\Seat;

use App\Eloquents\Seat;
use App\Eloquents\Room;
use App\Eloquents\Floor;
use App\Eloquents\Seat_price;
use PhpParser\Node\Stmt\If_;
use \Illuminate\Support\Facades\DB;
use Exception;
use Request;
use Validator;

class PostFast extends \BaseLogic
{
    protected function execute()
    {        
         try {
            $this->validate();
            $this->saveFast();    
         
            $this->result['result'] = true;
        
        } catch (Exception $e) {
        
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
        
        } 
    }
    protected function validate()
    {
        $validator = Validator::make(Request::all(), [
                
                ]);
    
        if ($validator->fails()) {
            throw new Exception($validator->messages()->first());
        }
    }
    protected function saveFast()
    {   

        if (!isset($_FILES['fastbg'])) {
            throw new Exception('未上传svc文件');
        }
        $filename = $_FILES['fastbg']['name'];
        if (Request::hasFile('fastbg'))
        {
            $targetDir = public_path() . '/data/uploads';
            $newName   = time() . '_' . rand( 1 , 1000000 ) . ".png";
            Request::file('fastbg')->move($targetDir, $newName);
            $a=public_path() . '/data/uploads/' . $newName;
          
        }
        $file= fopen($a, 'r');  
        while ($data = fgetcsv($file)) {
            $goods_list[] = $data;
        }
        $arr=[];
        $num=count($goods_list);
        for($i=0;$i<$num;$i++){
            if(!isset($goods_list[$i][0])||!isset($goods_list[$i][1])||!isset($goods_list[$i][2])){
                 Array_push($arr,"前三列应该有数据");
                 continue;
            }
            $floor_name=iconv('GB2312', 'UTF-8', $goods_list[$i][0]);
            $room_num=iconv('GB2312', 'UTF-8', $goods_list[$i][1]);
            $seat_name=iconv('GB2312', 'UTF-8', $goods_list[$i][2]);
            $a=$i+1;
            if(empty($floor_name)){
                Array_push($arr,"第".$a."行第1列的楼层名称不能为空。");
                continue;
            }
            if(empty($room_num)){
                Array_push($arr,"第".$a."行第2列的房间名称不能为空。");
                continue;
            }
            if(empty($seat_name)){
                Array_push($arr,"第".$a."行第3列的工位名称不能为空。");
                continue;
            }
            $floor=Floor::where('floor_name',$floor_name)->get();
            $floor_isnull=$floor->toArray();
            if(empty($floor_isnull)){
                Array_push($arr,"第".$a."行第1列的楼层名称不存在，请前去添加。");
                continue;
            }
            $room=Room::whereHas('floor', function($query) use ($floor_name){
				$query->where('floor_name', '=',$floor_name );
			})->where('room_num',$room_num)
            ->get();
            $room_isnull=$room->toArray();
            if(empty($room_isnull)){
                Array_push($arr,"第".$a."行第2列的该楼层的该房间不存在，请前去添加。");
                continue;
            }
            if($room[0]['room_type']!='workshop'){
                Array_push($arr,"第".$a."行第2列的该房间不是工作间不能添加。");
                continue;
            }
            $room_id=$room[0]['room_id'];
            $seat=Seat::where('room_id',$room_id)
                      ->where('seat_name',$seat_name)->get();
            
            $seat_isnull=$seat->toArray();
           
            if(!empty($seat_isnull)){
                //Array_push($arr,"第".$a."行第3列的该工位已经存在。");
                continue;
            }else{
                $seat = new Seat;
                $seat->seat_name = $seat_name;
                $seat->room_id = $room_id;
                $seat->save();
            }
            
            
        
        }
        /*for($i=0;$i<$num;$i++)
        {
            $a=$i+1;
            for($j = 0; $j < 4; $j++)//3为excel表的列
            {
                switch($j)
                {
                    case 0:
                        if(empty($goods_list[$i][$j])){
                            Array_push($arr,"第".$a."行第1列的楼层名称不能为空。");
                            continue;
                        } else{
                            $floor_name =iconv('GB2312', 'UTF-8', $goods_list[$i][$j]);
                            
                            $floor_id = Floor::select('floor_id')->where('floor_name','=',$floor_name)->get()->toArray();
                            if(empty($floor_id))
                            {
                                $floor = new Floor;
                                $floor->floor_name = $floor_name;
                                $floor->save();
                            }
                        }
                        break;
                    case 1:
                         if(empty($goods_list[$i][$j])){
                            Array_push($arr,"第".$a."行第2列的房间名不能为空。");
                            continue;
                        } else {
                            $floor_name = iconv('GB2312', 'UTF-8', $goods_list[$i][$j-1]);
                            $room_num = iconv('GB2312', 'UTF-8', $goods_list[$i][$j]);
                            $floorid = Floor::select('floor_id')->where('floor_name','=',$floor_name)->get();
                            $floor_id=$floorid['0']['floor_id'];
                            $room_id =Room::select('room_id')->where('room_num','=',$room_num)
                                          ->where('floor_id','=',$floor_id)->get()->toArray();   
                                             
                            if(empty($room_id))
                            {
                                $room = new Room;
                                $room->room_num = $room_num;
                                $room->floor_id = $floor_id;
                                $room->save();
                            }
                        }
                        break;
                    case 2:
                         if(empty($goods_list[$i][$j])){
                            Array_push($arr,"第".$a."行第3列的座位名不能为空。");
                            continue;
                         } else {
                        
                        break;
                        case 3:
                            $seatprice=Seat_price::where('seat_type_id',$goods_list[$i][$j])->get()->toArray();
                            if(empty($goods_list[$i][$j])){
                                Array_push($arr,"第".$a."行第4列的座位类型不能为空。");
                            } elseif(!is_numeric($goods_list[$i][$j])){
                                Array_push($arr,"第".$a."行第4列的座位类型必须为数字。");
                            } elseif(empty($seatprice)){
                                Array_push($arr,"第".$a."行第4列的座位类型不存在。");
                            } else{
                                $room_num = $goods_list[$i][$j-2];
                                $seat_name = $goods_list[$i][$j-1];
                                $seat_name = $goods_list[$i][$j-1];
                                $roomid = Room::select('room_id')->where('room_num','=',$room_num)->get();
                                $room_id=$roomid['0']['room_id'];
                                $seat_id =Seat::select('seat_id')->where('seat_name','=',$seat_name)
                                ->where('seat_name','=',$seat_name)->get()->toArray();
                                if(empty($seat_id))
                                {
                                    $seat = new Seat;
                                    $seat->seat_name = $seat_name;
                                    $seat->room_id = $room_id;
                                    $seat->save();
                                }
                            }
                }
                
            }
            
        }*/
        
     
        fclose($file);
        if(empty($arr)){
        $this->result['message']='全部添加成功';
        }else{
            //$arrjson=json_encode($arr);
        $this->result['message']='下列添加失败，其余的添加成功';
        //$this->result['error']=$arr;
        $this->result['arr'] = $arr;
        }
    }
    
}
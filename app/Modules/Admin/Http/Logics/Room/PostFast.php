<?php

namespace App\Modules\Admin\Http\Logics\Room;

use App\Eloquents\Room;
use App\Eloquents\Floor;
use \Illuminate\Support\Facades\DB;
use App\Eloquents\Seat_price;
use PhpParser\Node\Stmt\If_;
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
         //dd($_FILES['fastbg']);
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
        //dd($goods_list[1][4]);
        $num=count($goods_list);
        $arr=[];
        for($i=0;$i<$num;$i++)
        {   
            if(!isset($goods_list[$i][0])||!isset($goods_list[$i][1])||!isset($goods_list[$i][2])||!isset($goods_list[$i][3])||!isset($goods_list[$i][4])||!isset($goods_list[$i][5])){
                 Array_push($arr,"前六列应该有数据");
                 continue;
            }
            $room_num=iconv('GB2312', 'UTF-8', $goods_list[$i][0]);
            $floor_name=iconv('GB2312', 'UTF-8', $goods_list[$i][1]);
            $room_size=iconv('GB2312', 'UTF-8', $goods_list[$i][2]);
            $room_type=iconv('GB2312', 'UTF-8', $goods_list[$i][3]);
            $room_price=iconv('GB2312', 'UTF-8', $goods_list[$i][4]);
            $room_descript=iconv('GB2312', 'UTF-8', $goods_list[$i][5]);
            $a=$i+1;
            //dd($room_type);
            if($room_type!='工作间'&&$room_type!='会议室'&&$room_type!='摄影棚'&&$room_type!='路演厅'){
              Array_push($arr,"第".$a."行第4列的房间种类不正确。");
            } elseif(empty($floor_name)){
               Array_push($arr,"第".$a."行第2列的楼层名称不能为空。");
            } elseif(empty($room_size)){
                Array_push($arr,"第".$a."行第3列的房屋人数规格不能为空。");
            } elseif( !is_numeric($room_size)){
                Array_push($arr,"第".$a."行第3列的房屋人数规格应为数字。");
            } elseif(empty($room_price)){
                Array_push($arr,"第".$a."行第5列的房屋价格不能空(“如果工作间则价钱填任意数字”)。");
            }elseif(!is_numeric($room_price)){
                 Array_push($arr,"第".$a."行第5列的房屋价格应为数字。");
            } elseif(empty($room_num)){
                Array_push($arr,"第".$a."行第1列的房屋名称不能为空)。");
            } elseif(strlen($room_descript)>225){
                Array_push($arr,"第".$a."行第6列的房屋描述的长度不能大于225字符。");
            } else{
                if($room_type=='工作间'){
                    if(!isset($goods_list[$i][6])||empty($goods_list[$i][6])){
                        Array_push($arr,"第".$a."行第7列的工作间的工位类型不能为空。");
                        continue;
                    }
                    if(!is_numeric($goods_list[$i][6])){
                        Array_push($arr,"第".$a."行第7列的工作间的工位类型应为数字。");
                        continue;
                    }
                    $seatprice=Seat_price::where('seat_type_id',$goods_list[$i][6])->get()->toArray();
                    if(empty($seatprice)){
                        Array_push($arr,"第".$a."行第7列的工作间的工位类型不存在。");
                        continue;
                    }
                    $room_type1='workshop';
                    $seat_type_id=$goods_list[$i][6];
                    $room_price=0;
                }elseif($room_type=='会议室'){
                    $room_type1='boardroom';
                    $seat_type_id='';
                }elseif($room_type=='摄影棚'){
                    $room_type1='photography';
                    $seat_type_id='';
                }else{
                    $room_type1='roadshow';
                    $seat_type_id='';
                }
                $floor_id = Floor::select('floor_id')->where('floor_name','=',$floor_name)->get()->toArray();
                if(empty($floor_id))
                {
                    $floor = new Floor;
                    $floor->floor_name = $floor_name;
                    $floor->save();
                    $floor_id = Floor::select('floor_id')->where('floor_name','=',$floor_name)->get()->toArray();
                }
                $room1=Room::where('floor_id','=',$floor_id[0]['floor_id'])->where('room_num','=',$room_num)->get()->toArray();
                if(empty($room1)){
                    $room = new Room;
                    $room->room_num = $room_num;
                    $room->floor_id = $floor_id[0]['floor_id'];
                    $room->room_size = $room_size;
                    $room->room_type = $room_type1;
                    $room->room_price = $room_price;
                    $room->room_descript = $room_descript;
                    $room->seat_type_id = $seat_type_id;
                    $room->save();
                }
                else{
                    Room::where('floor_id', $floor_id[0]['floor_id'])
                        ->where('room_num', $room_num)
                        ->update(array('room_size' => $room_size,'room_type' => $room_type1,'room_descript' => $room_descript,'room_price' => $room_price,'seat_type_id' => $seat_type_id));
                }
            }
        }
        //dd($arr);
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
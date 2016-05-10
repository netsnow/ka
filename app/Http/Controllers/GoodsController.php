<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Eloquents\Goods;
use Request;
use Config;

class GoodsController extends \BaseController
{
    public function getGoods(){
        $qb= Goods::select('*');
        if(Request::has('goods_name')){
            $qb->where('goods_name','like','%'.Request::input('goods_name').'%');
        }
        if(Request::has('store_name')){
            $qb->where('store_name',Request::input('store_name'));
        }
        $result = $qb->orderBy('created_at', 'desc')
        ->paginate(20);
        $result_arr=$result->toArray();
        
        $result_num=count($result_arr['data']);
        
        for($i=0;$i<$result_num;$i++){
            $result_arr['data'][$i]['goods_img']= Config::get('app.url').$result_arr['data'][$i]['goods_img'];
        }
        $array = [
                    'result'    => true,
                    'message'   => '成功',
                    'data'      => '',
                ];
        $array['data']['total']=$result_arr['total'];
        $array['data']['goods']=$result_arr['data'];
        return $array;
    }
     public function getstore(){
        $result=Goods::select('store_name')->distinct()->get();
        $array = [
                    'result'    => true,
                    'message'   => '成功',
                    'data'      => '',
                ];
        $array['data']['store']=$result;
        return $array;
     }
}
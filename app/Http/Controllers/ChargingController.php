<?php

namespace App\Http\Controllers;

use App\Eloquents\Charging_price;
use Config;

class ChargingController extends Controller
{
    public function postTypeBath()
    {
    	
        $array = [
            'result'    => true,
            'message'   => '成功',
            'data'      => '',
        ];

        $result = Charging_price::select('charging_type_name', 'charging_price','describe')
                                ->where('charging_type_id', '=', Config::get('attributes.charging_type.bath'))
                                ->orderBy('charging_type_id', 'desc')
                                ->first();
        //$arry1['unit'] = $result;
      // $arry1['unit'] = LIMIT_ROOM_PRICE.'分';
      $charging_type_name=$result['charging_type_name'];
      $charging_price=$result['charging_price'];
      $describe=$result['describe'];
      $unit=LIMIT_CHARGING_PRICE.'分钟';
      $array['data']['charging_type_name']=$charging_type_name;
      $array['data']['charging_price']=$charging_price;
      $array['data']['describe']=$describe;
      $array['data']['unit']=$unit;
      
      
       

        return $array;
    }

    public function postTypeSleep()
    {
        $array=[
            'result'    => true,
            'message'   => '成功',
            'data'      => '',
        ];

        $result = Charging_price::select('charging_type_name','charging_price','describe')
                                ->where('charging_type_id', '=', Config::get('attributes.charging_type.sleep'))
                                ->orderBy('charging_type_id','desc')
                                ->first();
        
        $charging_type_name=$result['charging_type_name'];
        $charging_price=$result['charging_price'];
        $describe=$result['describe'];
        $unit=LIMIT_CHARGING_PRICE.'分钟';
        $array['data']['charging_type_name']=$charging_type_name;
        $array['data']['charging_price']=$charging_price;
        $array['data']['describe']=$describe;
        $array['data']['unit']=$unit;


        return $array;
    }
}

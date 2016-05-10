<?php

namespace App\Modules\Admin\Http\Logics\Setting;

use App\Eloquents\Setting;
use Exception;
use Request;
use Validator;

class PostSetWeather extends \BaseLogic
{
    protected function execute()
    {
        try
        {
            $this->validate();
            $this->saveSetting();	
            $this->result['result'] = true;
        }
        
        catch (Exception $e)
        {
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
        }
    }

    protected function validate()
    {
        $validator = Validator::make(Request::all(), [
            'weather_name'   => 'required',
            'weather_remind' => 'required',
        ]);

        if ($validator->fails())
        {
            throw new Exception($validator->messages()->first());
        }
    }

    /**
     * 保存信息
     * @return void
     */
    protected function saveSetting()
    {
        $name_arr   = Request::input("weather_name");
        $remind_arr = Request::input("weather_remind");
        $array = [];

        for ($j = 0;$j < count($name_arr);$j++)
        {
             if(!
                    ((
                        empty($name_arr[$j])&&empty($remind_arr[$j])
                    )||
                    (
                        !empty($name_arr[$j])&&!empty($remind_arr[$j])
                    )
                    )
                ){
                throw new Exception('请完整填写');
             }
        }
        for ($j = 0;$j < count($name_arr);$j++)
        {
        	if( $name_arr[$j]==null&&$remind_arr[$j]==null){
        		
        	}else{
            $array[] = [
                'weather_name'   => $name_arr[$j],
                'weather_remind' => $remind_arr[$j],
            ];
        	}
        }

        $data = json_encode($array);

        $getKey = Setting::where('key','weather')
                         ->first();

        if (!$getKey)
        {
            $getKey = new Setting();
            $getKey->key = 'weather';
            $getKey->value = $data;
            $getKey->save();
            $this->result['message'] = '天气提醒保存成功';
        }

        if ($getKey)
        {
            $getKey->value = $data;
            $getKey->save();
            $this->result['message'] = '天气提醒编辑成功';
        }
    }
}

<?php

namespace App\Modules\Admin\Http\Logics\Setting;

use App\Eloquents\Setting;
use Exception;
use Request;
use Validator;

class PostSetWifi extends \BaseLogic
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
            'value' => 'required|min:8',
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
        $data = Request::input('value');
        if (!preg_match('/^[A-Za-z0-9]+$/', $data))
        {
        	throw new Exception('密码格式不正确');
        }
        $getKey = Setting::where('key', 'wifi_pw')
                         ->first();

        if (!$getKey)
        {
            $getKey = new Setting();
            $getkey->key = 'wifi_pw';
            $getKey->value = $data;
            $getKey->save();
            $this->result['message'] = 'wifi密码保存成功';
        }
        
        if ($getKey)
        {
            $getKey->value = $data;
            $getKey->save();
            $this->result['message'] = 'wifi密码编辑成功';
        }
    }
}

<?php

namespace App\Modules\Admin\Http\Logics\Setting;

use App\Eloquents\Setting;
use Exception;
use Request;
use Validator;

class PostSetProtocol extends \BaseLogic
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
            'value' => 'required',
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

        $getKey = Setting::where('key', 'protocol')
                         ->first();

        if (!$getKey)
        {
            $getKey = new Setting();
            $getkey->key = 'protocol';
            $getKey->value = $data;
            $getKey->save();
            $this->result['message'] = '服务条款保存成功';
        }

        if ($getKey)
        {
            $getKey->value = $data;
            $getKey->save();
            $this->result['message'] = '服务条款编辑成功';
        }
    }
}

<?php

namespace App\Modules\Admin\Http\Logics\Setting;

use App\Eloquents\Setting;
use Exception;
use Request;
use Validator;

class PostSetEdition_And extends \BaseLogic
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
            'version_message' => 'required',
            'update_url'      => 'required',
            'version_number'  => 'required',
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
        $array = [
        'version_number'  => Request::input('version_number'),
        'update_url'      => Request::input('update_url'),
        'version_message' => Request::input('version_message'),
        ];
        $data = json_encode($array);

        $getKey = Setting::where('key', 'android')
                         ->first();

        if (!$getKey)
        {
            $getKey = new Setting();
            $getKey->key = 'android';
            $getKey->value = $data;
            $getKey->save();
            $this->result['message'] = '版本信息保存成功';
        }

        if ($getKey)
        {
            $getKey->value = $data;
            $getKey->save();
            $this->result['message'] = '版本信息编辑成功';
        }
    }
}

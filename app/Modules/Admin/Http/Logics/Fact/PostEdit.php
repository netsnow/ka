<?php

namespace App\Modules\Admin\Http\Logics\Fact;

use App\Eloquents\Fact;
use Exception;
use Request;
use Validator;

class PostEdit extends \BaseLogic
{
    protected function execute()
    {
        try {

            $this->validate();
            $this->saveFact();

            $this->result['result'] = true;

        } catch (Exception $e) {

            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();

        }
    }

    protected function validate()
    {
        $validator = Validator::make(Request::all(), [
            'fact_name'  => 'required|max:50',
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages()->first());
        }

        // 判断id是否存在
        $this->fact = Fact::find($this->factId);
        if (!$this->fact) {
            throw new Exception('品牌不存在');
        }

        // 判断品牌名是否已经存在
        $getFact = Fact::where('fact_name', Request::input('fact_name'))
                         ->whereRaw('fact_id != '.$this->factId)
                         ->first();

        if ($getFact) {
            throw new Exception('事件已经存在');
        }
    }

    protected function saveFact()
    {
        $this->fact->fact_name = Request::input('fact_name');
        $this->fact->fact_price = Request::input('fact_price');
        $this->fact->save();

        $this->result['message'] = '事件编辑成功';
    }
}

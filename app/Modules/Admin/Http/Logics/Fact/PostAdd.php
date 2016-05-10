<?php

namespace App\Modules\Admin\Http\Logics\Fact;

use App\Eloquents\Fact;
use Exception;
use Request;
use Validator;

class PostAdd extends \BaseLogic
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
            'fact_name'  => 'required|max:50|unique:fact',

        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages()->first());
        }
    }

    protected function saveFact()
    {
        $newFact = new Fact;
        $newFact->fact_name = Request::input('fact_name');
        $newFact->fact_price = Request::input('fact_price');
        $newFact->save();

        $this->result['message'] = '事件添加成功';
    }
}

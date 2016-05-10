<?php
/**
 * Created by PhpStorm.
 * User: jinzongyu
 * Date: 2015/8/19
 * Time: 15:24
 */

namespace App\Modules\Admin\Http\Logics\Payment;

use App\Eloquents\Payment;
use Exception;
use Request;

class PostChange extends \BaseLogic
{
    protected function execute()
    {
        try {
            $this->validate();
            $this->changePayment();
            $this->result['result'] = true;
        } catch (Exception $e) {
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
        }
    }

    protected function validate()
    {
        foreach (Request::input('payment_id') as $value) {
            if (!is_numeric($value)) {
                throw new Exception('system error');
            }
        }
    }

    protected function changePayment()
    {
        $a = Request::input('payment_id')[0];
        $newPayment = Payment::find($a);
        if ($newPayment->is_enabled == 1) {
            $newPayment->is_enabled = '0';
            $newPayment->save();
            $this->result['message'] = '禁用成功';
        }
        else{
            $newPayment->is_enabled = '1';
            $newPayment->save();
            $this->result['message'] = '启用成功';
        }
    }
}

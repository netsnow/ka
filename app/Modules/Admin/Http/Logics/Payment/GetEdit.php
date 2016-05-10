<?php
/**
 * Created by PhpStorm.
 * User: jinzongyu
 * Date: 2015/8/18
 * Time: 10:44
 */

namespace App\Modules\Admin\Http\Logics\Payment;

use App\Eloquents\Payment;

class GetEdit extends \BaseLogic
{
    protected function execute()
    {
        $this->getPayment();
    }

    protected function getPayment()
    {
        $getPayment = Payment::find($this->paymentId);
        if (!$getPayment) {
            abort(404, '没有这个支付方式');
        }
        
        $this->result['payment'] = $getPayment;
        //dd($this->result['payment']['config']);
        //$this->result['payment']['config'] = json_encode($this->result['payment']['config'],JSON_PRETTY_PRINT);
        //dd($this->result['payment']['config']);
    }
}

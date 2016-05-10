<?php
/**
 * Created by PhpStorm.
 * User: jinzongyu
 * Date: 2015/8/18
 * Time: 9:50
 */

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Payment;

class PaymentController extends \BaseController
{
    public function __construct()
    {
        view()->share('active', 'setting');
    }

    public function getIndex()
    {
        $logic = new Payment\GetIndex();
        $result = $logic->run();
        return view(tpl('admin.payment.index'))->with('result', $result);
    }

    public function getEdit($id)
    {
        $logic = new Payment\GetEdit();
        $logic->set('paymentId', $id);
        $result = $logic->run();
        return view(tpl('admin.payment.edit'))->with('result', $result);
    }

    public function postEdit($id)
    {
        $logic = new Payment\PostEdit();
        $logic->set('paymentId', $id);
        $result = $logic->run();
        return $result;
    }

    public function postChange()
    {
        $logic = new Payment\PostChange();
        $result = $logic->run();
        return $result;
    }

    public function getAdd()
    {
        return view(tpl('admin.payment.add'));
    }

    public function postAdd()
    {
        $logic = new Payment\PostAdd();
        $result = $logic->run();
        return $result;
    }
}

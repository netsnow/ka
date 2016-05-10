<?php
/**
 * Created by PhpStorm.
 * User: jinzongyu
 * Date: 2015/8/18
 * Time: 10:12
 */

namespace App\Modules\Admin\Http\Logics\Payment;

use App\Eloquents\Payment;

class GetIndex extends \BaseLogic
{
    protected function execute()
    {
        $this->getPaymentList();
    }

    protected function getPaymentList()
    {
        $result = Payment::orderBy('sort_order')
                           ->orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);
        $this->result['payments'] = $result;
    }
}

<?php

namespace App\Modules\Admin\Http\Logics\Order;

use App\Eloquents\Order;
use App\Eloquents\Store;
use Request;
use Auth;
use Cache;
use Validator;
use Exception;
use DB;

class GetIndex extends \BaseLogic
{
    protected function execute()
    {
    	try {
	        $this->init();
	        $this->getOrderList();
    	} catch (Exception $e) {
    		$this->result['error']  = $e->getMessage();
    	}
    }

    protected function init()
    {
        $page       = (int) Request::input('page');
        $this->page = ($page < 1) ? 1 : $page;
        $this->result['redirect'] = false;
    }

    protected function getOrderList()
    {
        $qb= Order::where('status',99);
        $qb=$qb->leftjoin('users', 'order.buyer_phone', '=', 'users.phone');
        $date=Request::input('attendance_date');
        $name=Request::input('teacher_name');

        if(Request::has('attendance_date')) {
            if(!strtotime(Request::input('attendance_date'))){
                throw new Exception('请输入正确的时间');
            }
            $qb->whereRaw('attendance_date like "%'.$date.'%"');
            $this->result['attendance_date'] = Request::input('attendance_date');
        }

        if(Request::has('teacher_name')) {
            $qb->whereRaw('real_name like "%'.$name.'%"');
            $this->result['teacher_name'] = Request::input('teacher_name');
        }


        $result = $qb->orderBy('order.attendance_date', 'desc')
            ->paginate(LIMIT_PER_PAGE);
        $this->result['orders'] = $result;


        if ($this->page > $result->lastPage() && $result->lastPage() > 0)
        {
            return $this->getRedirectUrl($result->lastPage());
        }
    }

    protected function getRedirectUrl($lastPage)
    {
        $this->result['redirect'] = true;
        $query = [];
        foreach (Request::query() as $key => $value)
        {
            if ($key !== 'page')
            {
                $query[] = $key . '=' . $value;
            }
            else
            {
                $query[] = $key . '=' . $lastPage;
            }
        }
        $this->result['redirectUrl'] = '/admin/order?' . implode('&', $query);
    }
}

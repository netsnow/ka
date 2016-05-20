<?php

namespace App\Modules\Admin\Http\Logics\Report;

use App\Eloquents\Attendance;
use App\Eloquents\CheckinData;
use App\Eloquents\User;
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
	        $this->getReportList();
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

    protected function getReportList()
    {
        $qb= DB::table('order')
            ->select('order.buyer_phone','users.*',DB::raw('floor(attendance_date/100) as attendance_month'),DB::raw('COUNT(1) as plan_day'), DB::raw('COUNT(IF(status=1,1,NULL)) as ac_day'))
            ->leftJoin('users', 'users.phone', '=', 'order.buyer_phone')
            ->groupby('order.buyer_phone',DB::raw('floor(attendance_date/100)'));
        $date=Request::input('attendance_month');
        $name=Request::input('teacher_name');

        if(Request::has('attendance_month')) {
            if(!strtotime(Request::input('attendance_month'))){
                throw new Exception('请输入正确的时间');
            }
            $qb->whereRaw('attendance_date like "%'.$date.'%"');
            $this->result['attendance_month'] = Request::input('attendance_month');
        }

        if(Request::has('teacher_name')) {
            $qb->whereRaw('real_name like "%'.$name.'%"');
            $this->result['teacher_name'] = Request::input('teacher_name');
        }


        $result = $qb->orderBy('attendance_month', 'desc')
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

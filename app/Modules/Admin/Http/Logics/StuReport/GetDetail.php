<?php

namespace App\Modules\Admin\Http\Logics\StuReport;

use App\Eloquents\User;
use Request;
use Auth;
use Cache;
use Validator;
use Exception;
use DB;

class GetDetail extends \BaseLogic
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
        $qb= DB::table('checkin_data')
            ->whereRaw('user_id = '.$this->student_id);
        $date=Request::input('attendance_date');

        if(Request::has('attendance_date')) {
            if(!strtotime(Request::input('attendance_date'))){
                throw new Exception('请输入正确的时间');
            }
            $qb->whereRaw('checkin_datetime like "%'.$date.'%"');
            $this->result['attendance_date'] = Request::input('attendance_date');
        }



        $result = $qb->orderBy('checkin_datetime', 'desc')
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

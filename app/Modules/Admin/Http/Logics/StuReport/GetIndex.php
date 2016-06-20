<?php

namespace App\Modules\Admin\Http\Logics\StuReport;

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
        $qb= DB::table('checkin_data')
            ->select('students.*',DB::raw('floor(checkin_datetime/1000000) as attendance_month'),DB::raw('COUNT(1) as ac_day'))
            ->leftJoin('students', 'students.student_id', '=', 'checkin_data.user_id')
            ->groupby('checkin_data.user_id',DB::raw('floor(checkin_datetime/1000000)'));
        $date=Request::input('attendance_month');
        $name=Request::input('student_name');
        $class=Request::input('attendance_class');

        if(Request::has('attendance_month')) {
            if(!strtotime(Request::input('attendance_month'))){
                throw new Exception('请输入正确的时间');
            }
            $qb->whereRaw('floor(checkin_datetime/1000000) like "%'.$date.'%"');
            $this->result['attendance_month'] = Request::input('attendance_month');
        }

        if(Request::has('student_name')) {
            $qb->whereRaw('real_name like "%'.$name.'%"');
            $this->result['student_name'] = Request::input('student_name');
        }
        if(Request::has('attendance_class')) {
            $qb->whereRaw('company_name like "%'.$class.'%"');
            $this->result['attendance_class'] = Request::input('attendance_class');
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
        $this->result['redirectUrl'] = '/admin/report?' . implode('&', $query);
    }
}

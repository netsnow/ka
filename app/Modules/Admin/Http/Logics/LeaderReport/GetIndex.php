<?php

namespace App\Modules\Admin\Http\Logics\LeaderReport;

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
        $qb= DB::table('students')
            ->select(DB::raw('left(company_name,2) as park_name'),DB::raw('COUNT(1) as ac_day'))
            ->groupby(DB::raw('left(company_name,2)'));


        $result = $qb->orderBy('park_name', 'asc')
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

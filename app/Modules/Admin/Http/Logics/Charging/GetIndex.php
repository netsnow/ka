<?php

namespace App\Modules\Admin\Http\Logics\Charging;

use App\Eloquents\Charging;
use Request;

class GetIndex extends \BaseLogic
{
    protected function execute()
    {
        $this->init();
        $this->getChargingList();
    }

    protected function init()
    {
        $page = (int) Request::input('page');
        $this->page = ($page < 1) ? 1 : $page;
        $this->result['redirect'] = false;
    }

    protected function getChargingList()
    {
    	if (Request::has('minute'))
    	{
    		$time = 60 * Request::has('minute');
    		$result = Charging::whereNull('end_time')
    		->where('start_time', '<', date('Y-m-d H:i:s', time() - $time))
    		->orderBy('created_at', 'desc')
    							->paginate(LIMIT_PER_PAGE);
    		$time1 = date('Y-m-d H:i:s',time());
    		
    	}
    	else
    	{
        $result = Charging::orderBy('created_at', 'desc')
                            ->paginate(LIMIT_PER_PAGE);
    	}
        //dd($result);
        if ($this->page > $result->lastPage() && $result->lastPage() > 0) {
            return $this->getRedirectUrl($result->lastPage());
        }
        $this->result['chargings'] = $result;
    }

    protected function getRedirectUrl($lastPage)
    {
        $this->result['redirect'] = true;
        $query = [];
        foreach (Request::query() as $key => $value) {
            if ($key !== 'page') {
                $query[] = $key . '=' . $value;
            } else {
                $query[] = $key . '=' . $lastPage;
            }
        }
        $this->result['redirectUrl'] = '/admin/charging?' . implode('&', $query);
    }
}

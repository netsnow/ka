<?php

namespace App\Modules\Admin\Http\Logics\Ad;

use App\Eloquents\Ad;
use App\Eloquents\Room;
use Request;

class GetIndex extends \BaseLogic
{
    protected function execute()
    {
        $this->init();
        $this->getAdList();
        $this->getRoom();
        
    }

    protected function init()
    {
        $page       = (int) Request::input('page');
        $this->page = ($page < 1) ? 1 : $page;

        $this->result['redirect'] = false;
    }

    /**
     * 取得广告列表
     * @return void
     */
    protected function getAdList()
    {
    	if (Request::has('room')) {
    		$result = Ad::whereRaw('room_id like "%' . Request::input('room') . '%"')
    		->orderBy('created_at', 'desc')
    		->paginate(LIMIT_PER_PAGE);
    	} else {
        $result = Ad::orderBy('sort_order')
                    ->orderBy('created_at', 'desc')
                    ->paginate(LIMIT_PER_PAGE);
    	}

        if ($this->page > $result->lastPage() && $result->lastPage() > 0) {
            return $this->getRedirectUrl($result->lastPage());
        }

        $this->result['ads'] = $result;
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

        $this->result['redirectUrl'] = '/admin/ad?' . implode('&', $query);
    }
    
    protected function getRoom()
    {
    	$getRoom=Room::all();
    	$this->result['room']=$getRoom;
    }
}

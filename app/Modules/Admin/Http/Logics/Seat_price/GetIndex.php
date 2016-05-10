<?php

namespace App\Modules\Admin\Http\Logics\Seat_price;

use App\Eloquents\Seat_price;
use Request;

class GetIndex extends \BaseLogic
{
    protected function execute()
    {
        $this->init();
        $this->getSeat_priceList();
    }

    protected function init()
    {
        $page       = (int) Request::input('page');
        $this->page = ($page < 1) ? 1 : $page;

        $this->result['redirect'] = false;
    }


    protected function getSeat_priceList()
    {
        if (Request::has('name')) {
            $result = Seat_price::whereRaw('seat_type_name like "%' . Request::input('name') . '%"')
                           ->orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);
        } else {
            $result = Seat_price::orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);
        }
        if ($this->page > $result->lastPage() && $result->lastPage() > 0) {
            return $this->getRedirectUrl($result->lastPage());
        }
        $this->result['seat_prices'] = $result;
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
        $this->result['redirectUrl'] = '/admin/seat_price?' . implode('&', $query);
    }
}

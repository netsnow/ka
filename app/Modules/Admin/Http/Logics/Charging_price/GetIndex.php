<?php

namespace App\Modules\Admin\Http\Logics\Charging_price;

use App\Eloquents\Charging_price;
use Request;

class GetIndex extends \BaseLogic
{
    protected function execute()
    {
        $this->init();
        $this->getCharging_priceList();
    }

    protected function init()
    {
        $page       = (int) Request::input('page');
        $this->page = ($page < 1) ? 1 : $page;

        $this->result['redirect'] = false;
    }


    protected function getCharging_priceList()
    {
        if (Request::has('name')) {
            $result = Charging_price::whereRaw('charging_type_name like "%' . Request::input('name') . '%"')
                           ->orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);
        } else {
            $result = Charging_price::orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);
        }
        if ($this->page > $result->lastPage() && $result->lastPage() > 0) {
            return $this->getRedirectUrl($result->lastPage());
        }
        $this->result['charging_prices'] = $result;
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
        $this->result['redirectUrl'] = '/admin/charging_price?' . implode('&', $query);
    }
}

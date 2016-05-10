<?php

namespace App\Modules\Admin\Http\Logics\Fact;

use App\Eloquents\Fact;
use Request;

class GetIndex extends \BaseLogic
{
    protected function execute()
    {
        $this->init();
        $this->getFactList();
    }

    protected function init()
    {
        $page       = (int) Request::input('page');
        $this->page = ($page < 1) ? 1 : $page;

        $this->result['redirect'] = false;
    }


    protected function getFactList()
    {
        if (Request::has('name')) {
            $result = Fact::whereRaw('fact_name like "%' . Request::input('name') . '%"')
                           ->orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);
        } else {
            $result = Fact::orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);
        }

        if ($this->page > $result->lastPage() && $result->lastPage() > 0) {
            return $this->getRedirectUrl($result->lastPage());
        }

        $this->result['facts'] = $result;
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

        $this->result['redirectUrl'] = '/admin/fact?' . implode('&', $query);
    }
}

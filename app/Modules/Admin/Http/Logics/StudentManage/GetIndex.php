<?php

namespace App\Modules\Admin\Http\Logics\StudentManage;

use App\Eloquents\User;
use App\Eloquents\Order;
use Request;

class GetIndex extends \BaseLogic
{
    protected function execute()
    {
        $this->init();
        $this->getUserList();
    }

    protected function init()
    {
        $page       = (int) Request::input('page');
        $this->page = ($page < 1) ? 1 : $page;
        $this->result['redirect'] = false;
    }

    protected function getUserList()
    {
        if (Request::has('name'))
        {
            $result = User::whereRaw('phone like "%' . Request::input('name') . '%"')
                           ->orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);
        }
        else
        {
            $result = User::with('order')
                           ->orderBy('created_at', 'desc')
                           ->paginate(LIMIT_PER_PAGE);
        }

        if ($this->page > $result->lastPage() && $result->lastPage() > 0)
        {
            return $this->getRedirectUrl($result->lastPage());
        }
        $this->result['users'] = $result;
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
        $this->result['redirectUrl'] = '/admin/usermanage?' . implode('&', $query);
    }
}

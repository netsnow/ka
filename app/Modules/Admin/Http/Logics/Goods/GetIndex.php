<?php
namespace App\Modules\Admin\Http\Logics\Goods;
use Illuminate\Support\Facades\DB;

use App\Eloquents\Store;
use App\Eloquents\Goods;
use Request;
class GetIndex extends \BaseLogic
{
	protected function execute()
	{
		$this->init();
		$this->getGoodsList();
	}
	protected function init()
	{
		$page       = (int) Request::input('page');
		$this->page = ($page < 1) ? 1 : $page;
	
		$this->result['redirect'] = false;
	}
	protected function getGoodsList()
	{ 
		if(Request::has('goods_name'))
		{
			$result = Goods::whereRaw('goods_name like "%' . Request::input('goods_name') . '%"')
			               ->orderBy('created_at', 'desc')
			               ->paginate(LIMIT_PER_PAGE);
		}
		else
		{
		    $result = Goods::orderBy('created_at', 'desc')
		                   ->paginate(LIMIT_PER_PAGE);
		}
		if ($this->page > $result->lastPage() && $result->lastPage() > 0) {
			return $this->getRedirectUrl($result->lastPage());
		}
		
		$this->result['goods'] = $result;
		
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
	
		$this->result['redirectUrl'] = '/admin/goods?' . implode('&', $query);
	}
	
	
	
}
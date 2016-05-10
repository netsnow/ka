<?php

namespace App\Modules\Admin\Http\Logics\Order;

use App\Eloquents\Order;
use App\Eloquents\Store;
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
	        $this->getOrderList();
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

    protected function getOrderList()
    {
    	Order::where('status',0)->where('order_type','room')
    	->where('created_at', '<' ,date('Y-m-d H:i:s', time() - 600))
    	->update(array('status' => '99'));
        Order::where('status',0)->where('order_type','seat')
    	->where('created_at', '<' ,date('Y-m-d H:i:s', time() - 600))
    	->update(array('status' => '99'));
    	
        $qb= Order::select('*');
        $order=Request::input('order_sn');
        $status=Request::input('status');
        
        $start_time = Request::input('start_date') . ' 00:00:00';
        $end_time = Request::input('end_date') . ' 23:59:59';
        
        if(Request::has('start_date')) {
            if(!strtotime(Request::input('start_date'))){
                throw new Exception('请输入正确的时间');
            }
            $qb->where('created_at','>',$start_time);
            $this->result['start_date'] = Request::input('start_date');
        }
        
        if(Request::has('end_date')) {
            if(!strtotime(Request::input('end_date'))){
                throw new Exception('请输入正确的时间');
            }
            $qb->where('created_at','<',$end_time);
            $this->result['end_date'] = Request::input('end_date');
        }
        
        if(Request::has('start_date') && Request::has('end_date')) {
            if(Request::input('start_date')>Request::input('end_date'))
            {
                throw new Exception('结束时间必须大于开始时间');
            }
        }
             
        if(Request::has('order_sn'))
        {
            $qb->where('order_sn',Request::input('order_sn'));
            $this->result['order_sn'] = Request::input('order_sn');	
        }
        
        if(Request::has('order_type')) {
            $qb->whereRaw('order_type like "%' . Request::input('order_type') . '%"');
            $this->result['order_type'] = Request::input('order_type');
            if(Request::input('order_type') == 'room')
            	$this->result['type'] = "房间预定";
            elseif(Request::input('order_type') == 'seat')
            	$this->result['type'] = "工位";
            elseif(Request::input('order_type') == 'sleep')
            	$this->result['type'] = "睡眠舱";
            elseif(Request::input('order_type') == 'bath')
            	$this->result['type'] = "洗浴";
            elseif(Request::input('order_type') == 'goods')
            $this->result['type'] = "商品购买";
            else
                $this->result['type'] = Request::input('order_type');
        }
        if(Request::has('buyer_phone'))
        {
            $qb->whereRaw('buyer_phone like "%' . Request::input('buyer_phone') . '%"');
            $this->result['buyer_phone'] = Request::input('buyer_phone');	
        }
        
        if(Request::has('status'))
        {
            $qb->where('status',$status);
            $this->result['status'] = Request::input('status');
            if(Request::input('status')==0)
            {
                $this->result['status_type'] = "待付款";
            }else if(Request::input('status') ==1)
            {
                $this->result['status_type'] = "已付款";
            }
        }   
        
        $result = $qb->where('status','!=',99)
                     ->where('order_type','!=','recharge')
                     ->orderBy('created_at', 'desc')
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

<?php

namespace App\Modules\Admin\Http\Logics\Seat;

use Illuminate\Support\Facades\DB;
use App\Eloquents\Room;
use App\Eloquents\Floor;
use App\Eloquents\Seat;
use App\Eloquents\Booking;
use Request;



class GetIndex extends \BaseLogic
{
	protected function execute()
	{
		$this->init();
		$this->getSeatList();
	}
	
	protected function init()
	{
		$page = (int)Request::input('page');
		$this->page = ($page < 1) ? 1 : $page;
	
		$this->result['redirect'] = false;
	}
	
	protected function getSeatList()
	{      		  
		if(Request::has('room_num'))
		{
			if(Request::has('start_time'))
			{
				if(Request::has('long_time'))
				{  
                    if(!is_numeric(Request::input('long_time')) ){
                    	$this->result['message'] = '租赁时长请输入数字';
                        return;
                        }
					if(!strtotime(Request::input('start_time'))){
						$this->result['message'] = '请输入合法时间';
                         return;
                    }
                    $long_time=strtotime(Request::input('start_time'))+Request::input('long_time')*30*24*60*60;
                    $end_time=date("Y-m-d H:m:s",$long_time);
                    if(date("Y-m-d",time())>Request::input('start_time')){
						$this->result['message'] = '开始时间小于当前系统时间';
					}elseif(Request::input('start_time')>=$end_time){
						$this->result['message'] = '结束时间必须大于开始时间';
					}else{
						$room = Room::where('room_num','=',Request::input('room_num'))
						->get();
						$room_isnull=$room->toArray();
						if(!empty($room_isnull)){	
						$room_id=$room['0']['room_id'];
						$result = Seat::where('room_id','=',$room_id)
						->whereNotIn('seat_id', function($q) use ($end_time){
							$q->select('item_id')->from('booking')
							->join('order', 'booking.order_id', '=', 'order.order_id')
							->where('booking.booking_type', '=', 'seat')
							->where('order.order_type', '=', 'seat')
							->where(function($query2) {
                                    $query2->orWhere('order.status', '=', 1)
                                           ->orWhere('order.created_at', '>', date('Y-m-d H:i:s', time() - 600));              
							})
							
							->where('booking.start_time','<',$end_time)
							->where('booking.end_time','>',Request::input('start_time'));
						}) ->paginate(LIMIT_PER_PAGE);
						if ($this->page > $result->lastPage() && $result->lastPage() > 0) {
							return $this->getRedirectUrl($result->lastPage());
						}
						
						$this->result['seat'] = $result;
						}
						else{
							$this->result['message'] = '没有该房间';
						}
					}
					
				}
				else
				{
					$this->result['message'] = '请输租赁时长';
				}
			}
			else
			{
				if(Request::has('long_time'))
				{
					$this->result['message'] = '请输入开始时间';
				}
				else
				{
					//elseif(date("Y-m-d",time())==Request::input('start_time')){
					$room = Room::where('room_num','=',Request::input('room_num'))
			        ->get();
					$room_isnull=$room->toArray();
					if(!empty($room_isnull)){
		
				    $room_id=$room['0']['room_id'];
				
				    $result = Seat::where('room_id','=',$room_id)
				    ->orderBy('created_at', 'desc')
				    ->paginate(LIMIT_PER_PAGE);
				    if ($this->page > $result->lastPage() && $result->lastPage() > 0) {
				    	return $this->getRedirectUrl($result->lastPage());
				    }
				    
				    $this->result['seat'] = $result;
				    }
				    else{
				    	$this->result['message'] = '没有该房间';
				    }
				}
			}
		}
		else
		{
			if(Request::has('start_time'))
			{
				if(Request::has('long_time'))
				{
					if(!is_numeric(Request::input('long_time')) ){
                    	$this->result['message'] = '租赁时长请输入数字';
                        return;
                        }
					if(!strtotime(Request::input('start_time'))){
						$this->result['message'] = '请输入合法时间';
                         return;
                    }
                    $long_time=strtotime(Request::input('start_time'))+Request::input('long_time')*30*24*60*60;
                    $end_time=date("Y-m-d H:m:s",$long_time);
                    if(date("Y-m-d",time())>Request::input('start_time')){
						$this->result['message'] = '开始时间小于当前系统时间';
					}elseif(Request::input('start_time')>=$end_time){
						$this->result['message'] = '结束时间必须大于开始时间';
					}else{
					
					$result = Seat::
						whereNotIn('seat_id', function($q) use ($end_time){
							$q->select('item_id')->from('booking')
							->join('order', 'booking.order_id', '=', 'order.order_id')
							->where('booking.booking_type', '=', 'seat')
							->where('order.order_type', '=', 'seat')
							->where(function($query2) {
                                    $query2->orWhere('order.status', '=', 1)
                                           ->orWhere('order.created_at', '>', date('Y-m-d H:i:s', time() - 600));              
							})
							->where('booking.start_time','<',$end_time)
							->where('booking.end_time','>',Request::input('start_time'));
						}) ->paginate(LIMIT_PER_PAGE);
						if ($this->page > $result->lastPage() && $result->lastPage() > 0) {
							return $this->getRedirectUrl($result->lastPage());
						}
						
						$this->result['seat'] = $result;
					}
				}
				else
				{   
					
					$this->result['message'] = '请输入租赁时长';
				}				
			}
			else
			{
				if(Request::has('end_time'))
				{
					$this->result['message'] = '请输入开始时间';
				}
				else
				{
					
					$result = Seat::orderBy('created_at', 'desc')
			                ->paginate(LIMIT_PER_PAGE);	
					if ($this->page > $result->lastPage() && $result->lastPage() > 0) {
						return $this->getRedirectUrl($result->lastPage());
					}
					
					$this->result['seat'] = $result;
				}				
			}
		}
		

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
		$this->result['redirectUrl'] = '/admin/seat?' . implode('&', $query);
	}
}
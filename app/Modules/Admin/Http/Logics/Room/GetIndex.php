<?php

namespace App\Modules\Admin\Http\Logics\Room;

use Illuminate\Support\Facades\DB;
use App\Eloquents\Room;
use Request;

class GetIndex extends \BaseLogic
{
   protected function execute()
	{
		$this->init();
		$this->getRoomList();
	}
	protected function init()
	{
		$page       = (int) Request::input('page');
		$this->page = ($page < 1) ? 1 : $page;
	
		$this->result['redirect'] = false;
	}
	protected function getRoomList()
	{
		$qb= Room::select('*');
		$room_type=Request::input('room_type');
		$room_num=Request::input('id');
		$floor=Request::input('floor');
		
		if(Request::has('id'))
		{
			$qb->where('room_num',Request::input('id'));
			$this->result['id'] = Request::input('id');
		}
		
		if(Request::has('room_type')) 
		{
			
			if(Request::input('room_type') == '会议室'){
			$this->result['room_type'] = "会议室";
            $room_type='boardroom';}
			elseif(Request::input('room_type') == '工作间'){
			$this->result['room_type'] = "工作间";
            $room_type='workshop';}
			elseif(Request::input('room_type') == '摄影棚'){
			$this->result['room_type'] = "摄影棚";
            $room_type='photography';}
			elseif(Request::input('room_type') == '路演厅'){
			$this->result['room_type'] = "路演厅";
            $room_type='roadshow';}
			else{
				$this->result['room_type'] = Request::input('room_type');
                $room_type=Request::input('room_type');}
                
                $qb->whereRaw('room_type like "%' .$room_type . '%"');
		}
		
		
		
		if(Request::has('floor'))
		{
			$qb->whereHas('floor', function($query){
				$query->where('floor_name', '=',   Request::input('floor') );
			});
		
		}
		
		$result = $qb->orderBy('created_at', 'desc')
		->paginate(LIMIT_PER_PAGE);
		$this->result['room'] = $result;
		
		if ($this->page > $result->lastPage() && $result->lastPage() > 0)
		{
			return $this->getRedirectUrl($result->lastPage());
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
		//$this->result['redirectUrl'] = '/admin/room?' . implode('&', $query);
		$this->result['redirectUrl'] = '/admin/room?' . implode('&', $query);
	}
	
	
}
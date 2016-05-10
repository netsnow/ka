<?php

namespace App\Modules\Admin\Http\Logics\Seat;

use App\Eloquents\Seat;
use App\Eloquents\Booking;
use Exception;
use Request;

class PostDelete extends \BaseLogic
{
	protected function execute()
	{
		
		try {

			//$this->validate();
			$this->deleteSeat();

			$this->result['result'] = true;

		} catch (Exception $e) {

			$this->result['result']  = false;
			$this->result['message'] = $e->getMessage();

		}
	}

	protected function validate()
	{
		foreach (Request::input('seat_id') as $value) {
			if (!is_numeric($value)) {
				throw new Exception('system error');
			}
		}
	}

	/**
	 * 删除品牌
	 * @return void
	 */
	protected function deleteSeat()
	{
		$seat_order = 0;
		$seat_id_item=Request::input('seat_id');
		$seat_id_num=count($seat_id_item);
		for($j=0;$j<$seat_id_num;$j++){
			$result = Booking:: select('order_id')
			->whereHas('order', function($query)
			{
				$query->where('order_type', '=', 'seat')
				->where(function($query2) {
					$query2->orWhere('status', '=', 1)
					->orWhere(function($query3) {
						$query3->where('status', '=', 0)
						->where('created_at', '>', date('Y-m-d H:i:s', time() - 600));
					});
				});
			})
			->where('booking_type', '=', 'seat')
			->where('end_time','>',date('H:m:d H:m:s',time()))
			 
			->where('item_id',$seat_id_item[$j])
			->get()
			->toArray();
			 
			if(!empty($result)){
				$seat_order=1;
			}
		}
		if($seat_order==1){
			throw new Exception('该工位已出租不能删除');
		}
		
		Seat::destroy(Request::input('seat_id'));
		$this->result['message'] = '工位删除成功';
	}
}

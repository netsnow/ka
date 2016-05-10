<?php
namespace App\Eloquents;

class OrderGoods extends \BaseModel
{
	protected $table = 'order_goods';
	protected $primaryKey = 'rec_id';
	
	public function order()
	{
		return $this->hasOne('App\Eloquents\Order', 'order_id', 'order_id');
	}
}
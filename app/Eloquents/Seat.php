<?php

namespace App\Eloquents;

class Seat extends \BaseModel
{
	protected $table = 'seat';
	protected $primaryKey = 'seat_id';

	public function room()
	{
		return $this->hasOne('App\Eloquents\Room', 'room_id', 'room_id');
	}
}
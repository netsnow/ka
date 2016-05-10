<?php

namespace App\Eloquents;

class Room extends \BaseModel
{
    protected $table = 'room';
    protected $primaryKey = 'room_id';

    public function floor()
    {
    	return $this->hasOne('App\Eloquents\Floor', 'floor_id','floor_id');
    }
   
    public function Seat_price()
    {
    	return $this->hasOne('App\Eloquents\Seat_price', 'seat_type_id', 'seat_type_id');
    }
}
	
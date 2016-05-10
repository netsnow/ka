<?php

namespace App\Eloquents;

class Booking extends \BaseModel
{
    protected $table = 'booking';
    protected $primaryKey = 'booking_id';
    
    public function room()
    {
        return $this->hasOne('App\Eloquents\Room',  'room_id', 'item_id');
    }
       
    public function order()
    {
        return $this->belongsTo('App\Eloquents\Order', 'order_id', 'order_id');
    }
    

}

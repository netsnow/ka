<?php

namespace App\Eloquents;

class Ad extends \BaseModel
{
    protected $table = 'ad';
    protected $primaryKey = 'ad_id';
    
    public function room()
    {
    	return $this->hasOne('App\Eloquents\Room',  'room_id', 'room_id');
    }
}

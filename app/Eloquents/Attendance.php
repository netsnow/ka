<?php

namespace App\Eloquents;

class Attendance extends \BaseModel
{
    protected $table = 'attendance';
    protected $primaryKey = 'attendance_id';

    public function user()
    {
    	return $this->hasOne('App\Eloquents\User', 'phone');
    }
}

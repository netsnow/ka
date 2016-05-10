<?php

namespace App\Eloquents;

class Charging extends \BaseModel
{
    protected $table = 'charging';
    protected $primaryKey = 'charging_id';
     public function Charging_price()
    {
        return $this->hasOne('App\Eloquents\Charging_price', 'charging_type_id', 'charging_type_id');
    } 
    public function equpt()
    {
    	return $this->hasOne('App\Eloquents\Equpt',  'equpt_id', 'charging_type_id');
    }
    public function UserManage()
    {
        return $this->hasOne('App\Eloquents\User', 'user_id', 'user_id');
    }
    public function order()
    {
        return $this->belongsTo('App\order', 'order_id', 'order_id');
    }
    
}

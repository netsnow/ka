<?php

namespace App\Eloquents;

class Order extends \BaseModel
{
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    
    public function user()
    {
    	return $this->hasOne('App\Eloquents\User', 'user_id', 'buyer_id');
    }
    
    public function UserManage()
    {
        return $this->belongsTo('App\Eloquents\User');
    }
    
    public function charging()
    {
        return $this->hasOne('App\Eloquents\Charging', 'order_id', 'order_id');
    }

    public function booking()
    {
        return $this->hasMany('App\Eloquents\Booking');
    }
    
    public function order_goods()
    {
    	return $this->hasMany('App\Eloquents\OrderGoods');
    }
}
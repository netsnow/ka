<?php

namespace App\Eloquents;

class AccountHistory extends \BaseModel
{
    protected $table = 'account_history';
    protected $primaryKey = 'account_history_id';
    
    public function order()
    {
    	return $this->hasOne('App\Eloquents\Order', 'order_id', 'order_id');
    }
    
    public function user()
    {
    	return $this->hasOne('App\Eloquents\User', 'user_id', 'user_id');
    }
}


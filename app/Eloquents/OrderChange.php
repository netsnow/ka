<?php

namespace App\Eloquents;

class OrderChange extends \BaseModel
{
    protected $table = 'order_change_log';
	protected $primaryKey = 'change_id';
}
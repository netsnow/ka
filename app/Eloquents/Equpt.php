<?php
namespace App\Eloquents;

class Equpt extends \BaseModel
{
	protected $table = 'equpt';
	protected $primaryKey = 'id';

    public function charging_price()
    {
	return $this->hasOne('App\Eloquents\Charging_price',  'charging_type_id', 'charging_type_id');
    }
}
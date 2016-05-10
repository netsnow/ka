<?php

namespace App\Modules\Admin\Http\Logics\Seat;

use Illuminate\Support\Facades\DB;
use App\Eloquents\Floor;
use Request;

class GetFloor extends \BaseLogic
{
	protected function execute()
	{
		$this->getFloorList();		
	}
	protected function getFloorList()
	{
		$result = Floor::all();
		$this->result['floor'] = $result;
		
	}
}
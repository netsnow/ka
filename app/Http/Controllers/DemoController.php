<?php

namespace App\Http\Controllers;

class DemoController extends \BaseController
{
    public function postIndex(){
    	return utf8_json_encode(['test' => true, 'demo' => true, 'data' => '北京，北京']);
    }
}
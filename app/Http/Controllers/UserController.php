<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use App\UserAdmin;

class UserController extends Controller {

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');

        //
    }
    
    public function action(){
    	//$results = DB::select('select * from tb_store where store_id = ?', [1]);
    	$results = UserAdmin::where('store_id','=',1)->get();dump($results);
    	return $results;
    }

}
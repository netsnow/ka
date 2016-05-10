<?php

namespace App\Modules\Admin\Http\Controllers;

use Request;
use App\Modules\Admin\Http\Logics\Store;

class StoreController extends \BaseController
{
    public function __construct()
    {
        view()->share('active', 'store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $logic = new Store\StoreIndex();
        $result = $logic->run();

        return view(tpl('admin.store.store_list'))->with('StoreList', $result);
    }

    public function getAdd()
    {
        $logic = new Store\StoreGetAdd();
        $result = $logic->run();

        return view(tpl('admin.store.store_edit'))->with('StoreInfo', $result);
    }

    public function getEdit($id)
    {
        $logic = new Store\StoreGetEdit();
        $logic->set('storeId', $id);
        $result = $logic->run();

        return view(tpl('admin.store.store_edit'))->with('StoreInfo', $result);
    }

    public function postAdd()
    {
        $logic = new Store\StorePostAdd();
        $result = $logic->run();

        return $result;
    }

    public function postEdit($id)
    {
        $logic = new Store\StorePostEdit();
        $logic->set('storeId', $id);
        $result = $logic->run();

        return $result;
    }

    public function storeDel()
    {
        $logic = new Store\StoreDel();
        $result = $logic->run();

        return $result;
    }
    public function  postCheck()
    {  
    	
     $logic = new Store\StoreCheck();

    	$result = $logic->run(); 

    	return $result;
    } 

}

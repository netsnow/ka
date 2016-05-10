<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Homepage;

class HomepageController extends \BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $logic = new Homepage\HomepageIndex();
        $result = $logic->run();

        return view(tpl('admin.homepage.homepage_index'))->with('content', $result);
    }

}

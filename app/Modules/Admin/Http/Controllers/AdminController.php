<?php

namespace App\Modules\Admin\Http\Controllers;

class AdminController extends \BaseController
{
    public function index()
    {
        return view(tpl('admin.adminpage.index'));
    }
}

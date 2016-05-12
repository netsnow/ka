<?php

namespace App\Modules\Teacher\Http\Controllers;

class AdminController extends \BaseController
{
    public function index()
    {
        return view(tpl('teacher.adminpage.index'));
    }
}

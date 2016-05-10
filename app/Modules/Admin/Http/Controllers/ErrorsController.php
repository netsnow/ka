<?php

namespace App\Modules\Admin\Http\Controllers;

class ErrorsController extends \BaseController
{
    public function getIndex()
    {
        return view(tpl('admin._errors.admin-404'));
    }
}

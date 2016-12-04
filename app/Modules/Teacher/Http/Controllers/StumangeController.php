<?php

namespace App\Modules\Teacher\Http\Controllers;

use App\Modules\Teacher\Http\Logics\Stumange;
use Request;

class StumangeController extends \BaseController
{

    public function __construct()
    {
        view()->share('active', 'student');
    }

    public function getIndex()
    {
        $logic = new Stumange\GetIndex();
        $result = $logic->run();
        return view(tpl('teacher.stumange.index'))->with('result', $result);
    }
    public function getAdd()
    {
        $logic=new Stumange\GetAdd();
        $result=$logic->run();
        return view(tpl('teacher.stumange.add'))->with('result', $result);
    }
    public function  postAdd()
    {
        $logic=new Stumange\PostAdd();
        $result=$logic->run();
        return $result;
    }
    public function getEdit($id)
    {
        $logic = new Stumange\GetEdit();
        $logic->set('studentid', $id);
        $result = $logic->run();
        return view(tpl('teacher.stumange.edit'))->with('result', $result);
    }
    public function postEdit($id)
    {
        $logic = new Stumange\PostEdit();
        $logic->set('studentid', $id);
        $result = $logic->run();
        return $result;
    }
}

<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Modules\Admin\Http\Logics\Company;

class CompanyController extends \BaseController
{
    public function __construct()
    {
        view()->share('active', 'usermanage');
    }
    
    public function getIndex ()
    {
        $logic=new Company\GetIndex();
        $result=$logic->run();
        if ($result['redirect'] === true) 
        {
            return redirect($result['redirectUrl']);
        }
        return view(tpl('admin.company.company_index'))->with('result', $result); 
    }
    
    public function getAdd()
    {
        return view(tpl('admin.company.company_add'));
    }
    
    public function  postAdd()
    {
        $logic=new Company\PostAdd();
        $result=$logic->run();
        return $result;
    }
    
    public function apiDelete()
    {
        $logic = new Company\ApiDelete();
        $result = $logic->run();
        return $result;
    }
    
    public function getEdit($id)
    {
        $logic = new Company\GetEdit();
        $logic->set('companyid', $id);
        $result = $logic->run();
        return view(tpl('admin.company.company_edit'))->with('result', $result);
    }

    public function postEdit($id)
    {
        $logic = new Company\PostEdit();
        $logic->set('companyid', $id);
        $result = $logic->run();
        return $result;
    }
}
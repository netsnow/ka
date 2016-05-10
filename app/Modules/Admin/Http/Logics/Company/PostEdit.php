<?php

namespace App\Modules\Admin\Http\Logics\Company;

use App\Eloquents\Company;
use Exception;
use Request;
use Validator;
use Crypt;

class PostEdit extends \BaseLogic
{
    protected function execute()
    {
        try 
        {
            $this->validate();
            $this->saveCompany();
            $this->result['result'] = true;
        } 
        catch (Exception $e) 
        {
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
        }
    }
    
    protected function validate()
    {
        $validator = Validator::make(Request::all(), [
                    'company_name'  => 'required',
                    ]);		
        if ($validator->fails()) 
        {
            throw new Exception($validator->messages()->first());
        }
        $this->company = Company::find($this->companyid);
        if (!$this->company) 
        {
            throw new Exception('企业不存在');
        }
        $getCompany = Company::where('company_name', Request::input('company_name'))
        ->whereRaw('company_id != '.$this->companyid)
        ->first();
        if ($getCompany) 
        {
            throw new Exception('企业名称已经存在');
        }
    }
    
    protected function saveCompany()
    {
        $this->company->company_name = Request::input('company_name');
        $this->company->company_information = Request::input('company_information');
        $this->company->save();
        $this->result['message'] = '企业编辑成功';
    }
}

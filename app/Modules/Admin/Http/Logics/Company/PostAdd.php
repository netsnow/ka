<?php

namespace App\Modules\Admin\Http\Logics\Company;

use App\Eloquents\Company;
use Exception;
use Request;
use Validator;
use Crypt;

class PostAdd extends \BaseLogic
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
            'company_name'  => 'required|max:50',
        ]);
        if ($validator->fails())
        {
            throw new Exception($validator->messages()->first());
        }
    }

    protected function saveCompany()
    {
        $newCompany = new Company;

        if(Request::has('company_name')){

            $companyname=Company::where('company_name',Request::input('company_name'))->get();
            $companyname_is_null = $companyname->toArray();

            if(!empty($companyname_is_null)) {
                throw new Exception('班级已存在');
            }

            else{

                    $newCompany->company_name = Request::input('company_name');
                    $newCompany->company_information = Request::input('company_information');
                    $newCompany->save();
                    $this->result['message'] = '班级添加成功';

            }
        }

    }
}

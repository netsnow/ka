<?php

namespace App\Modules\Admin\Http\Logics\Company;

use App\Eloquents\Company;
use Exception;
use Request;
use Validator;
use Crypt;
use DB;

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
            throw new Exception('班级不存在');
        }
        $getCompany = Company::where('company_name', Request::input('company_name'))
        ->whereRaw('company_id != '.$this->companyid)
        ->first();
        if ($getCompany)
        {
            throw new Exception('班级已经存在');
        }
    }

    protected function saveCompany()
    {
        //students表中批量更新班级
        $company_old = $this->company->company_name;
        $company_new = Request::input('company_name');
        DB::table('students')->where('company_name', $company_old)->update(['company_name' => $company_new]);
        //班级表更新班级
        $this->company->company_name = Request::input('company_name');
        $this->company->company_information = Request::input('company_information');
        $this->company->save();
        $this->result['message'] = '班级编辑成功';
    }

}

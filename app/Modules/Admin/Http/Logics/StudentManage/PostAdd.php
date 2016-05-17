<?php

namespace App\Modules\Admin\Http\Logics\StudentManage;

use App\Eloquents\Student;
use Exception;
use Request;
use Validator;

class PostAdd extends \BaseLogic
{
    protected function execute()
    {
        try
        {
            $this->validate();
            $this->saveStudent();
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
            'phone'  => 'required|digits:11|unique:students',
            //'password'  => 'required|min:6',
        	'cardnum'  => 'required',
        	'real_name'  => 'required',
        ]);
        if ($validator->fails())
        {
            throw new Exception($validator->messages()->first());
        }
    }

    protected function saveStudent()
    {

      if (Request::hasFile('img'))
  		{
  			$targetDir = public_path() . '/data/uploads';
  			$newName   = time() . '_' . rand( 1 , 1000000 ) . ".png";
  			Request::file('img')->move($targetDir, $newName);
  			$img = '/data/uploads/' . $newName;

  		}
        $baidu_auth = curl_init();
        curl_setopt($baidu_auth, CURLOPT_URL, "https://openapi.baidu.com/oauth/2.0/token?grant_type=client_credentials&client_id=B9Lu0wxY0T0B3ixtEy3VQ7Q7&client_secret=588b6fa0100126ccf530aadfb1e07992&");
        $output = curl_exec($baidu_auth);
        curl_close($baidu_auth);

        $token = (Array)json_decode($output)->access_token;

        $newStudent = new Student;
        $newStudent->phone = Request::input('phone');
        $newStudent->real_name = Request::input('real_name');
        $pw=Request::input('password');
        $newStudent->password = bcrypt($pw);
        $newStudent->card_num = Request::input('cardnum');
        $newStudent->store_name = Request::input('store_name');
        $newStudent->company_name = Request::input('company');
        $newStudent->audio = $token;
        if(Request::hasFile('img')){
  				$newStudent->img  = $img;
  			}
        $newStudent->save();
        $this->result['message'] = '学生添加成功';
    }
}

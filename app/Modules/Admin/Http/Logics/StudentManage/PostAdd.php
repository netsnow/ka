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
            'parentphone'  => 'required|digits:11',
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
       //百度授权认证
        $baidu_auth = curl_init();
        curl_setopt($baidu_auth, CURLOPT_URL, "https://openapi.baidu.com/oauth/2.0/token?grant_type=client_credentials&client_id=B9Lu0wxY0T0B3ixtEy3VQ7Q7&client_secret=588b6fa0100126ccf530aadfb1e07992");
        curl_setopt($baidu_auth, CURLOPT_RETURNTRANSFER, 1 );
        $output = curl_exec($baidu_auth);
        $token=json_decode($output)->access_token;
        curl_close($baidu_auth);

        //百度语音合成
        $text = Request::input('real_name')."你好";
        $baidu_yuyin = curl_init();
        curl_setopt($baidu_yuyin, CURLOPT_URL, "http://tsn.baidu.com/text2audio?tex=".$text."&lan=zh&cuid=1111&ctp=1&tok=".$token);
        curl_setopt($baidu_yuyin, CURLOPT_RETURNTRANSFER, 1 );
        $output = curl_exec($baidu_yuyin);
        curl_close($baidu_yuyin);
        $targetDir = public_path() . '/data/audio/';
        $filename = time() . '_' . rand( 1 , 1000000 ) . ".mp3";
        $myaudiofile = fopen($targetDir.$filename, "w") or die("Unable to open file!");
        fwrite($myaudiofile, $output);
        fclose($myaudiofile);


        $newStudent = new Student;
        $newStudent->phone = Request::input('phone');
        $newStudent->real_name = Request::input('real_name');
        $pw=Request::input('password');
        $newStudent->password = bcrypt($pw);
        $newStudent->card_num = Request::input('cardnum');
        $newStudent->store_name = Request::input('parentphone');
        $newStudent->company_name = Request::input('company');
        $newStudent->audio = '/data/audio/'.$filename;
        if(Request::hasFile('img')){
  				$newStudent->img  = $img;
  			}
        $newStudent->save();
        $this->result['message'] = '学生添加成功';
    }
}

<?php

namespace App\Modules\Admin\Http\Logics\StudentManage;

use App\Eloquents\Student;
use Exception;
use Request;
use Validator;

class PostEdit extends \BaseLogic
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
        $pw=Request::input('password');
        if($pw=='')
        {
            $validator = Validator::make(Request::all(), [
                    'phone'  => 'required|digits:11',
                    ]);
        }
        else{
            $validator = Validator::make(Request::all(), [
                    'phone'  => 'required|digits:11',
                    //'password'  => 'required|min:6|max:11',
                    ]);
        }

        if ($validator->fails())
        {
            throw new Exception($validator->messages()->first());
        }

        $this->student = Student::find($this->studentid);

        if (!$this->student)
        {
            throw new Exception('会员不存在');
        }

        $getStudent = Student::where('phone', Request::input('phone'))
        ->whereRaw('student_id != '.$this->studentid)
        ->first();

        if ($getStudent)
        {
            throw new Exception('卡号已注册');
        }
        if (Request::has('student_name'))
        {
        $getStudent1 = Student::where('student_name', Request::input('student_name'))
        ->where('role_id','1')
        ->whereRaw('student_id != '.$this->studentid)
        ->first();

        if ($getStudent1)
        {
        	throw new Exception('管理员登陆账号已注册');
        }
        }
    }

    protected function saveStudent()
    {
    	$ri=Request::input('role_id');			//是否是管理员
        $pw=Request::input('password');			//密码变量
        //选中管理员情况
        if($ri==1)
        {
        	//选中管理员，密码为空不变密码
        	if($pw=='')
        	{
        		$this->student->role_id = 1;
        		$this->student->phone = Request::input('phone');
        		$this->student->student_name = Request::input('student_name');
        		$this->student->real_name = Request::input('real_studentname');
        		$this->student->card_num = Request::input('cardnum');
        		$this->student->store_name = Request::input('store_name');
        		$this->student->company_name = Request::input('company');

        	}
        	else
        	//选中管理员，密码不为空变密码
        	{
        		$this->student->role_id = 1;
        		$this->student->phone = Request::input('phone');
        		$this->student->student_name = Request::input('student_name');
        		$this->student->real_name = Request::input('real_studentname');
        		$this->student->password = bcrypt($pw);
        		$this->student->card_num = Request::input('cardnum');
        		$this->student->store_name = Request::input('store_name');
        		$this->student->company_name = Request::input('company');
        	}
        }
        //选中普通用户情况
        else
        {
        	//选中普通用户，密码为空不变密码
        	if($pw=='')
        	{
        		$this->student->role_id = 0;
        		$this->student->phone = Request::input('phone');
        		$this->student->real_name = Request::input('real_name');
        		$this->student->card_num = Request::input('cardnum');
        		$this->student->store_name = Request::input('store_name');
        		$this->student->company_name = Request::input('company');
        	}
        	else
        	//选中普通用户，密码不为空变密码
        	{
        		$this->student->role_id = 0;
        		$this->student->phone = Request::input('phone');
        		$this->student->real_name = Request::input('real_name');
        		$this->student->password = bcrypt($pw);
        		$this->student->card_num = Request::input('cardnum');
        		$this->student->store_name = Request::input('store_name');
        		$this->student->company_name = Request::input('company');
        	}
        }
        if (Request::hasFile('img'))
        {
          $targetDir = public_path() . '/data/uploads';
          $newName   = time() . '_' . rand( 1 , 1000000 ) . ".png";
          Request::file('img')->move($targetDir, $newName);
          $img = '/data/uploads/' . $newName;
          $this->student->img  = $img;
        }

        $this->student->save();
        $this->result['message'] = '学生编辑成功';
    }


}

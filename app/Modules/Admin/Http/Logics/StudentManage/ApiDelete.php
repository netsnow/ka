<?php

namespace App\Modules\Admin\Http\Logics\StudentManage;

use App\Eloquents\Student;
use Exception;
use Request;

class ApiDelete extends \BaseLogic
{
    protected function execute()
    {
        try
        {
            $this->validate();
            $this->deleteStudent();
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
        foreach (Request::input('student_id') as $value)
        {
            if (!is_numeric($value))
            {
                throw new Exception('system error');
            }
        }
    }

    protected function deleteStudent()
    {
    	$arr = Request::input('student_id');
    	for($i = 0;$i < count($arr);$i++)
    	{
    		$student = Student::where('student_id', '=', $arr[$i])->get()->toArray();
    		if($student['0']['role_id'] == 1)
    		{
    			throw new Exception($student['0']['student_name']."为管理员");
    		}
    	}

        Student::destroy(Request::input('student_id'));
        $this->result['message'] = '学生删除成功';
    }
}

<?php

namespace App\Modules\Admin\Http\Logics\UserManage;

use App\Eloquents\User;
use Exception;
use Request;

class ApiDelete extends \BaseLogic
{
    protected function execute()
    {
        try 
        {
            $this->validate();
            $this->deleteUser();
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
        foreach (Request::input('user_id') as $value) 
        {
            if (!is_numeric($value)) 
            {
                throw new Exception('system error');
            }
        }
    }

    protected function deleteUser()
    {
    	$arr = Request::input('user_id');
    	for($i = 0;$i < count($arr);$i++)
    	{
    		$user = User::where('user_id', '=', $arr[$i])->get()->toArray();
    		if($user['0']['role_id'] == 1)
    		{
    			throw new Exception($user['0']['user_name']."为管理员");
    		}
    	}
    	
        User::destroy(Request::input('user_id'));
        $this->result['message'] = '会员删除成功';
    }
}

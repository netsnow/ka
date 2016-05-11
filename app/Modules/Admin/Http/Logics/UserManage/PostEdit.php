<?php

namespace App\Modules\Admin\Http\Logics\UserManage;

use App\Eloquents\User;
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
            $this->saveUser();
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
                    'password'  => 'required|min:6|max:11',
                    ]);
        }

        if ($validator->fails())
        {
            throw new Exception($validator->messages()->first());
        }

        $this->user = User::find($this->userid);

        if (!$this->user)
        {
            throw new Exception('会员不存在');
        }

        $getUser = User::where('phone', Request::input('phone'))
        ->whereRaw('user_id != '.$this->userid)
        ->first();

        if ($getUser)
        {
            throw new Exception('手机号已注册');
        }
        if (Request::has('user_name'))
        {
        $getUser1 = User::where('user_name', Request::input('user_name'))
        ->where('role_id','1')
        ->whereRaw('user_id != '.$this->userid)
        ->first();

        if ($getUser1)
        {
        	throw new Exception('管理员登陆账号已注册');
        }
        }
    }

    protected function saveUser()
    {
    	$ri=Request::input('role_id');			//是否是管理员
        $pw=Request::input('password');			//密码变量
        //选中管理员情况
        if($ri==1)
        {
        	//选中管理员，密码为空不变密码
        	if($pw=='')
        	{
        		$this->user->role_id = 1;
        		$this->user->phone = Request::input('phone');
        		$this->user->user_name = Request::input('user_name');
        		$this->user->real_name = Request::input('real_username');
        		$this->user->card_num = Request::input('cardnum');
        		$this->user->store_name = Request::input('store_name');
        		$this->user->company_name = Request::input('company');

        	}
        	else
        	//选中管理员，密码不为空变密码
        	{
        		$this->user->role_id = 1;
        		$this->user->phone = Request::input('phone');
        		$this->user->user_name = Request::input('user_name');
        		$this->user->real_name = Request::input('real_username');
        		$this->user->password = bcrypt($pw);
        		$this->user->card_num = Request::input('cardnum');
        		$this->user->store_name = Request::input('store_name');
        		$this->user->company_name = Request::input('company');
        	}
        }
        //选中普通用户情况
        else
        {
        	//选中普通用户，密码为空不变密码
        	if($pw=='')
        	{
        		$this->user->role_id = 0;
        		$this->user->phone = Request::input('phone');
        		$this->user->real_name = Request::input('real_name');
        		$this->user->card_num = Request::input('cardnum');
        		$this->user->store_name = Request::input('store_name');
        		$this->user->company_name = Request::input('company');
        	}
        	else
        	//选中普通用户，密码不为空变密码
        	{
        		$this->user->role_id = 0;
        		$this->user->phone = Request::input('phone');
        		$this->user->real_name = Request::input('real_name');
        		$this->user->password = bcrypt($pw);
        		$this->user->card_num = Request::input('cardnum');
        		$this->user->store_name = Request::input('store_name');
        		$this->user->company_name = Request::input('company');
        	}
        }
        if (Request::hasFile('img'))
        {
          $targetDir = public_path() . '/data/uploads';
          $newName   = time() . '_' . rand( 1 , 1000000 ) . ".png";
          Request::file('img')->move($targetDir, $newName);
          $img = '/data/uploads/' . $newName;
          $this->user->img  = $img;
        }
        $this->user->save();
        $this->result['message'] = '会员编辑成功';
    }


}

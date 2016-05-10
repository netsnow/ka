<?php

namespace App\Modules\Admin\Http\Logics\Member;

use App\Eloquents\User;
use Exception;
use Auth;
use Request;
//use Validator;
//use Cache;

class LoginIndex extends \BaseLogic
{
    /**
     * 成功验证注册信息后，进行用户注册
     * @return array 处理结果
     */
    protected function execute()
    {
        try {
            $this->login();
            $this->result['result'] = true;
        } catch (Exception $e) {
            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();
        }
    }


    /**
     * 验证登录用户信息，并登录用户
     * @return void
     */
    protected function login()
    {   // 用户名
        $user_name = Request::input('user_name');
        //$checkbox = Request::has('checkbox');
        $user = [
            'user_name' => $user_name,
            'password'  => Request::input('password'),
        ];
        // 获取具体管理员用户信息
        $newUser = User::where("user_name",$user_name)->whereRaw('role_id >0')->first();
        if($newUser){
           // 验证用户信息是否可以登陆
           if(Auth::attempt($user)) {
                   // 使用具体用户信息，进行登陆
                   Auth::login($newUser);
                   // 记住用户名是否被选中
                   /* if($checkbox == "on"){
                       // 选中，缓存中记录此用户信息
                       Cache::forever('user', $newUser);
                   } */
                   // 返回登陆成功信息
                   $this->result['message'] = '登录成功';
           } else {
               throw new Exception('用户名或密码不正确,请重新输入');
           }
        }else{
           throw new Exception('您没有权限进行登录');
        }
    }
}

<?php

namespace App\Modules\Teacher\Http\Logics\Member;

use App\Eloquents\User;
use Exception;
use Auth;
use Request;
use Validator;
use Crypt;

class UpdateUser extends \BaseLogic
{
    /**
     * 成功验证注册信息后，进行用户注册
     * @return array 处理结果
     */
    protected function execute()
    {
        try {

            $this->checkPassword();
            $this->update();

            $this->result['result'] = true;

        } catch (Exception $e) {

            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();

        }
    }

    /**
     * 验证密码是否和当前用户原有密码相同
     * @return void
     */
    protected function checkPassword()
    {
        $user = [
        //'user_name' => Request::input('user_name'),
        'user_id'  => Auth::user()->user_id,
        'password'  => Request::input('password'),
        ];
        if (!Auth::attempt($user)) {
            throw new Exception("用户填写的旧密码不正确");
        }
    }

    /**
     * 修改用户信息
     * @return void
     */
    protected function update()
    {
        $user = Auth::user();
        $new_password = Request::input('new_password');
        $result = User::find($user['user_id'])->update(["password"=>bcrypt($new_password)]);
        if($result){
            $this->result['message'] = '个人信息修改成功';
        } else {
            throw new Exception('个人信息修改失败');
        }
    }
}

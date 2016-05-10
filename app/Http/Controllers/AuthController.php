<?php

namespace App\Http\Controllers;

use App\Eloquents\User;
use Auth;
use Request;

class AuthController extends \BaseController
{
    public function postLogin()
    {
        $credentials = [
            'user_name' => Request::input('username'),
            'password'  => Request::input('password'),
        ];

        $credentials2 = [
            'phone'     => Request::input('username'),
            'password'  => Request::input('password'),
        ];

        if (Auth::validate($credentials) || Auth::validate($credentials2)) {
            return ['result' => true, 'message' => '登录成功'];
        }

        $getUser = User::where('phone', Request::input('username'));

        if (!$getUser) {
            return ['result' => false, 'message' => '用户不存在'];
        }

        return ['result' => false, 'message' => '密码错误'];
    }
}
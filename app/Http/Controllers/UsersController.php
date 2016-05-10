<?php

namespace App\Http\Controllers;

use App\Eloquents\User;
use Request;
use DB;
use Auth;
use Crypt;

class UsersController extends Controller
{
    public function pwdChange()
    {
    	
    	if(!Request::has('oldpwd'))
    	{
    		return [
    		'result'    => false,
    		'message'   =>'请填写旧密码'
    				];
    	}
    	if(!Request::has('newpwd') || !Request::has('confirm'))
    	{
    		return [
    		'result'    => false,
    		'message'   =>'请填写新密码'
    				];
    	}
    	if(Request::input('newpwd') != Request::input('confirm'))
    	{
    		return [
    		'result'    => false,
    		'message'   =>'两次填写的新密码不同'
    				];
    	}
    	$user=Auth::user();
    	 
    	$credentials = [
    	'user_name' => $user->user_name,
    	'password'  => Request::input('oldpwd'),
    	];
    	$credentials2 = [
    	'phone'     => $user->phone,
    	'password'  => Request::input('oldpwd'),
    	];
    	
    	if(!(Auth::validate($credentials)||Auth::validate($credentials2))){
    		 
    		return [
    		'result'    => false,
    		'message'   =>'原密码不正确'
    				];
    	}
    	
    	$userid=$user->user_id;
    	
    	
    	
    	
    	$new_pwd = bcrypt(Request::input('newpwd'));
    	User::where('user_id', $userid)
    	      ->update(array('password' => $new_pwd));
    	return [
    	'result'    => true,
    	'message'   =>'密码修改成功'
    	       ];
    	
    }
}

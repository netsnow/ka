<?php

namespace App\Modules\Admin\Http\Logics\UserManage;

use App\Eloquents\User;
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
        $validator = Validator::make(Request::all(), [
            'phone'  => 'required|digits:11|unique:users',
            'password'  => 'required|min:6',
        	'cardnum'  => 'required',
        	'real_name'  => 'required',
        ]);
        if ($validator->fails())
        {
            throw new Exception($validator->messages()->first());
        }
    }

    protected function saveUser()
    {
        $newUser = new User;
        $newUser->phone = Request::input('phone');
        $newUser->real_name = Request::input('real_name');
        $pw=Request::input('password');
        $newUser->password = bcrypt($pw);
        $newUser->card_num = Request::input('cardnum');
        $newUser->store_name = Request::input('store_name');
        $newUser->company_name = Request::input('company');
        if (Request::hasFile('img'))
        {
          $targetDir = public_path() . '/data/uploads';
          $newName   = time() . '_' . rand( 1 , 1000000 ) . ".png";
          Request::file('img')->move($targetDir, $newName);
          $img = '/data/uploads/' . $newName;
          $newUser->img = $img;
        }
        $newUser->save();
        $this->result['message'] = '会员添加成功';
    }
}

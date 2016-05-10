<?php
/**
 * 后台用户
 * @author dongjinsuo
 *
 */
namespace App\Modules\Admin\Http\Controllers;

use App\Eloquents\User;
use App\Modules\Admin\Http\Logics\Member;
use Auth;
use Cache;

class UserController extends \BaseController
{
    /**
     * 显示登录页面
     * @return view 登陆界面
     */
    public function getIndex()
    {
        // 获取缓存中用户
        return view(tpl('admin.auth.login'));
        /* $user = Cache::get('user',"");
        $user_name = "";
        // 当用户存在，将用户名带到前台登录页面
        if($user){
            $user_name = $user['user_name'];
        }
        // 已登录用户
        $login_user = Auth::user();
        // 存在已登录用户，直接进入后台主页
        if($login_user && $login_user['role_id'] > 0){
            return redirect("/admin/ad");
        }else{
            // 没有登录用户，跳转至后台登录页
            return view(tpl('admin.user.login'))->with('user_name', $user_name);
        } */
    }

    /**
    * 用户登录处理
    * @return array 登录结果
    */
    public function login()
    {
        // 执行登录操作
        $logic = new Member\LoginIndex();
        $result = $logic->run();
        // 如果登录成功，更新当前用户登录信息
        if($result['result']){
            $this->updateUserLogin();
        }
        //返回最终结果
        return $result;
    }

    /**
    * 用户登陆成功，更新登陆信息（最后登陆时间、登陆IP、登陆次数）
    */
    public function updateUserLogin()
    {
        $user = Auth::user();
        User::find($user['user_id'])->update(["last_login"=>date('y-m-d H:i:s'),"last_ip"=>get_client_ip(),"logins"=>$user['logins']+1]);
    }

    /**
    * 用户个人重置页面跳转
    */
    public function userSetting()
    {
        // 跳转到个人设置界面
        return view(tpl('admin.auth.users'));
    }

    /**
    * 更新用户密码
    * @return 密码修改结果
    */
    public function updateUser()
    {
        // 更新用户密码
        $logic = new Member\UpdateUser();
        $result = $logic->run();
        // 返回处理结果
        return $result;
    }
    
    /**
    * 用户退出登录
    */
    public function logout()
    {
        // 清除已登录用户信息
        Auth::logout();
        // 重定向到后台登录界面
        return redirect("admin/login");
    }
}

<?php

namespace App\Modules\Admin\Http\Logics\UserManage;

use App\Eloquents\User;
Use App\Eloquents\AccountHistory;
use Exception;
use Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\DB;
//use DB;

class PostRecharge extends \BaseLogic
{
    protected function execute()
    {   
        try 
        {
            $this->validate();
            
            $issucess = DB::transaction(function() {
            	
            	$this->saveUser();
            	$this->saveAccountHistory();
            }); 
            
            DB::transaction(function() {
            //$this->Synchronous();
            });
            
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
              'account' => 'numeric',
        		'other_account' =>'numeric' ,    
                    ]);
        if ($validator->fails()) 
        {
            throw new Exception($validator->messages()->first());
        }
    
        $this->user = User::where('user_id',$this->userid)->first();
        
        if (!$this->user) 
        {
            throw new Exception('会员不存在');
        }
        if(Request::input('account')<0) {
        	throw new Exception('请输入一个正数');
        }
        if(Request::input('other_account')<0) {
        	throw new Exception('请输入一个正数');
        }
        $account=Request::input('account');
        
        if($this->user->account+$account<0)
        {
            throw new Exception('余额不足');
        }
    }
    
    
    
    protected function saveUser()
    {
        $this->user->account = Request::input('account')+$this->user->account;
        $this->user->other_account = Request::input('other_account')+$this->user->other_account;
        $this->user->save();
        $this->result['message'] = '充值成功';
    }

    protected function saveAccountHistory()
    {       
         $user=Auth::user();
    	if(Request::has('account')) {
            $newhistory=new AccountHistory;
            $newhistory->user_id = $this->userid;
            $newhistory->account=Request::input('account');
            $newhistory->ac_type=1;
            $newhistory->charge_name='account';
            $newhistory->operator_name=$user->user_name;
            $newhistory->operator_id=$user->user_id;
            $newhistory->flag = 0;
            $newhistory->save();
            
    	}
    	
        if(Request::has('other_account')) {
        	$otherhistory=new AccountHistory;
        	$otherhistory->user_id = $this->userid;
        	$otherhistory->account=Request::input('other_account');
        	$otherhistory->ac_type=1;
        	$otherhistory->charge_name='other_account';
        	$otherhistory->operator_name=$user->user_name;
        	$otherhistory->operator_id=$user->user_id;
        	$otherhistory->flag = 1;
        	$otherhistory->save();
        }
    }
    
    protected function Synchronous()		//同步
    {
    	//拿到类型为充值，为同步的历史记录
    	$res_his = AccountHistory::where('flag',0)
    	->where('charge_name','account')
    	->where('ac_type',1)
    	->get();

    	foreach ($res_his as $res)
    	{
    		//$res->user_id;	//用户ID
    		//$res->ac_type;	//动作类型1为充值2为消费
    		//$res->account;	//充值金额
    		//$res->created_at; //开始时间
    		$res_user = User::where('user_id',$res->user_id)
    						->first();
    		
    		$xiaofei = DB::connection('xiaofei')
    		             ->table('ryxx')
    		             ->where('rfkh',$res_user->card_num)	//卡号
    		             ->first();
    		$ryid = $xiaofei->ryid;		//通过卡号拿到ID
    		$account = $xiaofei->rfye;	//通过卡号拿到余额
    		$account += $res->account;
    		DB::connection('xiaofei')
    		  ->table('ryxx')
    		  ->where('rfkh',$res_user->card_num)	//卡号
    		  ->update(array('rfye' => $account));//同步信息表余额

    		//流水表同步充值记录
    		DB::connection('xiaofei')
    		  ->table('lssj')
    		  ->insert(array('ryid' => $ryid,'xfjh' => 0,'xffs' => 'PHP','xfzl' => '增款','sky' => '管理员  ','rfkh' => $res_user->card_num,'xfje' => $res->account,'rfye' => $account,'xfsj'=> $res->created_at));

    		$res->flag = 1;
    		$res->save();
    	}
    	

    }
}

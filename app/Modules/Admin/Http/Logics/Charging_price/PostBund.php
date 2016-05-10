<?php

namespace App\Modules\Admin\Http\Logics\Charging_price;

use App\Eloquents\Equpt;
use App\Eloquents\Charging_price;
use Exception;
use Request;
use Validator;
use DB;

class postBund extends \BaseLogic
{
    protected function execute()
    {
        try
        {
            $this->validate();
            $this->saveSetting();	
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
            'weather_name'   => 'required',
        ]);

        if ($validator->fails())
        {
            throw new Exception($validator->messages()->first());
        }
        
        
    }

    /**
     * 保存信息
     * @return void
     */
    protected function saveSetting()
    {
    	$getEqupt = Equpt::where('charging_type_id','=',$this->charging_priceId)->get();
    	$id = Request::input("weather_remind");		//id号数组
        $weather_name   = Request::input("weather_name");		//卡机号数组
        $count1 = count($getEqupt);					//拿到条数
        $count2=count(Request::input("weather_name"));
        
        //判断是否重复
        $cheak_isable = false;
        $is_break = false;
        for($k=0;$k<$count2;$k++)
        {
        	$cheak = $weather_name[$k];
        	for($l=0;$l<$count2;$l++)
        	{
        		if($k == $l)
        			continue;
        		if($cheak == '')
        			continue;
        		if($cheak == $weather_name[$l])
        		{
        			$cheak_isable = true;
        			$check_result = $cheak;
        			$is_break = true;
        			break;
        		}	
        	}
        	if($is_break)
        		break;	
        }
        
        if ($cheak_isable) {
        	throw new Exception('本页中卡机号'.$check_result.'有重复');
        }
        
        $charging_price = Charging_price::select('charging_type_id')->get();
        for($o=0;$o<count($charging_price);$o++)
        {
        	if($charging_price->toArray()[$o]['charging_type_id'] == $this->charging_priceId)
        		continue;
        	$check_table_id[] = $charging_price->toArray()[$o]['charging_type_id'];
        }
		for($p=0;$p<count($check_table_id);$p++)
		{
			$check_table = Equpt::where('charging_type_id',$check_table_id[$p])->get()->toArray();
			if($check_table)
			{
				for($w=0;$w<count($check_table);$w++)
				{
					$arr[] = $check_table[$w]['equpt_id'];
				}
				//判断是否重复
				$cheak_isable_1 = false;
				$is_break_1 = false;
				for($e=0;$e<count($arr);$e++)
				{
					$cheak_1 = $arr[$e];
					for($r=0;$r<$count2;$r++)
					{
						if($weather_name[$r] == '')
							continue;
						if($cheak_1 == $weather_name[$r])
						{
							$cheak_isable_1 = true;
							$check_result_1 = $cheak_1;
							$is_break_1 = true;
							break;
						}
					}
					if($is_break_1)
						break;
				}
				
				if ($cheak_isable_1) {
				throw new Exception('本页中卡机号'.$check_result_1.'跟数据库有重复');
				}
 			}
		}

        
        for ($i = 0;$i < $count1;$i++)
        {
        	if($weather_name[$i] == '')
        	{
        		Equpt::destroy($id[$i]);
        		continue;
        	}
        	DB::table('equpt')
    			->where('id','=',$id[$i])
    			->update(array('equpt_id' => $weather_name[$i]));
        }
        for ($j = $count1;$j < $count2;$j++)
        {
        	if($weather_name[$j] == '')
        	{
        		continue;
        	}
        	$newEqupt = new Equpt();
        	$newEqupt->equpt_id = $weather_name[$j];
        	$newEqupt->charging_type_id = $this->charging_priceId;
        	$newEqupt->save();
        }
        $this->result['message'] = '设备号绑定保存成功';
        
    }
}


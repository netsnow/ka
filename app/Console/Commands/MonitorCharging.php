<?php

namespace App\Console\Commands;

use App\Eloquents\Charging;
use App\Eloquents\User;
use App\Eloquents\Order;
use App\Eloquents\AccountHistory;
use Config;
use Illuminate\Console\Command;
use Cache;
use DB;
use Log;

class MonitorCharging extends Command
{
    /**
     * 命令名
     */
    protected $signature = 'monitor:charging';

    /**
     * 命令描述
     */
    protected $description = 'Monitor the CardRecord of charging.';

    protected $last;

    protected $newRecord;

    /**
     * 命令执行入口
     */
    public function handle()
    {
        // Cache::forget('lastCardRecord');exit;
        $start_time = time();

        // debug
        Log::info('monitor:charging is beginning!');

        $idx = 1;
        while (time() - $start_time < 50) {
            if ($idx > 1) {
                sleep(5);
            }

            $issucess = DB::transaction(function() {
                // 取得新记录
                $this->getNewRecord();

                // 处理新记录
                $this->updateCharging();
            });

            // 记录最后处理的记录
            Cache::forever('lastCardRecord', $this->last);

            // debug
            Log::info($this->last);
            var_dump($this->last);
            echo time(),"-{$idx}\n"; Log::info(time() . "-{$idx}\n");

            $idx++;
        }

        // 闭合洗浴超出3小时的刷卡记录
        $this->closeOldTimeBathRecord();
        // 闭合睡眠仓超出24小时的刷卡记录
        $this->closeOldTimeSleepRecord();
    }

    /**
     * 取得sql server中新产生的打卡记录
     */
    protected function getNewRecord()
    {
        // ①初次启动，缓存中无记录
        if (!Cache::has('lastCardRecord')) {

            $res = DB::connection('sqlsrv')
                     ->table('CardRecord')
                     ->orderBy('DataTime')
                     ->get();

        // ②缓存中有永久记录时
        } else {
            // 两次命令衔接，从缓存中取得last
            if (is_null($this->last)) {
                $this->last = Cache::get('lastCardRecord');
            }

            $res = DB::connection('sqlsrv')
                     ->table('CardRecord')
                     ->where('DataTime', '>=', $this->last['time'])
                     ->orderBy('DataTime')
                     ->get();

            // 防止并发漏数据（删掉“=”号带来的重复数据）
            foreach ($res as $record) {
                // 遇到最后一次的，删掉记录并退出循环
                if ($record->EquptID == $this->last['equpt'] && $record->PortNum == $this->last['port']
                  && $record->CardData == $this->last['card']) {
                    array_shift($res);
                    break;
                //删掉记录，继续循环
                } else {
                    array_shift($res);
                }
            }
        }

        $this->newRecord = $res;

        // debug
        var_dump(count($res));
    }

    /**
     * 处理sql server中新产生的打卡记录，闭合计费，生成订单
     */
    protected function updateCharging()
    {
        if (count($this->newRecord) < 1) {
            return;
        }

        foreach ($this->newRecord as  $record) {
            $current = [
                'time'      => $record->DataTime,
                'card'      => $record->CardData,
                'equpt'     => $record->EquptID,
                'port'      => $record->PortNum,
            ];

            // 根据卡号，取得user
            $user = DB::connection('mysql')
                      ->table('users')
                      ->where('card_num', $record->CardData)
                      ->where('deleted_at','=',NULL)
                      ->first();

            $equpt = DB::connection('mysql')
                       ->table('equpt')
                       ->where('equpt_id', $record->EquptID)
                       ->where('deleted_at','=',NULL)
                       ->first();

            if (!$user || !$equpt) {
                $this->last = $current;
                continue;
                
            }

            $charging_price = DB::connection('mysql')
                                ->table('charging_type')
                                ->where('charging_type_id', $equpt->charging_type_id)
                                ->where('deleted_at','=',NULL)
                                ->first();

            $price = $charging_price->charging_price;              // 单价
            $type_name = $charging_price->charging_type_id;        // 洗浴or睡眠

            if($type_name == Config::get('attributes.charging_type.bath')) {
                $type_name = 'bath';
            } elseif($type_name == Config::get('attributes.charging_type.sleep')) {
                $type_name = 'sleep';
            } else {
                $this->last = $current;
                continue;
            }


            // 进门还是出门，如果是进门，新建一条记录
            if ($record->PortNum == 1) {
                 // 找到user在该设备ID上的未结束charging记录，然后delete掉
                 $charging_record = DB::connection('mysql')
                                      ->table('charging')
                                      ->whereNull('end_time')
                                      ->where('user_id', $user->user_id)
                                      ->where('equpt_id', $record->EquptID)
                                      ->where('deleted_at','=',NULL)
                                      ->delete();

                 // 为user生成一条charging记录
                 $newcharging =new Charging;
                 $newcharging->charging_type_id = $record->EquptID;
                 $newcharging->charging_type_name = $type_name;     //刷卡类型名称
                 $newcharging->charging_price = $price;             //刷卡类型单价
                 $newcharging->start_time = date('Y-m-d H:i:s', float_to_unixts($record->DataTime));
                 $newcharging->user_id = $user->user_id;
                 $newcharging->equpt_id = $record->EquptID;
                 $newcharging->save();
            }

            // 如果是出门，生成订单
            elseif ($record->PortNum == 2) {
                 // 1.找到user在该设备ID上的未结束charging记录
                 // 2.然后结束并计算费用生成订单

                 // 找到user在该设备ID上的未结束charging记录，然后结束并计算费用生成订单
                 $phone = $user->phone;            //电话
                 $name = $user->real_name;        //用户名
                 $account = $user->account;        //余额

                 $charging_start = DB::connection('mysql')
                                        ->table('charging')
                                        ->whereNull('end_time')
                                        ->where('user_id', $user->user_id)
                                        ->where('equpt_id', $record->EquptID)
                                        ->where('deleted_at','=',NULL)
                                        ->first();

                if(!$charging_start) {
                    $this->last = $current;
                    continue;
                }

                // 计算消费金额
                $start_time = strtotime($charging_start->start_time);
                $end_time   = float_to_unixts($record->DataTime);
                $minute = ceil(($end_time - $start_time) / 60);
                $num_price = ceil($minute / LIMIT_CHARGING_PRICE);
                $amount = $price * $num_price;

                $account -= $amount;
                $order_sn = time() . '-' . $user->user_id . '-' . rand(10000, 99999);

                // 当可用余额够支付时，扣款生成支付完成的订单
                if ($account >= 0) {
                    //转换格式
                    $save_account = strval($account);

                    DB::connection('mysql')
                      ->table('users')
                      ->where('user_id',$user->user_id)
                      ->where('deleted_at','=',NULL)
                      ->update(array('account' => $save_account));

                    // 生成订单
                    $neworder = new Order;
                    $neworder->order_type = $type_name;
                    $neworder->status = '1';
                    $neworder->buyer_phone = $phone;
                    $neworder->buyer_id = $user->user_id;
                    $neworder->buyer_name = $name;
                    $neworder->order_sn = $order_sn;
                    $neworder->order_amount = $amount;
                    $neworder->save();

                    $order_id = $neworder->order_id;

                    // 完善charging记录
                    $charging_record = DB::connection('mysql')
                                         ->table('charging')
                                         ->whereNull('end_time')
                                         ->where('user_id', $user->user_id)
                                         ->where('charging_type_id', $record->EquptID)
                                         ->where('deleted_at','=',NULL)
                                         ->update(array('end_time' => date('Y-m-d H:i:s', $end_time), 'order_id' => $order_id));

                    // 生成消费history
                    $otherhistory = new AccountHistory;
                    $otherhistory->user_id  = $user->user_id;
                    $otherhistory->order_id = $order_id;
                    $otherhistory->ac_type  = 2;
                    $otherhistory->account  = $amount;
                    $otherhistory->charge_name = 'account';
                    $otherhistory->save();
                }

                // 当可用余额不够支付时，不扣款生成未支付订单
                else {
                    // 生成订单
                    $neworder_0 = new Order;
                    $neworder_0->order_type = $type_name;
                    $neworder_0->status = '0';
                    $neworder_0->buyer_phone = $phone;
                    $neworder_0->buyer_id = $user->user_id;
                    $neworder_0->buyer_name = $name;
                    $neworder_0->order_sn = $order_sn;
                    $neworder_0->order_amount = $amount;
                    $neworder_0->save();

                    $order_id_0 = $neworder_0->order_id;

                    //完善charging记录
                    $charging_record = DB::connection('mysql')
                                         ->table('charging')
                                         ->whereNull('end_time')
                                         ->where('user_id',$user->user_id)
                                         ->where('charging_type_id',$record->EquptID)
                                         ->where('deleted_at','=',NULL)
                                         ->update(array('end_time' => date('Y-m-d H:i:s', $end_time),'order_id' => $order_id_0));
                }
            }

            // 有new才有record，即使本次出错，也至少有上一次的lastCardRecord
            $this->last = $current;
        }
    }

    /**
     * 结算超过3小时未结算的计费
     */
    protected function closeOldTimeBathRecord()    //洗浴
    {
        $threeHoursAgo = date('Y-m-d H:i:s', time() - 3600 * 3);
        $charging_list = DB::connection('mysql')
                           ->table('charging')
                           ->whereNull('end_time')
                           ->where('charging_type_id','=',Config::get('attributes.charging_type.bath'))    // =1 =洗浴
                           ->where('start_time','<', $threeHoursAgo)
                           ->where('deleted_at','=',NULL)
                           ->get();

        if (count($charging_list) < 1) {
            return ;
        }

        foreach ($charging_list as $charging_record) {
            $charging_id    = $charging_record->charging_id;
            $start_time     = $charging_record->start_time;
            $equpt_id       = $charging_record->equpt_id;                   //拿到charging数据对应的刷卡机
            $type_name      = $charging_record->charging_type_name;        //数卡类型
            $price          = $charging_record->charging_price;             //类型单价
            $end_time       = date('Y-m-d H:i:s', strtotime("$start_time +3 hour"));

            $user = DB::connection('mysql')
                      ->table('users')
                      ->where('user_id', $charging_record->user_id)
                      ->where('deleted_at','=',NULL)
                      ->first();

            $account = $user->account;


            $amount = $price * ceil(180 / LIMIT_CHARGING_PRICE);
            $account -= $amount;
            $order_sn = time() . '-' . $charging_record->user_id . '-' . rand(10000, 99999);

            // 当可用余额够支付时，扣款生成支付完成的订单
            if($account >= 0) {
                $save_account = strval($account);

                DB::connection('mysql')
                  ->table('users')
                  ->where('user_id', $charging_record->user_id)
                  ->where('deleted_at','=',NULL)
                  ->update(array('account' => $save_account));

                // 生成订单
                $neworder = new Order;
                $neworder->order_type = $type_name;
                $neworder->status = '1';
                $neworder->buyer_phone = $user->phone;
                $neworder->buyer_id = $user->user_id;
                $neworder->buyer_name = $user->real_name;
                $neworder->order_sn = $order_sn;
                $neworder->order_amount = $amount;
                $neworder->save();

                $order_id = $neworder->order_id;

                // 完善charging记录
                DB::connection('mysql')
                  ->table('charging')
                  ->where('charging_id','=',$charging_id)
                  ->where('deleted_at','=',NULL)
                  ->update(array('end_time' => $end_time,'order_id' => $order_id));

                // 生成消费history
                $otherhistory=new AccountHistory;
                $otherhistory->user_name = $user->real_name;
                $otherhistory->user_id = $user->user_id;
                $otherhistory->ac_type = 2;
                $otherhistory->account = $amount;
                $otherhistory->charge_name=$type_name;
                $otherhistory->save();
            }

            // 当可用余额不够支付时，不扣款生成未支付订单
            else {
                // 生成订单
                $neworder_0 = new Order;
                $neworder_0->order_type = $type_name;
                $neworder_0->status = '0';
                $neworder_0->buyer_phone = $user->phone;
                $neworder_0->buyer_id = $user->user_id;
                $neworder_0->buyer_name = $user->real_name;
                $neworder_0->order_sn = $order_sn;
                $neworder_0->order_amount = $amount;
                $neworder_0->save();

                $order_id_0 = $neworder_0->order_id;

                //完善charging记录
                $charging_record = DB::connection('mysql')
                ->table('charging')
                ->whereNull('end_time')
                ->where('user_id',$user->user_id)
                ->where('charging_type_id',$equpt_id)
                ->where('deleted_at','=',NULL)
                ->update(array('end_time' => $end_time,'order_id' => $order_id_0));
            }
        }
    }
    
    /**
     * 结算超过24小时未结算的计费
     */
    protected function closeOldTimeSleepRecord()    //睡眠仓
    {
        $threeHoursAgo = date('Y-m-d H:i:s', time() - 3600 * 24);
        $charging_list = DB::connection('mysql')
        ->table('charging')
        ->whereNull('end_time')
        ->where('charging_type_id','=',Config::get('attributes.charging_type.sleep'))    // =3 =睡眠仓
        ->where('start_time','<', $threeHoursAgo)
        ->where('deleted_at','=',NULL)
        ->get();
    
        if (count($charging_list) < 1) {
            return ;
        }
    
        foreach ($charging_list as $charging_record) {
            $charging_id    = $charging_record->charging_id;
            $start_time     = $charging_record->start_time;
            $equpt_id       = $charging_record->equpt_id;                   //拿到charging数据对应的刷卡机
            $type_name      = $charging_record->charging_type_name;        //数卡类型
            $price          = $charging_record->charging_price;             //类型单价
            $end_time       = date('Y-m-d H:i:s', strtotime("$start_time +24 hour"));
    
            $user = DB::connection('mysql')
            ->table('users')
            ->where('user_id', $charging_record->user_id)
            ->where('deleted_at','=',NULL)
            ->first();
    
            $account = $user->account;
    
    
            $amount = $price * ceil(1440 / LIMIT_CHARGING_PRICE);
            $account -= $amount;
            $order_sn = time() . '-' . $charging_record->user_id . '-' . rand(10000, 99999);
    
            // 当可用余额够支付时，扣款生成支付完成的订单
            if($account >= 0) {
                $save_account = strval($account);
    
                DB::connection('mysql')
                ->table('users')
                ->where('user_id', $charging_record->user_id)
                ->where('deleted_at','=',NULL)
                ->update(array('account' => $save_account));
    
                // 生成订单
                $neworder = new Order;
                $neworder->order_type = $type_name;
                $neworder->status = '1';
                $neworder->buyer_phone = $user->phone;
                $neworder->buyer_id = $user->user_id;
                $neworder->buyer_name = $user->real_name;
                $neworder->order_sn = $order_sn;
                $neworder->order_amount = $amount;
                $neworder->save();
    
                $order_id = $neworder->order_id;
    
                // 完善charging记录
                DB::connection('mysql')
                ->table('charging')
                ->where('charging_id','=',$charging_id)
                ->where('deleted_at','=',NULL)
                ->update(array('end_time' => $end_time,'order_id' => $order_id));
    
                // 生成消费history
                $otherhistory=new AccountHistory;
                $otherhistory->user_name = $user->real_name;
                $otherhistory->user_id = $user->user_id;
                $otherhistory->ac_type = 2;
                $otherhistory->account = $amount;
                $otherhistory->charge_name=$type_name;
                $otherhistory->save();
            }
    
            // 当可用余额不够支付时，不扣款生成未支付订单
            else {
                // 生成订单
                $neworder_0 = new Order;
                $neworder_0->order_type = $type_name;
                $neworder_0->status = '0';
                $neworder_0->buyer_phone = $user->phone;
                $neworder_0->buyer_id = $user->user_id;
                $neworder_0->buyer_name = $user->real_name;
                $neworder_0->order_sn = $order_sn;
                $neworder_0->order_amount = $amount;
                $neworder_0->save();
    
                $order_id_0 = $neworder_0->order_id;
    
                //完善charging记录
                $charging_record = DB::connection('mysql')
                ->table('charging')
                ->whereNull('end_time')
                ->where('user_id',$user->user_id)
                ->where('charging_type_id',$equpt_id)
                ->where('deleted_at','=',NULL)
                ->update(array('end_time' => $end_time,'order_id' => $order_id_0));
            }
        }
    }
}

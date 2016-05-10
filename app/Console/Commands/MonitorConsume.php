<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Eloquents\AccountHistory;
use App\Eloquents\User;
use Cache;
use DB;

class MonitorConsume extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monitor:consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monitor the record of consume.';

    protected $last;

    protected $newRecord;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $start_time = time();

        $idx = 1;
        while (time() - $start_time < 55) {
            if ($idx > 1) {
                sleep(5);
            }
			
            $issucess = DB::transaction(function() {
            // 取得新记录
            $this->getNewRecord();

            // 处理新记录,更新账户余额
            $this->updateAccount();
            
            throw new Exception('数据库异常');
            });
        }

        Cache::forever('lastLssjRecord', $this->last);
    }

    protected function getNewRecord()
    {
        // ①初次启动，缓存中无记录，取得表中全部的数据
        // ②非初次启动，缓存中有记录，取得这条记录后面的新数据
        
        // ①初次启动，缓存中无记录，取得表中全部的数据
        if (!Cache::has('lastLssjRecord')) {

            $res = DB::connection('xiaofei')
                     ->table('lssj')
                     ->get();

        // ②非初次启动，缓存中有记录，取得这条记录后面的新数据
        } else {
            // 两次命令衔接时，从缓存中取得last
            if (is_null($this->last)) {
                $this->last = Cache::get('lastLssjRecord');
            }

            $res = DB::connection('xiaofei')
                     ->table('lssj')
                     ->where('xfsj', '>=', $this->last['xfsj'])
                     ->get();

            // 防止并发漏数据（删掉“=”号带来的重复数据）
            foreach ($res as $record) {
                // 遇到最后一次的，删掉记录并退出循环
                if ($record->rfid == $this->last['rfid'] && $record->rfkh == $this->last['rfkh']) {
                    array_shift($res);
                    break;
                //删掉记录，继续循环
                } else {
                    array_shift($res);
                }
            }
        }

        $this->newRecord = $res;
    }

    protected function updateAccount()
    {
        // 没有新记录，结束
        if (count($this->newRecord) < 1) {
            return;
        }

        foreach ($this->newRecord as  $record) {
            // 根据卡号，取得user
            $card_no = $record->rfkh;

            if ($record->xffs == 'PHP') {
                continue;
            }

            $user = User::where('card_no', $card_no)->first();

            if (!$user) {
                continue;
            }

            if ($record->xfzl == '增款') {
                /* $user->account += $record->xfje;
                $user->save();  */

                $log = new AccountHistory();
                $log->ac_type = 1;  // 充值
                $log->charge_name = 'account';  // 账户余额
                $log->user_id = $user->user_id;
                $log->user_name = $user->user_name;
                $log->operator_name = '消费系统同步';

                $log->save();
            } elseif ($record->xfzl == '减款') {
                $user->account -= $record->xfje;
                $user->save();
                
                $xiaofei = DB::connection('xiaofei')
                ->table('ryxx')
                ->where('rfkh',$card_no)
                ->first();
                $account = $xiaofei->rfye;
                $account -= $record->xfje;
                $xiaofei->update(array('rfye' => $account));

                $log = new AccountHistory();
                $log->ac_type = 2;  // 消费
                $log->charge_name = 'account';  // 账户余额
                $log->user_id = $user->user_id;
                $log->user_name = $user->user_name;
                $log->operator_name = '消费系统同步';

                $log->save();
            }
        }

        // 有new才有record，即使本次出错，也至少有上一次的lastLssjRecord
        $this->last = [
            'ryid'      => $record->ryid,
            'rfkh'      => $record->rfkh,
        ];
    }
}

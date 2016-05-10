<?php

namespace App\Modules\Admin\Http\Logics\Ad;

use App\Eloquents\Ad;
//use App\Eloquents\Room;
use Exception;
use Request;
use Validator;

class PostEdit extends \BaseLogic
{
    protected function execute()
    {
        try {

            $this->validate();
            $this->saveAd();

            $this->result['result'] = true;

        } catch (Exception $e) {

            $this->result['result']  = false;
            $this->result['message'] = $e->getMessage();

        }
    }

    protected function validate()
    {
        $validator = Validator::make(Request::all(), [
            'sort_order'  => 'numeric',
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages()->first());
        }

        // 判断id是否存在
        $this->ad = Ad::find($this->adId);
        if (!$this->ad) {
            throw new Exception('此广告已被删除');
        }
        
        /* $getRoom = Room::where('room_num', Request::input('room_num'))
        ->first();
        if (!$getRoom) {
        	throw new Exception('房间号不存在，请先添加房间。');
        } */

    }

    /**
     * 保存广告
     * @return void
     */
    protected function saveAd()
    {
        $this->ad->side_path = Request::input('side_path');
        $this->ad->sort_order = Request::input('sort_order')?Request::input('sort_order'):0;
        $this->ad->ad_link = Request::input('ad_link');
        $this->ad->is_show = Request::input('is_show');
        //$this->ad->room_num = Request::input('room_num');
        if (Request::hasFile('ad_pic'))
        {
            $targetDir = public_path() . '/data/uploads';
            $newName   = time() . '_' . rand( 1 , 1000000 ) . ".png";
        
            Request::file('ad_pic')->move($targetDir, $newName);
        
            $this->ad->ad_pic = '/data/uploads/' . $newName;
        }

        $this->ad->save();

        $this->result['message'] = '广告编辑成功';
    }
}

<?php

namespace App\Modules\Admin\Http\Logics\Ad;

use App\Eloquents\Ad;
//use App\Eloquents\Room;
use Exception;
use Request;
use Validator;

class PostAdd extends \BaseLogic
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
            'ad_pic'   => 'required',
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->messages()->first());
        }
        
        /* $getRoom = Room::where('room_num', Request::input('room_num'))
        ->first();
        if (!$getRoom) {
        	throw new Exception('房间号不存在，请先添加房间。');
        } */
    }

    /**
     * 新增广告
     * @return void
     */
    protected function saveAd()
    {
        $order = Request::input('sort_order');
        $newAd = new Ad;
        $newAd->side_path = Request::input('side_path');
        $newAd->sort_order = $order ? $order : 0;
        $newAd->ad_link = Request::input('ad_link');
        $newAd->is_show = Request::input('is_show');
        $newAd->room_id = Request::input('room');
        if (Request::hasFile('ad_pic'))
        {
            $targetDir = public_path() . '/data/uploads';
            $newName   = time() . '_' . rand( 1 , 1000000 ) . ".png";

            Request::file('ad_pic')->move($targetDir, $newName);

            $newAd->ad_pic = '/data/uploads/' . $newName;
        }

        $newAd->save();

        $this->result['message'] = '广告添加成功';
    }
}

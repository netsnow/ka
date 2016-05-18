<?php

namespace App\Modules\Admin\Http\Logics\Api;

use App\Eloquents\Room;
use Request;
use Exception;

class Testapi extends \BaseLogic
{
    protected function execute()
    {
        $baidu_auth = curl_init();
        curl_setopt($baidu_auth, CURLOPT_URL, "https://openapi.baidu.com/oauth/2.0/token?grant_type=client_credentials&client_id=B9Lu0wxY0T0B3ixtEy3VQ7Q7&client_secret=588b6fa0100126ccf530aadfb1e07992");
        curl_setopt($baidu_auth, CURLOPT_RETURNTRANSFER, 1 );
        $output = curl_exec($baidu_auth);
        $token = json_decode($output)->access_token;
        curl_close($baidu_auth);

        $text = "白雪你好";
        $baidu_yuyin = curl_init();
        curl_setopt($baidu_yuyin, CURLOPT_URL, "http://tsn.baidu.com/text2audio?tex=".$text."&lan=zh&cuid=1111&ctp=1&tok=".$token);
        curl_setopt($baidu_yuyin, CURLOPT_RETURNTRANSFER, 1 );
        $output = curl_exec($baidu_yuyin);
        curl_close($baidu_yuyin);
        $targetDir = public_path() . '/data/audio/';
        $filename = time() . '_' . rand( 1 , 1000000 ) . ".mp3";
        $myaudiofile = fopen($targetDir.$filename, "w") or die("Unable to open file!");
        fwrite($myaudiofile, $output);
        fclose($myaudiofile);
    }
}

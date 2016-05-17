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
        print_r(json_decode($output)->access_token);
        curl_close($baidu_auth);
    }
}

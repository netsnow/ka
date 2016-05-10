<?php

namespace App\Http\Middleware\Api;

use Closure;
use Config;

class AccessKey
{
    public function handle($request, Closure $next)
    {
        if ($request->input('accessKey') != Config::get('app.key'))
        {
            return ['result' => false, 'message' => '访问不合法'];
        }

        return $next($request);
    }
}

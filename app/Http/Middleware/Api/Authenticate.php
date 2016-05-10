<?php

namespace App\Http\Middleware\Api;

use Closure;
use Auth;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        $credentials = [
            'user_name' => $request->input('username'),
            'password'  => $request->input('password'),
        ];

        $credentials2 = [
            'phone'     => $request->input('username'),
            'password'  => $request->input('password'),
        ];

        if (Auth::once($credentials) || Auth::once($credentials2)) {
            return $next($request);
        }

        return ['result' => false, 'message' => '访问不合法'];
    }
}

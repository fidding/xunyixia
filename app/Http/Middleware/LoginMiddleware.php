<?php

namespace App\Http\Middleware;

use Closure;
use Auth,
    Redirect;
class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return Redirect::to('auth/login')->with('msg', '请先登录！');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class HomeLoginMiddleware
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
        //检测前台用户是否登录
        if(session('homelogin') == 'on'  ){
            return $next($request);
        }else{
            return redirect('/home/login');
        }

    }
}

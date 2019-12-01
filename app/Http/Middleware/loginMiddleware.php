<?php

namespace App\Http\Middleware;

use Closure;

class loginMiddleware
{
    public function handle($request, Closure $next)
    {
        if (session('admin_login')){
            return $next($request);
        }else{
            return redirect('admin/login');
    }

    }
}

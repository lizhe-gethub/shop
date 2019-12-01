<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Route;

class NodesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $nodes = session('admin_user_nodes');
        $controller_all = array_keys($nodes);

        $actions=explode('\\', Route::current()->getActionName());
        //或$actions=explode('\\', \Route::currentRouteAction());
        $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
        $func=explode('@', $actions[count($actions)-1]);
        $controllerName=strtolower($func[0]);
        $actionName=strtolower($func[1]);
        if(!in_array($controllerName,$controller_all)){
             return redirect('admin/rbac');exit;
        }
        //dump($nodes,$controllerName,$actionName);exit;

        $action_all = $nodes[$controllerName];

        if(!in_array($actionName,$action_all)){
            return redirect('admin/rbac');exit;
        }
        return $next($request);
    }
}

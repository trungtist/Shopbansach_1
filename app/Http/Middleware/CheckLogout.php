<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class CheckLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $time = Session('LAST_ACTIVITY_AD');
        if(!$request->session()->has('sUser') || !$request->session()->has('LAST_ACTIVITY_AD') ){
            return redirect()->intended('admin/login');
        }else if(time()-$time>1800){
            return redirect()->intended('admin/logout');
        }
        
        $LAST_ACTIVITY = time();
        $request->session()->put('LAST_ACTIVITY_AD', $LAST_ACTIVITY);

        return $next($request);
    }
}

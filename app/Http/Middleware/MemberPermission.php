<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class MemberPermission
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
        if(Auth::user()->role->role_name == 'ADMIN' || Auth::user()->role->role_name == 'OPERATEUR'){
        return $next($request);
    }else{
       
       return response()->view('403');
    }
   
    }
}

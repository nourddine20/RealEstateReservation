<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Else_;

class AdminPermission
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
       
        if(Auth::user()->role->role_name == 'ADMIN'){
            return $next($request);
        }else{
            $errormessage = 'Your message';
           return response()->view('403',compact('errormessage'));
        }
       
    }
}

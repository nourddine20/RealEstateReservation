<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CommercialPremission
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
        if((Auth::user()->role->role_name == 'COMMERCIAL' || Auth::user()->role->role_name == 'ADMIN' || Auth::user()->role->role_name == 'OPERATEUR') && Auth::user()->role->role_name != 'INVESTISSEUR'){
            return $next($request);
        }else{
            $errormessage = 'Your message';
           return response()->view('403',compact('errormessage'));
        }
    }
}

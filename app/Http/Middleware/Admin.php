<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\User;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, $guard='admin')
     {
         if(!Auth::guard($guard)->check()) {
             return redirect('/admin');
         }
         if(Auth::guard($guard)->user() === null) {
           return response('Insufficient permission',401);
         }

        return $next($request);
        

     }
}

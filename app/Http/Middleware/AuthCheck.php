<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session()->has('loginid')){
            return redirect('/')->with('fail','You must log First');
        }
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0,must-revalidate')->header('Pragma','no-cache');
    }
}

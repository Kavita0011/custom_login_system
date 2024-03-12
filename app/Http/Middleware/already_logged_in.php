<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class already_logged_in
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        // if user is logged in than return to dashboard
        if(session()->has('loginId') && url('login')==$request->url() ||url('register')==$request->url()){
            return back();
        }
        return $next($request);
    }
}

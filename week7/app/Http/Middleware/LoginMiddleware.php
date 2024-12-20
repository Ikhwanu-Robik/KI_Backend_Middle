<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isLoggedIn = $request->session()->get('user_name') ? true : false;

        if(!$isLoggedIn && $request->getRequestUri() == '/dashboard') {
            return redirect('/login');
        }
        if($isLoggedIn && $request->getRequestUri() == '/login') {
            return redirect('/dashboard');
        }
        return $next($request);
    }
}
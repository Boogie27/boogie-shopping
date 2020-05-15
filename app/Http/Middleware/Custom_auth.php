<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Session;
use Closure;

class Custom_auth
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
        if(Auth::check()){
            return redirect("home");
        }
        return $next($request);
    }
}

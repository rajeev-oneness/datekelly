<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        $guard = get_guard();
        if($guard == 'admin' && auth()->guard($guard)->user()->email == 'admin@admin.com') {
            return $next($request);
        }
        return redirect()->back();

    }
}

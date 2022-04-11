<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class UserAuth
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
        if($guard == 'web'){
            if(Auth::user()->email_verified_at != '' || Auth::user()->email_verified_at != NULL){
                return $next($request);
            }else{
                return redirect(route('verify.user.account'));
            }
        }
        return redirect(route('user.login'));
    }
}

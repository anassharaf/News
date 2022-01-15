<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user())
        {
            switch (auth()->user()->active){
                case 0:
                    auth()->logout();
                    abort(403,'Please contact the Manager');

                    break;
                case 1:
                    return $next($request);
                    break;
            }
        }
        return $next($request);

    }
}

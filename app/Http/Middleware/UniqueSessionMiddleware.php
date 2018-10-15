<?php

namespace App\Http\Middleware;

use Closure;

class UniqueSessionMiddleware
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
        if (!session()->has('unique_session_name')) {
            session()->put('unique_session_name', str_random(32));
        }

        return $next($request);
    }
}

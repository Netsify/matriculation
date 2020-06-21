<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdvertRole
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
        if (\Auth::user()->accessModeration()) {
            return $next($request);
        } else {
            abort(404);
        }
    }
}

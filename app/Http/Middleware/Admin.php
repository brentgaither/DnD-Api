<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Determines if the user is an admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      // Only give access to an admin, which happens to be me right now.
        if (Auth::check() && $request->user()->email == env('APP_ADMIN', 'false')) {
            return $next($request);
        }
        return redirect('/');
    }
}

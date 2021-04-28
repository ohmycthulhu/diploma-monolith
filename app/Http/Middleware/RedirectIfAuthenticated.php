<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @param  string|null  $route
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null, ?string $route = null)
    {
        if (Auth::guard($guard)->check()) {
          $redirectTo = $route ? route($route) : RouteServiceProvider::HOME;
          return redirect($redirectTo);
        }

        return $next($request);
    }
}

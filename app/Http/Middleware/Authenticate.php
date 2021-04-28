<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

  protected $redirect;

  public function handle($request, Closure $next, ...$guards)
  {
    $this->redirect = $guards[1] ?? null;
    $guards = empty($guards) ? [] : [$guards[0]];
    return parent::handle($request, $next, ...$guards);
  }

  /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route($this->redirect ?? 'login');
        }
    }
}

<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param string|array $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if(!$this->authorized($request->user(), $roles)){
            return redirect()->route('homepage');
        }
        return $next($request);
    }

    /**
     * @param User $user
     * @param string|array $roles
     * @return bool
     */
    private function authorized(User $user, $roles)
    {
        if (is_array($roles)) {
            return in_array($user->role, $roles);
        }
        return $user->role === $roles;
    }
}

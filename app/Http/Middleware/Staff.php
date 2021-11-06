<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Staff
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
        #Get auth user
        $user = auth()->user();

        if (!$user->isModerator() && !$user->isAdmin()) {
            return abort(404);
        }

        return $next($request);
    }
}

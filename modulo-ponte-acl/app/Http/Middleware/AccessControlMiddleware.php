<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class AccessControlMiddleware
{
    use AuthorizesRequests;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // dd($request->route()->getName());

        $ignoreRoutes = config('acl.ignore');
        // dd($ignoreRoutes);

        if (!in_array($request->route()->getName(), $ignoreRoutes)) {

            $this->authorize($request->route()->getName());
        }


        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role->slug === 'admin') {
            //return response()->json('Your account is inactive'); returns in JSON format
            return $next($request);
        }
        return redirect()->back()->with('_forceDelete', 'UNAUTHORIZED ACCESS');
    }
}

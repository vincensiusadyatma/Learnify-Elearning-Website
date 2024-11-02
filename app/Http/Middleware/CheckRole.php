<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
{
    if (Auth::check()) {
        $userRoles = Auth::user()->roles->pluck('name')->toArray();
        Log::info('User Roles: ', $userRoles); 
    
        foreach ($roles as $role) {
            if (in_array($role, $userRoles)) {
                return $next($request); 
            }
        }
    }
    return redirect()->route('main')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
}

    
}

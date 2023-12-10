<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * 
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * 
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If is NOT user OR user is NOT admin - abort
        if (!auth()->check() || !(auth()->user()->status === 1)) {
            abort(403, 'Доступ заборонено!');
        }
        
        return $next($request);
    }
}

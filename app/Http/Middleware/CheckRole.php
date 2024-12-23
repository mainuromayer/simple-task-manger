<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if ($request->user() && $request->user()->role == 'manager' || $request->user()->role == 'teammate') {
            return $next($request);
        } elseif (!$request->user()) {
            return redirect()->route('login');
        }
    }
}


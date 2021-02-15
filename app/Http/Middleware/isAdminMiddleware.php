<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role !=='admin') {
            abort(403,'شما اجازه دسترسی را ندارید');
        }return $next($request);
    }
}

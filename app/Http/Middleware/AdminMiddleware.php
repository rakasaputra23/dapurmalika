<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Silakan login terlebih dahulu!']);
        }
        
        return $next($request);
    }
}

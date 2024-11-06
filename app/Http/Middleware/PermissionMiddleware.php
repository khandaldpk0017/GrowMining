<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    public function handle($request, Closure $next, $permission)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        if (!Auth::user()->can($permission)) {
            // abort(403);
            return redirect()->route('admin.dashboard')->with('error', 'Admin only access');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleOrPermissionMiddleware
{
    public function handle($request, Closure $next, $roleOrPermission)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $rolesOrPermissions = explode('|', $roleOrPermission);

        if (!Auth::user()->hasAnyRole($rolesOrPermissions) && !Auth::user()->can($rolesOrPermissions)) {
            abort(403);
        }

        return $next($request);
    }
}

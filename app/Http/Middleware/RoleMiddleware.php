<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $role = Auth::user()?->role;

        // إذا المستخدم Admin ويتصفح صفحة غير لوحة التحكم، يتم توجيهه
        if ($role === UserRole::Admin && !$request->routeIs(
            'admin.dashboard',
            'admin.student',
            'admin.staff',
            'admin.department',
            'admin.program',
            'admin.settings'
        )) {
            return redirect()->route('admin.dashboard');
        }

        if ($role === UserRole::User && !$request->routeIs(
            'staff.dashboard',
            'staff.settings',
            'staff.applicationpending',
            'staff.accepted',
            'staff.rejected'
        )) {
            return redirect()->route('staff.dashboard');
        }

        if ($role === UserRole::Student && !$request->routeIs(
            'dashboard',
            'application',
            'applied',
        )) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}

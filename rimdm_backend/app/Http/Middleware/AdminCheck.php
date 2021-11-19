<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('teacher')->check())
        {
            return redirect()->back();
        }
        else
        {
            $teacher = Auth::guard('teacher')->user();

            if (($teacher->role->name != 'admin') && ($teacher->role->name != 'super admin'))
            {
                return redirect()->route('teacher.profile');
            }

            return $next($request);
        }
    }
}

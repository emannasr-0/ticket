<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
           
            $userRole = Auth::user()->role_id;

          
            if ($role == 'admin' && $userRole == 1) {
                return $next($request); 
            }

           
            if ($role == 'user' && $userRole == 3) {
                return $next($request); 
            }

         
           abort(403);
        }

        // If the user is not authenticated, redirect to login page
        return redirect()->route('loginhome');
    }
}

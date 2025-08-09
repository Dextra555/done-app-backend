<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class B2CMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('sanctum')->check()) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized access'
            ], 401);
        }

        $user = Auth::guard('sanctum')->user();
        
        // Check if user is a B2C user
        if (!$user || !($user instanceof \App\Models\B2CUser)) {
            return response()->json([
                'status' => false,
                'message' => 'Access denied. B2C user required.'
            ], 403);
        }

        return $next($request);
    }
} 
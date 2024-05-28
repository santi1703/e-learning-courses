<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProfessorRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $userRole = Auth::user()->role_id;
        if ($userRole !== Role::PROFESSOR && $userRole !== Role::ADMIN) {
            return response()->json(['error' => 'The action that you try to perform is not allowed for your role. Please contact an administrator.']);
        }

        return $response;
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class studentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            if(auth()->user()->role->Type!='Student')
            {
                return response()->json([
                    'status' => 0,
                    'message' => 'you are not authorized'
                ] , 403);
            }

        return $next($request);
    }
}

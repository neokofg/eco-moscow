<?php

namespace App\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class AdminMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->tokenCan('role:admin')) {
            return $next($request);
        }
        return response()->json(['message' => __('Unauthenticated')], Response::HTTP_UNAUTHORIZED);
    }
}

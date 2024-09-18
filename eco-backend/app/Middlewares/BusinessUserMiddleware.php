<?php

namespace App\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class BusinessUserMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->tokenCan('role:business')) {
            return $next($request);
        }
        return response()->json(['message' => __('Unauthenticated')], Response::HTTP_UNAUTHORIZED);
    }
}

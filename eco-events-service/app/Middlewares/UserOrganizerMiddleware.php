<?php

namespace App\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class UserOrganizerMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->tokenCan('role:client') && auth()->user()->is_organizer) {
            return $next($request);
        }
        return response()->json(['message' => __('Unauthenticated')], Response::HTTP_UNAUTHORIZED);
    }
}

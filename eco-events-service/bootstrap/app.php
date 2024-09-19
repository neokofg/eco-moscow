<?php

use App\Exceptions\Custom\QueryException;
use App\Middlewares\SetAcceptJsonHeader;
use App\Middlewares\UserMiddleware;
use App\Middlewares\UserOrganizerMiddleware;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api([
            SetAcceptJsonHeader::class
        ]);
        $middleware->alias([
            'type.client' =>    UserMiddleware::class,
            'type.organizer' =>    UserOrganizerMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (MethodNotAllowedHttpException $e, Request $request) {
            return response()->json([
                'message' => __('Bad method')
            ], 405);
        });
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            return response()->json([
                'message' => __('Not found')
            ], 404);
        });

        $exceptions->render(function (ThrottleRequestsException $e, Request $request) {
            return response()->json([
                'seconds' => $e->getHeaders()['Retry-After'],
                'message' => __('Maximum attempts, please try again later')
            ], 429);
        });

        $exceptions->render(function (AuthorizationException $e, Request $request) {
            return response()->json([
                'message' => __('Forbidden')
            ], 403);
        });

        $exceptions->render(function (AuthenticationException $e, Request $request) {
            return response()->json([
                'message' => __('Unauthorized')
            ], 401);
        });

        $exceptions->render(function (QueryException $e, Request $request) {
            if (config('app.env') == 'production') {
                return response()->json([
                    'message' => __('Problem with our database')
                ], 503);
            } else {
                return response()->json([
                    'message' => __($e->getMessage())
                ], 503);
            }
        });
    })->create();

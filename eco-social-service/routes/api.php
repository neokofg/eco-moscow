<?php

use App\Controllers\Rest\V1\Note\WallController;
use App\Controllers\Rest\V1\User\SubscribeController;
use App\Controllers\Rest\V1\User\SubscribersController;
use App\Controllers\Rest\V1\User\SubscriptionsController;
use App\Controllers\Rest\V1\User\UserGetController;
use App\Dto\V1\User\RecommendationsController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/wall',             WallController::class);
    Route::get('/recommendations',  RecommendationsController::class);
    Route::prefix('user')->middleware(['auth:sanctum','type.client'])->group(function () {
        Route::get('/',             UserGetController::class);
        Route::middleware(['auth:sanctum', 'type.client'])->group(function () {
            Route::get('/subscriptions',SubscriptionsController::class);
            Route::get('/subscribers',  SubscribersController::class);
            Route::get('/subscribe',    SubscribeController::class);
        });
    });
});

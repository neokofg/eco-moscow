<?php

use App\Controllers\Rest\V1\Note\WallController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/wall', WallController::class);
    Route::get('/recommendations', );
    Route::prefix('user')->middleware(['auth:sanctum','type.client'])->group(function () {
        Route::get('/subscriptions', );
        Route::get('/subscribers', );
        Route::get('/me', );
        Route::get('/notes');
        Route::get('/posts');
        Route::get('/videos');
    });
});

<?php

use App\Controllers\Rest\V1\News\NewsGetController;
use App\Controllers\Rest\V1\News\NewsIndexController;
use App\Controllers\Rest\V1\Post\PostGetController;
use App\Controllers\Rest\V1\Post\PostIndexController;
use App\Controllers\Rest\V1\Post\PostStoreController;
use App\Controllers\Rest\V1\Video\VideoGetController;
use App\Controllers\Rest\V1\Video\VideoIndexController;
use App\Controllers\Rest\V1\Video\VideoStoreController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('/newses')->group(function () {
        Route::get('/',     NewsIndexController::class);
        Route::get('/{id}', NewsGetController::class);
    });
    Route::prefix('/posts')->group(function () {
        Route::get('/',     PostIndexController::class);
        Route::get('/{id}', PostGetController::class);
        Route::middleware(['auth:sanctum','type.client'])
            ->post('/',     PostStoreController::class);
    });
    Route::prefix('/videos')->group(function () {
        Route::get('/',     VideoIndexController::class);
        Route::get('/{id}', VideoGetController::class);
        Route::middleware(['auth:sanctum','type.client'])
            ->post('/',     VideoStoreController::class);
    });
});

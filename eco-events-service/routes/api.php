<?php

use App\Controllers\Rest\V1\Competition\CompetitionController;
use App\Controllers\Rest\V1\Event\EventController;
use App\Controllers\Rest\V1\Promotion\PromotionController;
use App\Controllers\Rest\V1\Volunteering\VolunteeringController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('events')->group(function () {
        Route::get('/',                 [EventController::class, 'index']);
        Route::prefix('/id')->group(function () {
            Route::get('/',             [EventController::class, 'get']);
            Route::post('/participate', [EventController::class, 'participate']);
        });
        Route::middleware(['auth:sanctum','type.client'])->group(function () {
            Route::post('/',            [EventController::class, 'store']);
        });
    });
    Route::prefix('promotions')->group(function () {
        Route::get('/', [PromotionController::class, 'index']);
        Route::prefix('/id')->group(function () {
            Route::get('/', [PromotionController::class, 'get']);
            Route::post('/donate', [PromotionController::class, 'donate']);
        });
        Route::middleware(['auth:sanctum','type.client'])->group(function () {
            Route::post('/', [PromotionController::class, 'store']);
        });
    });
    Route::prefix('competitions')->group(function () {
        Route::get('/', [CompetitionController::class, 'index']);
        Route::prefix('/id')->group(function () {
            Route::get('/', [CompetitionController::class, 'get']);
            Route::post('/participate', [CompetitionController::class, 'participate']);
        });
        Route::middleware(['auth:sanctum','type.client'])->group(function () {
            Route::post('/', [CompetitionController::class, 'store']);
        });
    });
    Route::prefix('volunteerings')->group(function () {
        Route::get('/', [VolunteeringController::class, 'index']);
        Route::prefix('/id')->group(function () {
            Route::get('/', [VolunteeringController::class, 'get']);
            Route::post('/participate', [VolunteeringController::class, 'participate']);
        });
        Route::middleware(['auth:sanctum','type.client'])->group(function () {
            Route::post('/', [VolunteeringController::class, 'store']);
        });
    });
    Route::prefix('marathons')->group(function () {
        Route::get('/');
        Route::prefix('/id')->group(function () {
            Route::get('/');
            Route::post('/participate');
        });
        Route::middleware(['auth:sanctum','type.client'])->group(function () {
            Route::post('/');
        });
    });
});

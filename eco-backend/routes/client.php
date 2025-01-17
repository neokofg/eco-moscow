<?php

use App\Controllers\Rest\V1\Auth\User\LoginController;
use App\Controllers\Rest\V1\Auth\User\RegisterController;
use App\Controllers\Rest\V1\User\GetController;
use App\Controllers\Rest\V1\User\PatchEmailController;
use App\Controllers\Rest\V1\User\PutController;
use App\Controllers\Rest\V1\User\PatchPasswordController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('client')->group(function () {
        Route::prefix('auth')->group(function () {
            Route::prefix('register')->group(function () {
                Route::post('/',            RegisterController::class);
            });
            Route::post('/login',       LoginController::class);
        });
        Route::prefix('user')->middleware(['auth:sanctum', 'type.client'])->group(function () {
            Route::get('/',             GetController::class);
            Route::put('/',             PutController::class);
            Route::patch('/password',   PatchPasswordController::class);
            Route::patch('/email',      PatchEmailController::class);
        });
    });
});

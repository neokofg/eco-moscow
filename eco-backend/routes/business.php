<?php

use App\Controllers\Rest\V1\Auth\BusinessUser\LoginController;
use App\Controllers\Rest\V1\Auth\BusinessUser\RegisterController;
use App\Controllers\Rest\V1\Auth\BusinessUser\RegisterValidateController;
use App\Controllers\Rest\V1\BusinessUser\GetController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('business')->group(function () {
        Route::prefix('auth')->group(function () {
            Route::prefix('register')->group(function () {
                Route::post('/',            RegisterController::class);
                Route::post('/validate',    RegisterValidateController::class);
            });
            Route::post('/login',       LoginController::class);
        });
        Route::prefix('user')->middleware(['auth:sanctum','type.business'])->group(function () {
            Route::get('/',             GetController::class);
        });
    });
});

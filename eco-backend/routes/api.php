<?php

use App\Controllers\Rest\V1\Auth\LoginController;
use App\Controllers\Rest\V1\Auth\RegisterController;
use App\Controllers\Rest\V1\Auth\RegisterValidateController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('client')->group(function () {
        Route::prefix('auth')->group(function () {
            Route::prefix('register')->group(function () {
                Route::post('/',            RegisterController::class);
                Route::post('/validate',    RegisterValidateController::class);
            });
            Route::post('/login',       LoginController::class);
        });
    });
    Route::prefix('business')->group(function () {
        Route::prefix('auth')->group(function () {

        });
    });
});

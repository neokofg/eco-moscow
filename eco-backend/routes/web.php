<?php

use App\Controllers\View\V1\Oauth\YandexLoginController;
use App\Controllers\View\V1\Oauth\YandexRedirectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('oauth')->group(function () {
    Route::prefix('yandex')->group(function () {
        Route::get('/',         YandexRedirectController::class);
        Route::get('/login',    YandexLoginController::class);
    });
});

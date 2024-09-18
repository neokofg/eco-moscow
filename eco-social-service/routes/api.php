<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/wall', );
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

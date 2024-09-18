<?php

use App\Controllers\Rest\V1\Categories\IndexController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('categories', IndexController::class);
});

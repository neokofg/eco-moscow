<?php

use App\Controllers\Rest\V1\Achievement\AchievementGetController;
use App\Controllers\Rest\V1\Categories\IndexController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('categories', IndexController::class);
    Route::get('achievements', AchievementGetController::class);
});

<?php

use App\Controllers\ApproveController;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login']);
Route::middleware('auth')->get('/logout', [AuthController::class, 'logout']);
Route::middleware('auth')->get('/', [DashboardController::class, 'view']);
Route::middleware('auth')->get('/events', [DashboardController::class, 'viewEvents']);
Route::middleware('auth')->get('/accounts', [DashboardController::class, 'viewUsers'])->name('accounts.view');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::middleware('auth')->get('/accounts/approve/{id}', [ApproveController::class, 'approve'])->name('approve');

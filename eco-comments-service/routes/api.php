<?php

use App\Controllers\Rest\V1\NoteComment\NoteCommentIndexController;
use App\Controllers\Rest\V1\NoteComment\NoteCommentReplyStoreController;
use App\Controllers\Rest\V1\NoteComment\NoteCommentStoreController;
use App\Controllers\Rest\V1\PostComment\PostCommentIndexController;
use App\Controllers\Rest\V1\PostComment\PostCommentReplyStoreController;
use App\Controllers\Rest\V1\PostComment\PostCommentStoreController;
use App\Controllers\Rest\V1\Reactions\ReactionStoreController;
use App\Controllers\Rest\V1\VideoComment\VideoCommentIndexController;
use App\Controllers\Rest\V1\VideoComment\VideoCommentReplyStoreController;
use App\Controllers\Rest\V1\VideoComment\VideoCommentStoreController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('/',             PostCommentIndexController::class);
        Route::middleware(['auth:sanctum','type.client'])->group(function () {
            Route::post('/comment', PostCommentStoreController::class);
            Route::post('/reply',   PostCommentReplyStoreController::class);
        });
    });
    Route::prefix('videos')->group(function () {
        Route::get('/',             VideoCommentIndexController::class);
        Route::middleware(['auth:sanctum','type.client'])->group(function () {
            Route::post('/comment', VideoCommentStoreController::class);
            Route::post('/reply',   VideoCommentReplyStoreController::class);
        });
    });
    Route::prefix('notes')->group(function () {
        Route::get('/',             NoteCommentIndexController::class);
        Route::middleware(['auth:sanctum','type.client'])->group(function () {
            Route::post('/comment', NoteCommentStoreController::class);
            Route::post('/reply',   NoteCommentReplyStoreController::class);
        });
    });
    Route::post('/reaction',        ReactionStoreController::class);
});

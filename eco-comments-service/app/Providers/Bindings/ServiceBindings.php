<?php

namespace App\Providers\Bindings;

use App\Contracts\ServiceInterfaces\NoteCommentServiceInterface;
use App\Contracts\ServiceInterfaces\PostCommentServiceInterface;
use App\Contracts\ServiceInterfaces\ReactionsServiceInterface;
use App\Contracts\ServiceInterfaces\VideoCommentServiceInterface;
use App\Services\NoteCommentService;
use App\Services\PostCommentService;
use App\Services\ReactionsService;
use App\Services\VideoCommentService;
use Illuminate\Support\ServiceProvider;

final class ServiceBindings extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(PostCommentServiceInterface::class, PostCommentService::class);
        $this->app->bind(VideoCommentServiceInterface::class, VideoCommentService::class);
        $this->app->bind(ReactionsServiceInterface::class, ReactionsService::class);
        $this->app->bind(NoteCommentServiceInterface::class, NoteCommentService::class);
    }
}

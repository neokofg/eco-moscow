<?php

namespace App\Providers\Bindings;

use App\Contracts\ServiceInterfaces\NewsServiceInterface;
use App\Contracts\ServiceInterfaces\NoteServiceInterface;
use App\Contracts\ServiceInterfaces\PostServiceInterface;
use App\Contracts\ServiceInterfaces\VideoServiceInterface;
use App\Services\NewsService;
use App\Services\NoteService;
use App\Services\PostService;
use App\Services\VideoService;
use Illuminate\Support\ServiceProvider;

final class ServiceBindings extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(PostServiceInterface::class,PostService::class);
        $this->app->bind(VideoServiceInterface::class,VideoService::class);
        $this->app->bind(NewsServiceInterface::class,NewsService::class);
        $this->app->bind(NoteServiceInterface::class,NoteService::class);
    }
}

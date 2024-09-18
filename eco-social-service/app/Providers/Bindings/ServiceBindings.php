<?php

namespace App\Providers\Bindings;

use App\Contracts\ServiceInterfaces\NoteServiceInterface;
use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Services\NoteService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

final class ServiceBindings extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(NoteServiceInterface::class, NoteService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
    }
}

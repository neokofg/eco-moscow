<?php

namespace App\Providers\Bindings;

use App\Contracts\ServiceInterfaces\AuthServiceInterface;
use App\Contracts\ServiceInterfaces\CategoryServiceInterface;
use App\Contracts\ServiceInterfaces\OauthServiceInterface;
use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Services\V1\AuthService;
use App\Services\V1\CategoryService;
use App\Services\V1\OauthService;
use App\Services\V1\UserService;
use Illuminate\Support\ServiceProvider;

final class ServiceBindings extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(AuthServiceInterface::class,           AuthService::class);
        $this->app->bind(OauthServiceInterface::class,          OauthService::class);
        $this->app->bind(UserServiceInterface::class,           UserService::class);
        $this->app->bind(CategoryServiceInterface::class,       CategoryService::class);
    }
}

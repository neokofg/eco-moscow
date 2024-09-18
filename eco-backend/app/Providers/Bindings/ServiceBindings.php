<?php

namespace App\Providers\Bindings;

use App\Contracts\ServiceInterfaces\AuthServiceInterface;
use App\Services\V1\AuthService;
use Illuminate\Support\ServiceProvider;

final class ServiceBindings extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }
}

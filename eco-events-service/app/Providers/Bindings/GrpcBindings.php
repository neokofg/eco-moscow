<?php

namespace App\Providers\Bindings;

use App\Controllers\Grpc\Client\AchievementClient;
use App\Controllers\Grpc\Client\ModerClient;
use Carbon\Laravel\ServiceProvider;
use GRPC\Achievement\AchievementServiceInterface;
use GRPC\Moder\ModerServiceInterface;

final class GrpcBindings extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ModerServiceInterface::class, ModerClient::class);
        $this->app->singleton(ModerClient::class, function ($app) {
            $server_url = config('grpc.moder_url');
            return new ModerClient(
                'nginx:50051',
                ['credentials' => null]
            );
        });
        $this->app->bind(AchievementServiceInterface::class, AchievementClient::class);
        $this->app->singleton(AchievementClient::class, function ($app) {
            $server_url = config('grpc.achievement_url');
            return new ModerClient(
                'nginx:9090',
                ['credentials' => null]
            );
        });
    }
}

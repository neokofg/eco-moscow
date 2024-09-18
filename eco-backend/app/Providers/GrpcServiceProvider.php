<?php

namespace App\Providers;

use App\Controllers\Grpc\Clients\AchievementClient;
use GRPC\Achievement\AchievementServiceInterface;
use Grpc\ChannelCredentials;
use Illuminate\Support\ServiceProvider;

final class GrpcServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AchievementServiceInterface::class, AchievementClient::class);
        $this->app->singleton(AchievementClient::class, static function ($app) {
            $serverUrl = config('grpc.achievement_server');
            return new AchievementClient(
                'nginx:9090',
                ['credentials' => null],
            );
        });

    }

    public function boot(): void
    {

    }
}

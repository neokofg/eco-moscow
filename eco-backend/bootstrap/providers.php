<?php declare(strict_types=1);

use App\Providers\AppServiceProvider;
use App\Providers\Bindings\ServiceBindings;
use App\Providers\GrpcServiceProvider;
use SocialiteProviders\Manager\ServiceProvider;

return [
    AppServiceProvider::class,
    ServiceBindings::class,
    ServiceProvider::class,
    GrpcServiceProvider::class
];

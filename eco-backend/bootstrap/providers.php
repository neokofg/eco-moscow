<?php declare(strict_types=1);

use App\Providers\AppServiceProvider;
use App\Providers\Bindings\ServiceBindings;
use SocialiteProviders\Manager\ServiceProvider;

return [
    AppServiceProvider::class,
    ServiceBindings::class,
    ServiceProvider::class
];

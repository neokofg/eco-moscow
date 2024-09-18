<?php declare(strict_types=1);

use App\Providers\AppServiceProvider;
use App\Providers\Bindings\DtoBindings;
use App\Providers\Bindings\ServiceBindings;

return [
    AppServiceProvider::class,
    DtoBindings::class,
    ServiceBindings::class,
];

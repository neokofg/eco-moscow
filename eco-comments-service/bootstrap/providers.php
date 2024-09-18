<?php

use App\Providers\AppServiceProvider;
use App\Providers\Bindings\ServiceBindings;
use MongoDB\Laravel\MongoDBServiceProvider;

return [
    AppServiceProvider::class,
    ServiceBindings::class,
    MongoDBServiceProvider::class,
];

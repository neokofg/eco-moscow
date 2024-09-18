<?php

namespace App\Providers\Bindings;

use App\Dto\V1\Auth\RegisterDto;
use App\Contracts\DtoContracts\V1\Auth\RegisterDtoContract;
use Illuminate\Support\ServiceProvider;

final class DtoBindings extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(RegisterDtoContract::class, RegisterDto::class);
    }
}

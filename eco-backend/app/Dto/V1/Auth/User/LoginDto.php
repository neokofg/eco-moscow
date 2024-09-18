<?php

namespace App\Dto\V1\Auth\User;

use App\Contracts\DtoContracts\V1\Auth\LoginDtoContract;

final readonly class LoginDto extends LoginDtoContract
{
    public function __construct(
        public string $email,
        public string $password,
    )
    {
        parent::__construct();
    }
}

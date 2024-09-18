<?php

namespace App\Dto\V1\Auth;

use App\Contracts\DtoContracts\V1\Auth\RegisterDtoContract;

final readonly class RegisterDto extends RegisterDtoContract
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(
        public string $name,
        public string $email,
        public string $password
    )
    {
        parent::__construct();
    }
}

<?php

namespace App\Dto\V1\Auth\User;

use App\Contracts\DtoContracts\V1\Auth\RegisterValidateDtoContract;

final readonly class RegisterValidateDto extends RegisterValidateDtoContract
{
    /**
     * @param string $token
     */
    public function __construct(
        public string $token,
    )
    {
        parent::__construct();
    }
}

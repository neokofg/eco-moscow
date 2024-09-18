<?php

namespace App\Dto\V1\Auth\BusinessUser;

use App\Contracts\DtoContracts\V1\Auth\RegisterValidateDtoContract;

final readonly class RegisterValidateDto extends RegisterValidateDtoContract
{
    /**
     * @param string $code
     * @param string $email
     */
    public function __construct(
        public string $code,
        public string $email,
    )
    {
        parent::__construct();
    }
}

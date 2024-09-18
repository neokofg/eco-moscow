<?php

namespace App\Dto\V1\User;

use App\Contracts\DtoContracts\V1\User\UserGetDtoContract;

final readonly class UserGetDto extends UserGetDtoContract
{
    /**
     * @param string $id
     */
    public function __construct(
        public string $id
    )
    {
        parent::__construct();
    }
}

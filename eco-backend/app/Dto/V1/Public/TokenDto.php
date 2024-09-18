<?php

namespace App\Dto\V1\Public;

use App\Contracts\DtoContracts\V1\Public\TokenDtoContract;

final readonly class TokenDto extends TokenDtoContract
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

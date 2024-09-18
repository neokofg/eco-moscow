<?php

namespace App\Dto\V1\User;

use App\Contracts\DtoContracts\V1\User\PatchEmailDtoContract;

final readonly class PatchEmailDto extends PatchEmailDtoContract
{
    public function __construct(
        public string $new_email,
        public string $current_password
    )
    {
        parent::__construct();
    }
}

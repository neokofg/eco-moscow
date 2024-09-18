<?php

namespace App\Dto\V1\User;

use App\Contracts\DtoContracts\V1\User\PatchPasswordDtoContract;

final readonly class PatchPasswordDto extends PatchPasswordDtoContract
{
    public function __construct(
        public string $old_password,
        public string $new_password,
    )
    {
        parent::__construct();
    }
}

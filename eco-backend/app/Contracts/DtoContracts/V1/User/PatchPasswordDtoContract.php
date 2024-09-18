<?php

namespace App\Contracts\DtoContracts\V1\User;

use App\Dto\Dto;

readonly abstract class PatchPasswordDtoContract extends Dto
{
    public function __construct()
    {
    }
}

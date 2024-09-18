<?php

namespace App\Contracts\ServiceInterfaces;

use App\Contracts\DtoContracts\V1\Auth\LoginDtoContract;
use App\Contracts\DtoContracts\V1\Auth\RegisterDtoContract;
use App\Contracts\DtoContracts\V1\Public\TokenDtoContract;

interface AuthServiceInterface
{
    /**
     * @param RegisterDtoContract $dto
     * @return bool
     */
    public function registerUser(RegisterDtoContract $dto): bool;

    /**
     * @param TokenDtoContract $dto
     * @return string
     */
    public function registerValidateUser(TokenDtoContract $dto): string;

    /**
     * @param LoginDtoContract $dto
     * @return array
     */
    public function loginUser(LoginDtoContract $dto): array;
}

<?php

namespace App\Contracts\ServiceInterfaces;

use App\Contracts\DtoContracts\V1\Auth\LoginDtoContract;
use App\Contracts\DtoContracts\V1\Auth\RegisterDtoContract;
use App\Contracts\DtoContracts\V1\Auth\RegisterValidateDtoContract;

interface AuthServiceInterface
{
    /**
     * @param RegisterDtoContract $dto
     * @return bool
     */
    public function registerUser(RegisterDtoContract $dto): bool;

    /**
     * @param RegisterValidateDtoContract $dto
     * @return array
     */
    public function registerValidateUser(RegisterValidateDtoContract $dto): array;

    /**
     * @param LoginDtoContract $dto
     * @return array
     */
    public function loginUser(LoginDtoContract $dto): array;

    /**
     * @param RegisterDtoContract $dto
     * @return bool
     */
    public function registerBusinessUser(RegisterDtoContract $dto): bool;

    /**
     * @param RegisterValidateDtoContract $dto
     * @return array
     */
    public function registerValidateBusinessUser(RegisterValidateDtoContract $dto): array;

    /**
     * @param LoginDtoContract $dto
     * @return array
     */
    public function loginBusinessUser(LoginDtoContract $dto): array;
}

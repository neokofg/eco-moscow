<?php

namespace App\Contracts\ServiceInterfaces;

use App\Contracts\DtoContracts\V1\User\PatchPasswordDtoContract;
use App\Contracts\DtoContracts\V1\User\PutDtoContract;
use App\Models\Resources\V1\User\UserResource;
use Illuminate\Auth\AuthenticationException;

interface UserServiceInterface
{
    /**
     * @return UserResource
     * @throws AuthenticationException
     */
    public function getAuthorized(): UserResource;

    /**
     * @param PutDtoContract $dto
     * @return UserResource
     */
    public function updateUser(PutDtoContract $dto): UserResource;

    /**
     * @param PatchPasswordDtoContract $dto
     * @return UserResource
     */
    public function patchPassword(PatchPasswordDtoContract $dto): UserResource;
}

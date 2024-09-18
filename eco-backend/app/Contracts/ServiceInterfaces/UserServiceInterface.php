<?php

namespace App\Contracts\ServiceInterfaces;

use App\Contracts\DtoContracts\V1\Public\TokenDtoContract;
use App\Contracts\DtoContracts\V1\User\PatchEmailDtoContract;
use App\Contracts\DtoContracts\V1\User\PatchPasswordDtoContract;
use App\Contracts\DtoContracts\V1\User\PutDtoContract;
use App\Dto\V1\Public\TokenDto;
use App\Dto\V1\User\PatchEmailDto;
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
     * @throws AuthenticationException
     */
    public function updateUser(PutDtoContract $dto): UserResource;

    /**
     * @param PatchPasswordDtoContract $dto
     * @return UserResource
     * @throws AuthenticationException
     */
    public function patchPassword(PatchPasswordDtoContract $dto): UserResource;

    /**
     * @param PatchEmailDto|PatchEmailDtoContract $dto
     * @return bool
     */
    public function patchEmail(PatchEmailDto|PatchEmailDtoContract $dto): bool;

    /**
     * @param TokenDto|TokenDtoContract $dto
     * @return UserResource
     */
    public function emailValidate(TokenDto|TokenDtoContract $dto): UserResource;
}

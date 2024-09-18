<?php

namespace App\Services\V1;

use App\Contracts\DtoContracts\V1\User\PatchPasswordDtoContract;
use App\Contracts\DtoContracts\V1\User\PutDtoContract;
use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Dto\V1\User\PatchPasswordDto;
use App\Dto\V1\User\PutDto;
use App\Exceptions\Custom\Auth\InvalidCredentialsException;
use App\Models\Resources\V1\User\UserResource;
use App\Presenters\UserPresenter;
use App\Repositories\V1\UserRepository;
use Illuminate\Auth\AuthenticationException;

final readonly class UserService implements UserServiceInterface
{
    /**
     * @param UserPresenter $userPresenter
     * @param UserRepository $userRepository
     */
    public function __construct(
        private UserPresenter $userPresenter,
        private UserRepository $userRepository
    )
    {
    }

    /**
     * @return UserResource
     * @throws AuthenticationException
     */
    public function getAuthorized(): UserResource
    {
        $user = getUser();

        return $this->userPresenter->presentFull($user);
    }


    /**
     * @param PutDto|PutDtoContract $dto
     * @return UserResource
     * @throws AuthenticationException
     */
    public function updateUser(PutDto|PutDtoContract $dto): UserResource
    {
        $user = $this->userRepository->updateUser(getUser(), $dto);

        return $this->userPresenter->presentFull($user);
    }

    /**
     * @param PatchPasswordDto|PatchPasswordDtoContract $dto
     * @return UserResource
     * @throws AuthenticationException
     * @throws InvalidCredentialsException
     */
    public function patchPassword(PatchPasswordDto|PatchPasswordDtoContract $dto): UserResource
    {
        $user = $this->userRepository->patchPassword(getUser(), $dto);

        return $this->userPresenter->presentFull($user);
    }
}

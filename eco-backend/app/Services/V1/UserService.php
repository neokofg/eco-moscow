<?php

namespace App\Services\V1;

use App\Contracts\DtoContracts\V1\Public\TokenDtoContract;
use App\Contracts\DtoContracts\V1\User\PatchEmailDtoContract;
use App\Contracts\DtoContracts\V1\User\PatchPasswordDtoContract;
use App\Contracts\DtoContracts\V1\User\PutDtoContract;
use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Dto\V1\Public\TokenDto;
use App\Dto\V1\User\PatchEmailDto;
use App\Dto\V1\User\PatchPasswordDto;
use App\Dto\V1\User\PutDto;
use App\Exceptions\Custom\Auth\InvalidCredentialsException;
use App\Exceptions\Custom\ServiceUnavailableException;
use App\Models\Resources\V1\User\UserResource;
use App\Presenters\UserPresenter;
use App\Repositories\V1\UserRepository;
use App\Traits\MailTrait;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final readonly class UserService implements UserServiceInterface
{
    use MailTrait;

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

    /**
     * @param PatchEmailDto|PatchEmailDtoContract $dto
     * @return bool
     * @throws AuthenticationException
     * @throws InvalidCredentialsException
     * @throws ServiceUnavailableException
     */
    public function patchEmail(PatchEmailDto|PatchEmailDtoContract $dto): bool
    {
        $this->userRepository->matchPassword(getUser(), $dto->current_password);

        $userChangeEmail = $this->userRepository->createUserChangeEmail(getUser(), $dto);

        try {
            $this->sendAuthTokenMail($userChangeEmail->token, $userChangeEmail->new_email, 'emails.changeEmailToken');
        } catch (\Throwable $exception) {
            throw new ServiceUnavailableException($exception);
        }

        return true;
    }

    /**
     * @param TokenDto|TokenDtoContract $dto
     * @return UserResource
     * @throws ModelNotFoundException
     */
    public function emailValidate(TokenDto|TokenDtoContract $dto): UserResource
    {
        $user = $this->userRepository->patchEmail($dto->token);

        return $this->userPresenter->presentFull($user);
    }
}

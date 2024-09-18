<?php

namespace App\Services\V1;

use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Models\Resources\V1\User\UserResource;
use App\Presenters\UserPresenter;
use Illuminate\Auth\AuthenticationException;

final readonly class UserService implements UserServiceInterface
{
    /**
     * @param UserPresenter $userPresenter
     */
    public function __construct(
        private UserPresenter $userPresenter
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
}

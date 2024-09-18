<?php

namespace App\Presenters;

use App\Models\Resources\V1\User\UserResource;
use App\Models\User;

final readonly class UserPresenter
{
    /**
     * @param User $user
     * @return UserResource
     */
    public function presentFull(User $user): UserResource
    {
        return new UserResource($user);
    }
}

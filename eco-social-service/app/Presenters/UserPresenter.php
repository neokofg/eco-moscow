<?php

namespace App\Presenters;

use App\Models\Resources\User\UserIndexResource;
use App\Models\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserPresenter
{
    /**
     * @param User $user
     * @return UserResource
     */
    public function present(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * @param LengthAwarePaginator|Collection $users
     * @return mixed
     */
    public function presentIndex(LengthAwarePaginator|Collection $users): mixed
    {
        return UserIndexResource::collection($users)->response()->getData();
    }
}

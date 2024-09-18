<?php

namespace App\Contracts\ServiceInterfaces;

use App\Models\Resources\V1\User\UserResource;
use Illuminate\Auth\AuthenticationException;

interface UserServiceInterface
{
    /**
     * @return UserResource
     * @throws AuthenticationException
     */
    public function getAuthorized(): UserResource;
}

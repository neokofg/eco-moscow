<?php

namespace App\Contracts\ServiceInterfaces;

use App\Models\Resources\V1\BusinessUser\BusinessUserResource;
use Illuminate\Auth\AuthenticationException;

interface BusinessUserServiceInterface
{
    /**
     * @return BusinessUserResource
     * @throws AuthenticationException
     */
    public function getAuthorized(): BusinessUserResource;
}

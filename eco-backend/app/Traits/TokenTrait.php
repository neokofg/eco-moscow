<?php

namespace App\Traits;

use App\Models\BusinessUser;
use App\Models\User;

trait TokenTrait
{
    /**
     * @param User $user
     * @return string
     */
    public function createUserToken(User $user): string
    {
        return $user->createToken('auth-token', ['role:client'])->plainTextToken;
    }

    public function createBusinessUserToken(BusinessUser $businessUser): string
    {
        return $businessUser->createToken('auth-token', ['role:business'])->plainTextToken;
    }
}

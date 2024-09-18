<?php

namespace App\Traits;

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
}

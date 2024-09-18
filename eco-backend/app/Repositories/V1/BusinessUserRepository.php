<?php

namespace App\Repositories\V1;

use App\Exceptions\Custom\Auth\InvalidCredentialsException;
use App\Models\BusinessUser;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final readonly class BusinessUserRepository extends Repository
{
    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return BusinessUser
     */
    public function createBusinessUser(
        string $name,
        string $email,
        string $password
    ): BusinessUser
    {
        return BusinessUser::firstOrCreate([
            'email' => $email,
        ],[
            'name' => $name,
            'password' => $password,
        ]);
    }

    /**
     * @param string $email
     * @param string $password
     * @return BusinessUser
     * @throws InvalidCredentialsException
     */
    public function loginBusinessUser(string $email, string $password): BusinessUser
    {
        if(Auth::guard('business_users')->attempt(['email' => $email, 'password' => $password])) {
            return Auth::guard('business_users')->user();
        } else {
            throw new InvalidCredentialsException();
        }
    }
}

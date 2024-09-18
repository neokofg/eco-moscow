<?php

namespace App\Repositories\V1;

use App\Exceptions\Custom\Auth\InvalidCredentialsException;
use App\Models\RegisterUser;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Auth;

final readonly class UserRepository extends Repository
{
    /**
     * @param RegisterUser $registerUser
     * @return User
     */
    public function createUser(RegisterUser $registerUser): User
    {
        return User::create([
            'name' => $registerUser->name,
            'email' => $registerUser->email,
            'password' => appDecrypt($registerUser->password)
        ]);
    }

    /**
     * @param string $email
     * @param string $password
     * @return User
     * @throws InvalidCredentialsException
     */
    public function loginUser(string $email, string $password): User
    {
        if(Auth::guard('users')->attempt(['email' => $email, 'password' => $password])) {
            return Auth::guard('users')->user();
        } else {
            throw new InvalidCredentialsException();
        }
    }
}

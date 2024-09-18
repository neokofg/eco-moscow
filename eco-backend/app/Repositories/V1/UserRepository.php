<?php

namespace App\Repositories\V1;

use App\Exceptions\Custom\Auth\InvalidCredentialsException;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final readonly class UserRepository extends Repository
{
    /**
     * @param string $name
     * @param string $email
     * @param string|null $password
     * @param bool $is_oauth
     * @return User
     */
    public function createUser(
        string $name,
        string $email,
        ?string $password = null,
        bool $is_oauth = false
    ): User
    {
        return User::firstOrCreate([
            'email' => $email,
        ],[
            'name' => $name,
            'password' => $password ? Hash::make($password) : null,
            'is_oauth' => $is_oauth,
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

    /**
     * @param int $userId
     * @return User
     */
    public function getUserById(int $userId): User
    {
        return User::findOrFail($userId);
    }
}

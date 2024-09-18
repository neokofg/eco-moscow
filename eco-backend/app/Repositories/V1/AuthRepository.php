<?php

namespace App\Repositories\V1;

use App\Exceptions\Custom\Auth\InvalidCodeException;
use App\Models\Enums\RegisterUserEnum;
use App\Models\RegisterUser;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

final readonly class AuthRepository extends Repository
{
    /**
     * @param string $email
     * @param RegisterUserEnum $type
     * @param string $name
     * @param string $surname
     * @param string $password
     * @return RegisterUser
     */
    public function createRegisterUser(string $email, RegisterUserEnum $type, string $name, string $surname, string $password): RegisterUser
    {
        $token = generateToken();

        return RegisterUser::create([
            'type' => $type,
            'token' => $token,
            'email' => $email,
            'name' => $name,
            'surname' => $surname,
            'password' => $password
        ]);
    }

    /**
     * @param string $token
     * @return RegisterUser
     * @throws InvalidCodeException
     */
    public function findRegisterUser(string $token): RegisterUser
    {
        try {
            return RegisterUser::where('token', $token)
                ->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            throw new InvalidCodeException();
        }
    }

    /**
     * @param RegisterUser $registerUser
     * @return bool
     */
    public function deleteRegisterUser(RegisterUser $registerUser): bool
    {
        return $registerUser->delete();
    }
}

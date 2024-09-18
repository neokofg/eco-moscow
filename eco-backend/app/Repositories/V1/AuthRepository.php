<?php

namespace App\Repositories\V1;

use App\Models\Enums\RegisterUserEnum;
use App\Models\RegisterUser;
use App\Repositories\Repository;

final readonly class AuthRepository extends Repository
{
    /**
     * @param string $email
     * @param RegisterUserEnum $type
     * @param string $name
     * @param string $password
     * @return RegisterUser
     */
    public function createRegisterUser(string $email, RegisterUserEnum $type, string $name, string $password): RegisterUser
    {
        $code = appCrypt(generateCode());

        return RegisterUser::create([
            'type' => $type,
            'code' => $code,
            'email' => $email,
            'name' => $name,
            'password' => $password
        ]);
    }

    /**
     * @param string $email
     * @param RegisterUserEnum $type
     * @return RegisterUser
     */
    public function findRegisterUser(string $email, RegisterUserEnum $type): RegisterUser
    {
        return RegisterUser::where('type', $type)
            ->where('email', $email)
            ->first();
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

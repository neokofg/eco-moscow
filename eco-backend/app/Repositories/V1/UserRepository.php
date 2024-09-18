<?php

namespace App\Repositories\V1;

use App\Dto\V1\Public\TokenDto;
use App\Dto\V1\User\PatchEmailDto;
use App\Dto\V1\User\PatchPasswordDto;
use App\Dto\V1\User\PutDto;
use App\Exceptions\Custom\Auth\InvalidCredentialsException;
use App\Models\Resources\V1\User\UserResource;
use App\Models\User;
use App\Models\UserChangeEmail;
use App\Models\UserModeration;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

final readonly class UserRepository extends Repository
{
    /**
     * @param string $name
     * @param string $surname
     * @param string $email
     * @param string|null $password
     * @param bool $is_oauth
     * @return User
     */
    public function createUser(
        string $name,
        string $surname,
        string $email,
        ?string $password = null,
        bool $is_oauth = false
    ): User
    {
        return User::firstOrCreate([
            'email' => $email,
        ],[
            'name' => $name,
            'surname' => $surname,
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
     * @param User $user
     * @param PutDto $dto
     * @return User
     */
    public function updateUser(User $user, PutDto $dto): User
    {
        DB::transaction(function () use ($user, $dto) {
            $user->update($dto->toArray());

            if (isset($dto->user_education)) {
                $user->userEducation->update($dto->user_education);
            }

            if (isset($dto->categories)) {
                $user->categories()->sync($dto->categories);
            }

            if (isset($dto->organizer)) {
                UserModeration::create([
                    'company' => $dto->organizer['company'],
                    'inn' => $dto->organizer['inn'],
                    'ogrn' => $dto->organizer['ogrn'],
                    'kpp' => $dto->organizer['kpp'],
                    'okpo' => $dto->organizer['okpo'],
                    'user_id' => $user->id,
                ]);
            }
        });

        return $user;
    }


    /**
     * @param User $user
     * @param PatchPasswordDto $dto
     * @return User
     * @throws InvalidCredentialsException
     */
    public function patchPassword(User $user, PatchPasswordDto $dto): User
    {
        if (Hash::check($dto->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($dto->new_password)
            ]);

            return $user;
        } else {
            throw new InvalidCredentialsException();
        }
    }

    /**
     * @param User $user
     * @param PatchEmailDto $dto
     * @return UserChangeEmail
     */
    public function createUserChangeEmail(User $user, PatchEmailDto $dto): UserChangeEmail
    {
        $token = generateToken();

        return UserChangeEmail::updateOrCreate([
            'user_id' => $user->id,
        ],[
            'token' => $token,
            'new_email' => $dto->new_email,
        ]);
    }

    /**
     * @param User $user
     * @param string $password
     * @return bool
     * @throws InvalidCredentialsException
     */
    public function matchPassword(User $user, string $password): bool
    {
        if (Hash::check($password, $user->password)) {
            return true;
        } else {
            throw new InvalidCredentialsException();
        }
    }

    /**
     * @param string $token
     * @return User
     */
    public function patchEmail(string $token): User
    {
        return DB::transaction(function () use ($token) {
            $user_change_email = UserChangeEmail::where('token', '=', $token)
                ->firstOrFail();

            $user = $user_change_email->user;

            $user->update([
                'email' => $user_change_email->new_email,
            ]);

            $user_change_email->delete();

            return $user;
        });
    }
}

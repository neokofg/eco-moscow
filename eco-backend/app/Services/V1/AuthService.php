<?php

namespace App\Services\V1;

use App\Contracts\DtoContracts\V1\Auth\LoginDtoContract;
use App\Contracts\DtoContracts\V1\Auth\RegisterDtoContract;
use App\Contracts\DtoContracts\V1\Auth\RegisterValidateDtoContract;
use App\Contracts\ServiceInterfaces\AuthServiceInterface;
use App\Dto\V1\Auth\LoginDto;
use App\Dto\V1\Auth\RegisterDto;
use App\Dto\V1\Auth\RegisterValidateDto;
use App\Exceptions\Custom\Auth\InvalidCodeException;
use App\Exceptions\Custom\Auth\InvalidCredentialsException;
use App\Exceptions\Custom\ServiceUnavailableException;
use App\Models\Enums\RegisterUserEnum;
use App\Repositories\V1\AuthRepository;
use App\Repositories\V1\UserRepository;
use App\Traits\MailTrait;
use App\Traits\TokenTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use JetBrains\PhpStorm\ArrayShape;

final readonly class AuthService implements AuthServiceInterface
{
    use MailTrait;
    use TokenTrait;

    /**
     * @param AuthRepository $authRepository
     * @param UserRepository $userRepository
     */
    public function __construct(
        private AuthRepository $authRepository,
        private UserRepository $userRepository
    )
    {
    }

    /**
     * @param RegisterDto|RegisterDtoContract $dto
     * @return true
     * @throws ServiceUnavailableException
     */
    public function registerUser(RegisterDto|RegisterDtoContract $dto): true
    {
        $password = appCrypt($dto->password);

        $register_user = $this->authRepository->createRegisterUser($dto->email, RegisterUserEnum::user, $dto->name, $password);

        $code = appDecrypt($register_user->code);

        try {
            $this->sendAuthCodeMail($code, $dto->email);
        } catch (\Throwable $exception) {
            throw new ServiceUnavailableException($exception);
        }

        return true;
    }

    /**
     * @param RegisterValidateDto|RegisterValidateDtoContract $dto
     * @return array{token: string}
     * @throws InvalidCodeException
     */
    #[ArrayShape(['token' => "string"])]
    public function registerValidateUser(RegisterValidateDto|RegisterValidateDtoContract $dto): array
    {
        $register_user = $this->authRepository->findRegisterUser($dto->email, RegisterUserEnum::user);

        if (appDecrypt($register_user->code) != $dto->code) {
            throw new InvalidCodeException();
        }

        return DB::transaction(function () use ($register_user) {
            $user = $this->userRepository->createUser($register_user);
            $this->authRepository->deleteRegisterUser($register_user);

            return [
                'token' => $this->createUserToken($user)
            ];
        });
    }

    /**
     * @param LoginDto|LoginDtoContract $dto
     * @return array{token: string}
     * @throws InvalidCredentialsException
     */
    #[ArrayShape(['token' => "string"])]
    public function loginUser(LoginDto|LoginDtoContract $dto): array
    {
        $user = $this->userRepository->loginUser($dto->email, $dto->password);

        return [
            'token' => $this->createUserToken($user)
        ];
    }
}

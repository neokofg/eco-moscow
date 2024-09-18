<?php

namespace App\Services\V1;

use App\Contracts\DtoContracts\V1\Auth\LoginDtoContract;
use App\Contracts\DtoContracts\V1\Auth\RegisterDtoContract;
use App\Contracts\DtoContracts\V1\Auth\RegisterValidateDtoContract;
use App\Contracts\ServiceInterfaces\AuthServiceInterface;
use App\Dto\V1\Auth\User\LoginDto;
use App\Dto\V1\Auth\User\RegisterDto;
use App\Dto\V1\Auth\User\RegisterValidateDto;
use App\Dto\V1\Auth\BusinessUser\LoginDto as BusinessUserLoginDto;
use App\Dto\V1\Auth\BusinessUser\RegisterDto as BusinessUserRegisterDto;
use App\Dto\V1\Auth\BusinessUser\RegisterValidateDto as BusinessUserRegisterValidateDto;
use App\Exceptions\Custom\Auth\InvalidCodeException;
use App\Exceptions\Custom\Auth\InvalidCredentialsException;
use App\Exceptions\Custom\ServiceUnavailableException;
use App\Models\Enums\RegisterUserEnum;
use App\Repositories\V1\AuthRepository;
use App\Repositories\V1\BusinessUserRepository;
use App\Repositories\V1\UserRepository;
use App\Traits\MailTrait;
use App\Traits\TokenTrait;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\ArrayShape;

final readonly class AuthService implements AuthServiceInterface
{
    use MailTrait;
    use TokenTrait;

    /**
     * @param AuthRepository $authRepository
     * @param UserRepository $userRepository
     * @param BusinessUserRepository $businessUserRepository
     */
    public function __construct(
        private AuthRepository          $authRepository,
        private UserRepository          $userRepository,
        private BusinessUserRepository  $businessUserRepository
    )
    {
    }

    /**
     * @param \App\Dto\V1\Auth\User\RegisterDto|RegisterDtoContract $dto
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
     * @param \App\Dto\V1\Auth\User\RegisterValidateDto|RegisterValidateDtoContract $dto
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
            $user = $this->userRepository->createUser(
                $register_user->name,
                $register_user->email,
                appDecrypt($register_user->password)
            );
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

    /**
     * @param BusinessUserRegisterDto|RegisterDtoContract $dto
     * @return true
     * @throws ServiceUnavailableException
     */
    public function registerBusinessUser(BusinessUserRegisterDto|RegisterDtoContract $dto): true
    {
        $password = appCrypt($dto->password);

        $register_user = $this->authRepository->createRegisterUser($dto->email, RegisterUserEnum::business_user, $dto->name, $password);

        $code = appDecrypt($register_user->code);

        try {
            $this->sendAuthCodeMail($code, $dto->email);
        } catch (\Throwable $exception) {
            throw new ServiceUnavailableException($exception);
        }

        return true;
    }

    /**
     * @param BusinessUserRegisterValidateDto|RegisterValidateDtoContract $dto
     * @return array{token: string}
     * @throws InvalidCodeException
     */
    #[ArrayShape(['token' => "string"])]
    public function registerValidateBusinessUser(BusinessUserRegisterValidateDto|RegisterValidateDtoContract $dto): array
    {
        $register_user = $this->authRepository->findRegisterUser($dto->email, RegisterUserEnum::business_user);

        if (appDecrypt($register_user->code) != $dto->code) {
            throw new InvalidCodeException();
        }

        return DB::transaction(function () use ($register_user) {
            $business_user = $this->businessUserRepository->createBusinessUser(
                $register_user->name,
                $register_user->email,
                appDecrypt($register_user->password)
            );
            $this->authRepository->deleteRegisterUser($register_user);

            return [
                'token' => $this->createBusinessUserToken($business_user)
            ];
        });
    }

    /**
     * @param BusinessUserLoginDto|LoginDtoContract $dto
     * @return array{token: string}
     * @throws InvalidCredentialsException
     */
    #[ArrayShape(['token' => "string"])]
    public function loginBusinessUser(BusinessUserLoginDto|LoginDtoContract $dto): array
    {
        $business_user = $this->businessUserRepository->loginBusinessUser($dto->email, $dto->password);

        return [
            'token' => $this->createBusinessUserToken($business_user)
        ];
    }
}

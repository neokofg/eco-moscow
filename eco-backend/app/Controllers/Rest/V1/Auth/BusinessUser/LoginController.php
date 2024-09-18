<?php

namespace App\Controllers\Rest\V1\Auth\BusinessUser;

use App\Controllers\Controller;
use App\Exceptions\Custom\Auth\InvalidCredentialsException;
use App\Requests\Rest\V1\Auth\BusinessUser\LoginRequest;
use App\Services\V1\AuthService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class LoginController extends Controller
{
    /**
     * @param AuthService $authService
     */
    public function __construct(
        private AuthService $authService
    )
    {
        parent::__construct();
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        try {
            $data = $this->authService->loginBusinessUser($request->getDto());
        } catch (InvalidCredentialsException $exception) {
            return $this->presenter->present(false, __('Invalid credentials'), Response::HTTP_UNAUTHORIZED);
        }

        return $this->presenter->present($data, __('Successfully logged in'), Response::HTTP_OK);
    }
}

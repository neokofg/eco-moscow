<?php

namespace App\Controllers\Rest\V1\Auth\BusinessUser;

use App\Contracts\ServiceInterfaces\AuthServiceInterface;
use App\Controllers\Controller;
use App\Exceptions\Custom\Auth\InvalidCodeException;
use App\Requests\Rest\V1\Auth\BusinessUser\RegisterValidateRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class RegisterValidateController extends Controller
{
    /**
     * @param AuthServiceInterface $authService
     */
    public function __construct(
        private AuthServiceInterface $authService
    )
    {
        parent::__construct();
    }

    /**
     * @param RegisterValidateRequest $request
     * @return JsonResponse
     */
    public function __invoke(RegisterValidateRequest $request): JsonResponse
    {
        try {
            $data = $this->authService->registerValidateBusinessUser($request->getDto());
        } catch (InvalidCodeException $exception) {
            return $this->presenter->present(false, __('Invalid code'), Response::HTTP_FORBIDDEN);
        }

        return $this->presenter->present($data, __('Successfully validated'), Response::HTTP_CREATED);
    }
}
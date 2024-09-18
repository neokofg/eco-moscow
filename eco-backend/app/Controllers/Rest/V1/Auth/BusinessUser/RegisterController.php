<?php

namespace App\Controllers\Rest\V1\Auth\BusinessUser;

use App\Contracts\ServiceInterfaces\AuthServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\Auth\BusinessUser\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class RegisterController extends Controller
{
    /**
     * @param AuthServiceInterface $authService
     */
    public function __construct(
        private AuthServiceInterface $authService,
    )
    {
        parent::__construct();
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $data = $this->authService->registerBusinessUser($request->getDto());

        return $this->presenter->present($data, __('Code is successfully sent'), Response::HTTP_CREATED);
    }
}

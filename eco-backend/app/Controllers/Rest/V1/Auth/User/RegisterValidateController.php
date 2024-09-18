<?php

namespace App\Controllers\Rest\V1\Auth\User;

use App\Contracts\ServiceInterfaces\AuthServiceInterface;
use App\Controllers\Controller;
use App\Exceptions\Custom\Auth\InvalidCodeException;
use App\Requests\Rest\V1\Public\TokenRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
     * @param TokenRequest $request
     * @return RedirectResponse|JsonResponse
     */
    public function __invoke(TokenRequest $request): RedirectResponse|JsonResponse
    {
        try {
            $token = $this->authService->registerValidateUser($request->getDto());
        } catch (InvalidCodeException $exception) {
            return $this->presenter->present(false, __('Invalid token'), Response::HTTP_FORBIDDEN);
        }

        return redirect(config('app.frontend_url') . '/api/auth?token=' . $token);
    }
}

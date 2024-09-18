<?php

namespace App\Controllers\Rest\V1\User;

use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Controllers\Controller;
use App\Exceptions\Custom\Auth\InvalidCredentialsException;
use App\Requests\Rest\V1\User\PatchEmailRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class PatchEmailController extends Controller
{
    /**
     * @param UserServiceInterface $userService
     */
    public function __construct(
        private UserServiceInterface $userService
    )
    {
        parent::__construct();
    }

    /**
     * @param PatchEmailRequest $request
     * @return JsonResponse
     */
    public function __invoke(PatchEmailRequest $request): JsonResponse
    {
        try {
            $response = $this->userService->patchEmail($request->getDto());
        } catch (InvalidCredentialsException $exception) {
            return $this->presenter->present(false, __('Invalid password'), Response::HTTP_FORBIDDEN);
        }

        return $this->presenter->present($response, __('Token is successfully sent'), Response::HTTP_CREATED);
    }
}

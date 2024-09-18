<?php

namespace App\Controllers\Rest\V1\User;

use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Controllers\Controller;
use App\Exceptions\Custom\Auth\InvalidCredentialsException;
use App\Requests\Rest\V1\User\PatchPasswordRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class PatchPasswordController extends Controller
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
     * @param PatchPasswordRequest $request
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function __invoke(PatchPasswordRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->patchPassword($request->getDto());
        } catch (InvalidCredentialsException $exception) {
            return $this->presenter->present(false, __('Invalid password'), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return $this->presenter->present($user, __('Successfully updated password'), Response::HTTP_OK);
    }
}

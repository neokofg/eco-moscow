<?php

namespace App\Controllers\Rest\V1\User;

use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\User\PutRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class PutController extends Controller
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
     * @param PutRequest $request
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function __invoke(PutRequest $request): JsonResponse
    {
        $user = $this->userService->updateUser($request->getDto());

        return $this->presenter->present($user, __('Successfully updated user'), Response::HTTP_OK);
    }
}

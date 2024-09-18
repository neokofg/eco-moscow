<?php

namespace App\Controllers\Rest\V1\User;

use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\User\UserGetRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class UserGetController extends Controller
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
     * @param UserGetRequest $request
     * @return JsonResponse
     */
    public function __invoke(UserGetRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->userGet($request->getDto());
        } catch (ModelNotFoundException $exception) {
            return $this->presenter->present(false, __('User not found'), Response::HTTP_NOT_FOUND);
        }

        return $this->presenter->present($user, __('Successfully got user'), Response::HTTP_OK);
    }
}

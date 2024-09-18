<?php

namespace App\Controllers\Rest\V1\User;

use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Controllers\Controller;
use App\Services\V1\UserService;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class GetController extends Controller
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
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function __invoke(): JsonResponse
    {
        $user = $this->userService->getAuthorized();

        return $this->presenter->present($user, __('Successfully got data'), Response::HTTP_OK);
    }
}

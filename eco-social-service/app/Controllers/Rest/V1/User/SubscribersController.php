<?php

namespace App\Controllers\Rest\V1\User;

use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\User\SubscribersRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class SubscribersController extends Controller
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
     * @param SubscribersRequest $request
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function __invoke(SubscribersRequest $request): JsonResponse
    {
        $subscribers = $this->userService->getSubscribers($request->getDto());

        return $this->presenter->present($subscribers, __('Successfully got data'), Response::HTTP_OK);
    }
}

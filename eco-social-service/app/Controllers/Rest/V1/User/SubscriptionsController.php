<?php

namespace App\Controllers\Rest\V1\User;

use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\User\SubscriptionsRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class SubscriptionsController extends Controller
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
     * @param SubscriptionsRequest $request
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function __invoke(SubscriptionsRequest $request): JsonResponse
    {
        $subscriptions = $this->userService->getSubscriptions($request->getDto());

        return $this->presenter->present($subscriptions, __('Successfully got data'), Response::HTTP_OK);
    }
}

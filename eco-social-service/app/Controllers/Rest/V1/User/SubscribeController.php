<?php

namespace App\Controllers\Rest\V1\User;

use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Controllers\Controller;
use App\Dto\V1\User\SubscribeDto;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class SubscribeController extends Controller
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
     * @param SubscribeDto $dto
     * @return JsonResponse
     */
    public function __invoke(SubscribeDto $dto): JsonResponse
    {
        $user = $this->userService->subscribe($dto);

        return $this->presenter->present($user, __('Successfully subscribed'), Response::HTTP_CREATED);
    }
}

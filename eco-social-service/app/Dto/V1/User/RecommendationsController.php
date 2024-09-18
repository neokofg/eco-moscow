<?php

namespace App\Dto\V1\User;

use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class RecommendationsController extends Controller
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
     */
    public function __invoke(): JsonResponse
    {
        $users = $this->userService->recommendations();

        return $this->presenter->present($users, __('Successfully got data'), Response::HTTP_OK);
    }
}

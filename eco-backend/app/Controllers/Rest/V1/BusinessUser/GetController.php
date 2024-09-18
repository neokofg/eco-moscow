<?php

namespace App\Controllers\Rest\V1\BusinessUser;

use App\Contracts\ServiceInterfaces\BusinessUserServiceInterface;
use App\Controllers\Controller;
use App\Services\V1\BusinessUserService;
use App\Services\V1\UserService;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class GetController extends Controller
{
    /**
     * @param BusinessUserServiceInterface $businessUserService
     */
    public function __construct(
        private BusinessUserServiceInterface $businessUserService
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
        $user = $this->businessUserService->getAuthorized();

        return $this->presenter->present($user, __('Successfully got data'), Response::HTTP_OK);
    }
}

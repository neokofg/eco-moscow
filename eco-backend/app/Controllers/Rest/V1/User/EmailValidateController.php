<?php

namespace App\Controllers\Rest\V1\User;

use App\Contracts\ServiceInterfaces\UserServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\Public\TokenRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class EmailValidateController extends Controller
{
    public function __construct(
        private UserServiceInterface $userService
    )
    {
        parent::__construct();
    }

    public function __invoke(TokenRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->emailValidate($request->getDto());
        } catch (ModelNotFoundException $exception) {
            return $this->presenter->present(false, __('Invalid token'), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return $this->presenter->present($user, __('Successfully updated email'), Response::HTTP_OK);
    }
}

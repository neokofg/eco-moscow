<?php

namespace App\Controllers\View\V1\Oauth;

use App\Contracts\ServiceInterfaces\OauthServiceInterface;
use App\Controllers\Controller;
use App\Exceptions\Custom\Oauth\FailedToGetTokenException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class YandexLoginController extends Controller
{
    public function __construct(
        private OauthServiceInterface $oauthService
    )
    {
        parent::__construct();
    }

    public function __invoke(Request $request): JsonResponse|RedirectResponse
    {
        try {
            $token = $this->oauthService->oauthYandex($request->query('code'));
        } catch (FailedToGetTokenException $exception) {
            return $this->presenter->present(false, __('Failed to get token'), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return redirect(config('app.frontend_url') . '/api/auth?token=' . $token);
    }
}

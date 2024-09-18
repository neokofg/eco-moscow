<?php

namespace App\Controllers\View\V1\Oauth;

use App\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

final readonly class YandexRedirectController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('yandex')->redirect();
    }
}

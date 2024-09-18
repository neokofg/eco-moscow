<?php

namespace App\Contracts\ServiceInterfaces;

interface OauthServiceInterface
{
    /**
     * @param int $code
     * @return string
     */
    public function oauthYandex(int $code): string;
}

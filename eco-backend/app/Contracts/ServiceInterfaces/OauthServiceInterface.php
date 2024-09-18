<?php

namespace App\Contracts\ServiceInterfaces;

interface OauthServiceInterface
{
    /**
     * @param int $code
     * @return array
     */
    public function oauthYandex(int $code): array;
}

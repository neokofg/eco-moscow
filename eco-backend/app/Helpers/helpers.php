<?php declare(strict_types=1);

use Illuminate\Support\Facades\Crypt;

/**
 * @param int $code
 * @return bool
 */
function isHttpCode(int $code): bool
{
    return $code < 600;
}


/**
 * @return int
 */
function generateCode(): int
{
    if (config('app.env') == 'production') {
        return rand(1000,9999);
    } else {
        return 1111;
    }
}

/**
 * @param string $input
 * @return string
 */
function appCrypt(string $input): string
{
    return Crypt::encrypt($input);
}

/**
 * @param string $input
 * @return string
 */
function appDecrypt(string $input): string
{
    return Crypt::decrypt($input);
}

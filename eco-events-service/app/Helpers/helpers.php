<?php declare(strict_types=1);

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

/**
 * @param int $code
 * @return bool
 */
function isHttpCode(int $code): bool
{
    return $code < 600;
}

/**
 * @return User
 * @throws AuthenticationException
 */
function getUser(): User
{
    $user = Auth::guard('sanctum')->user();
    if (get_class($user) == User::class) {
        return $user;
    } else {
        throw new AuthenticationException();
    }
}

<?php declare(strict_types=1);

use App\Models\AdminUser;
use App\Models\BusinessUser;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
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

/**
 * @return AdminUser
 * @throws AuthenticationException
 */
function getAdminUser(): AdminUser
{
    $admin_user = Auth::guard('sanctum')->user();
    if (get_class($admin_user) == AdminUser::class) {
        return $admin_user;
    } else {
        throw new AuthenticationException();
    }
}

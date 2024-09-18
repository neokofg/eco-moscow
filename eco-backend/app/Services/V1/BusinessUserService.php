<?php

namespace App\Services\V1;

use App\Contracts\ServiceInterfaces\BusinessUserServiceInterface;
use App\Models\Resources\V1\BusinessUser\BusinessUserResource;
use App\Presenters\BusinessUserPresenter;
use Illuminate\Auth\AuthenticationException;

final readonly class BusinessUserService implements BusinessUserServiceInterface
{
    /**
     * @param BusinessUserPresenter $businessUserPresenter
     */
    public function __construct(
        private BusinessUserPresenter $businessUserPresenter,
    )
    {
    }

    /**
     * @return BusinessUserResource
     * @throws AuthenticationException
     */
    public function getAuthorized(): BusinessUserResource
    {
        $user = getBusinessUser();

        return $this->businessUserPresenter->presentFull($user);
    }
}

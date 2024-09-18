<?php

namespace App\Presenters;

use App\Models\BusinessUser;
use App\Models\Resources\V1\BusinessUser\BusinessUserResource;

final readonly class BusinessUserPresenter
{
    /**
     * @param BusinessUser $business_user
     * @return BusinessUserResource
     */
    public function presentFull(BusinessUser $business_user): BusinessUserResource
    {
        return new BusinessUserResource($business_user);
    }
}

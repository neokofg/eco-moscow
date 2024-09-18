<?php

namespace App\Contracts\ServiceInterfaces;
use App\Contracts\DtoContracts\V1\Category\IndexDtoContract;
use App\Models\Resources\V1\Category\CategoryIndexResource;

interface CategoryServiceInterface
{
    /**
     * @param IndexDtoContract $dto
     * @return mixed
     */
    public function indexCategories(IndexDtoContract $dto): mixed;
}

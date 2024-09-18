<?php

namespace App\Presenters;

use App\Models\Resources\V1\Category\CategoryIndexResource;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class CategoryPresenter
{

    /**
     * @param LengthAwarePaginator $categories
     * @return mixed
     */
    public function presentPagination(LengthAwarePaginator $categories): mixed
    {
        return CategoryIndexResource::collection($categories)->response()->getData();
    }
}

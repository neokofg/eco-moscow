<?php

namespace App\Repositories\V1;

use App\Contracts\DtoContracts\V1\Category\IndexDtoContract;
use App\Dto\V1\Category\IndexDto;
use App\Models\Category;
use App\Repositories\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class CategoryRepository extends Repository
{
    /**
     * @param IndexDto|IndexDtoContract $dto
     * @return LengthAwarePaginator
     */
    public function indexCategories(IndexDto|IndexDtoContract $dto): LengthAwarePaginator
    {
        $categories = Category::query();

        if (isset($dto->search)) {
            $categories->where('title', 'ILIKE', '%' . $dto->search . '%');
        }

        return $categories->paginate($dto->first, page: $dto->page)
            ->appends(['first' => $dto->first]);
    }
}

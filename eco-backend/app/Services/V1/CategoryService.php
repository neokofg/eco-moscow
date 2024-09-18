<?php

namespace App\Services\V1;

use App\Contracts\DtoContracts\V1\Category\IndexDtoContract;
use App\Contracts\ServiceInterfaces\CategoryServiceInterface;
use App\Dto\V1\Category\IndexDto;
use App\Presenters\CategoryPresenter;
use App\Repositories\V1\CategoryRepository;

final readonly class CategoryService implements CategoryServiceInterface
{
    /**
     * @param CategoryRepository $repository
     * @param CategoryPresenter $presenter
     */
    public function __construct(
        private CategoryRepository $repository,
        private CategoryPresenter $presenter
    )
    {
    }

    /**
     * @param IndexDto|IndexDtoContract $dto
     * @return mixed
     */
    public function indexCategories(IndexDto|IndexDtoContract $dto): mixed
    {
        $categories = $this->repository->indexCategories($dto);

        return $this->presenter->presentPagination($categories);
    }
}

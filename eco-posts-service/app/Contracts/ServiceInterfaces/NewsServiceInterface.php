<?php

namespace App\Contracts\ServiceInterfaces;

use App\Contracts\DtoContracts\V1\News\NewsIndexDtoContract;
use App\Dto\V1\News\NewsIndexDto;
use App\Models\Resources\News\NewsResource;

interface NewsServiceInterface
{
    /**
     * @param NewsIndexDto|NewsIndexDtoContract $dto
     * @return mixed
     */
    public function newsIndex(NewsIndexDto|NewsIndexDtoContract $dto): mixed;

    /**
     * @param string $id
     * @return NewsResource
     */
    public function newsGet(string $id): NewsResource;
}
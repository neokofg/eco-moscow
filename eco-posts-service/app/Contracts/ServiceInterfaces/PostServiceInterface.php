<?php

namespace App\Contracts\ServiceInterfaces;



use App\Contracts\DtoContracts\V1\Post\PostIndexDtoContract;
use App\Contracts\DtoContracts\V1\Post\PostStoreDtoContract;
use App\Dto\V1\Post\PostIndexDto;
use App\Dto\V1\Post\PostStoreDto;
use App\Models\Resources\Post\PostResource;

interface PostServiceInterface
{
    /**
     * @param PostStoreDto|PostStoreDtoContract $dto
     * @return PostResource
     */
    public function postStore(PostStoreDto|PostStoreDtoContract $dto): PostResource;

    /**
     * @param PostIndexDto|PostIndexDtoContract $dto
     * @return mixed
     */
    public function postIndex(PostIndexDto|PostIndexDtoContract $dto): mixed;

    /**
     * @param string $id
     * @return PostResource
     */
    public function postGet(string $id): PostResource;
}

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
     * @param PostStoreDtoContract $dto
     * @return PostResource
     */
    public function postStore(PostStoreDtoContract $dto): PostResource;

    /**
     * @param PostIndexDtoContract $dto
     * @return mixed
     */
    public function postIndex(PostIndexDtoContract $dto): mixed;

    /**
     * @param string $id
     * @return PostResource
     */
    public function postGet(string $id): PostResource;
}

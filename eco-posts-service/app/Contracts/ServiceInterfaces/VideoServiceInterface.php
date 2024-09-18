<?php

namespace App\Contracts\ServiceInterfaces;

use App\Contracts\DtoContracts\V1\Video\VideoIndexDtoContract;
use App\Contracts\DtoContracts\V1\Video\VideoStoreDtoContract;
use App\Dto\V1\Video\VideoIndexDto;
use App\Dto\V1\Video\VideoStoreDto;
use App\Models\Resources\Video\VideoResource;

interface VideoServiceInterface
{
    /**
     * @param VideoStoreDtoContract $dto
     * @return VideoResource
     */
    public function videoStore(VideoStoreDtoContract $dto): VideoResource;

    /**
     * @param VideoIndexDtoContract $dto
     * @return mixed
     */
    public function videoIndex(VideoIndexDtoContract $dto): mixed;

    /**
     * @param string $id
     * @return VideoResource
     */
    public function videoGet(string $id): VideoResource;
}

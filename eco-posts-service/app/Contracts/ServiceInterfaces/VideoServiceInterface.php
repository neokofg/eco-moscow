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
     * @param VideoStoreDto|VideoStoreDtoContract $dto
     * @return VideoResource
     */
    public function videoStore(VideoStoreDto|VideoStoreDtoContract $dto): VideoResource;

    /**
     * @param VideoIndexDto|VideoIndexDtoContract $dto
     * @return mixed
     */
    public function videoIndex(VideoIndexDto|VideoIndexDtoContract $dto): mixed;

    /**
     * @param string $id
     * @return VideoResource
     */
    public function videoGet(string $id): VideoResource;
}

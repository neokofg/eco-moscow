<?php

namespace App\Services;

use App\Contracts\DtoContracts\V1\Video\VideoIndexDtoContract;
use App\Contracts\DtoContracts\V1\Video\VideoStoreDtoContract;
use App\Contracts\ServiceInterfaces\VideoServiceInterface;
use App\Dto\V1\Video\VideoIndexDto;
use App\Dto\V1\Video\VideoStoreDto;
use App\Models\Resources\Video\VideoResource;
use App\Presenters\VideoPresenter;
use App\Repositories\V1\VideoRepository;
use Illuminate\Auth\AuthenticationException;

final readonly class VideoService implements VideoServiceInterface
{
    /**
     * @param VideoRepository $videoRepository
     * @param VideoPresenter $videoPresenter
     */
    public function __construct(
        private VideoRepository $videoRepository,
        private VideoPresenter $videoPresenter
    )
    {
    }

    /**
     * @param VideoStoreDto|VideoStoreDtoContract $dto
     * @return VideoResource
     * @throws AuthenticationException
     */
    public function videoStore(VideoStoreDto|VideoStoreDtoContract $dto): VideoResource
    {
        $video = $this->videoRepository->videoStore(getUser(), $dto);

        return $this->videoPresenter->present($video);
    }

    /**
     * @param VideoIndexDto|VideoIndexDtoContract $dto
     * @return mixed
     */
    public function videoIndex(VideoIndexDto|VideoIndexDtoContract $dto): mixed
    {
        $videos = $this->videoRepository->videoIndex($dto);

        return $this->videoPresenter->presentIndex($videos);
    }

    /**
     * @param string $id
     * @return VideoResource
     */
    public function videoGet(string $id): VideoResource
    {
        $video = $this->videoRepository->videoGet($id);

        return $this->videoPresenter->present($video);
    }
}

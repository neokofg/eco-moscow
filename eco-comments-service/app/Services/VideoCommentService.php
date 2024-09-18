<?php

namespace App\Services;

use App\Contracts\DtoContracts\V1\VideoComment\VideoCommentIndexDtoContract;
use App\Contracts\DtoContracts\V1\VideoComment\VideoCommentReplyStoreDtoContract;
use App\Contracts\DtoContracts\V1\VideoComment\VideoCommentStoreDtoContract;
use App\Contracts\ServiceInterfaces\VideoCommentServiceInterface;
use App\Dto\V1\VideoComment\VideoCommentIndexDto;
use App\Dto\V1\VideoComment\VideoCommentReplyStoreDto;
use App\Dto\V1\VideoComment\VideoCommentStoreDto;
use App\Models\Resources\VideoComment\VideoCommentReplyResource;
use App\Models\Resources\VideoComment\VideoCommentResource;
use App\Presenters\VideoCommentPresenter;
use App\Repositories\V1\VideoCommentRepository;
use Illuminate\Auth\AuthenticationException;

final readonly class VideoCommentService implements VideoCommentServiceInterface
{
    /**
     * @param VideoCommentRepository $videoCommentRepository
     * @param VideoCommentPresenter $videoCommentPresenter
     */
    public function __construct(
        private VideoCommentRepository $videoCommentRepository,
        private VideoCommentPresenter $videoCommentPresenter
    )
    {
    }

    /**
     * @param VideoCommentStoreDtoContract|VideoCommentStoreDto $dto
     * @return VideoCommentResource
     * @throws AuthenticationException
     */
    public function videoCommentStore(VideoCommentStoreDtoContract|VideoCommentStoreDto $dto): VideoCommentResource
    {
        $video = $this->videoCommentRepository->videoCommentStore(getUser(), $dto);

        return $this->videoCommentPresenter->present($video);
    }

    /**
     * @param VideoCommentIndexDto|VideoCommentIndexDtoContract $dto
     * @return mixed
     */
    public function videoCommentIndex(VideoCommentIndexDto|VideoCommentIndexDtoContract $dto): mixed
    {
        $videos = $this->videoCommentRepository->videoCommentIndex($dto);

        return $this->videoCommentPresenter->presentIndex($videos);
    }

    /**
     * @param VideoCommentReplyStoreDtoContract|VideoCommentReplyStoreDto $dto
     * @return VideoCommentReplyResource
     * @throws AuthenticationException
     */
    public function videoCommentReplyStore(VideoCommentReplyStoreDtoContract|VideoCommentReplyStoreDto $dto): VideoCommentReplyResource
    {
        $reply = $this->videoCommentRepository->videoCommentReplyStore(getUser(), $dto);

        return $this->videoCommentPresenter->presentReply($reply);
    }
}

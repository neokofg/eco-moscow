<?php

namespace App\Contracts\ServiceInterfaces;

use App\Contracts\DtoContracts\V1\VideoComment\VideoCommentIndexDtoContract;
use App\Contracts\DtoContracts\V1\VideoComment\VideoCommentReplyStoreDtoContract;
use App\Contracts\DtoContracts\V1\VideoComment\VideoCommentStoreDtoContract;
use App\Dto\V1\VideoComment\VideoCommentIndexDto;
use App\Dto\V1\VideoComment\VideoCommentReplyStoreDto;
use App\Dto\V1\VideoComment\VideoCommentStoreDto;
use App\Models\Resources\VideoComment\VideoCommentReplyResource;
use App\Models\Resources\VideoComment\VideoCommentResource;

interface VideoCommentServiceInterface
{
    /**
     * @param VideoCommentStoreDtoContract $dto
     * @return VideoCommentResource
     */
    public function videoCommentStore(VideoCommentStoreDtoContract $dto): VideoCommentResource;

    /**
     * @param VideoCommentIndexDtoContract $dto
     * @return mixed
     */
    public function videoCommentIndex(VideoCommentIndexDtoContract $dto): mixed;

    /**
     * @param VideoCommentReplyStoreDtoContract $dto
     * @return VideoCommentReplyResource
     */
    public function videoCommentReplyStore(VideoCommentReplyStoreDtoContract $dto): VideoCommentReplyResource;

}

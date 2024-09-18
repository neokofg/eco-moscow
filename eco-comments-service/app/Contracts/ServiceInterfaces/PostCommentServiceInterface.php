<?php

namespace App\Contracts\ServiceInterfaces;

use App\Contracts\DtoContracts\V1\PostComment\PostCommentIndexDtoContract;
use App\Contracts\DtoContracts\V1\PostComment\PostCommentReplyStoreDtoContract;
use App\Contracts\DtoContracts\V1\PostComment\PostCommentStoreDtoContract;
use App\Dto\V1\PostComment\PostCommentIndexDto;
use App\Dto\V1\PostComment\PostCommentReplyStoreDto;
use App\Dto\V1\PostComment\PostCommentStoreDto;
use App\Models\Resources\PostComment\PostCommentReplyResource;
use App\Models\Resources\PostComment\PostCommentResource;
use Illuminate\Auth\AuthenticationException;

interface PostCommentServiceInterface
{
    /**
     * @param PostCommentStoreDtoContract $dto
     * @return mixed
     */
    public function postCommentStore(PostCommentStoreDtoContract $dto): PostCommentResource;

    /**
     * @param PostCommentIndexDtoContract $dto
     * @return mixed
     */
    public function postCommentIndex(PostCommentIndexDtoContract $dto): mixed;

    /**
     * @param PostCommentReplyStoreDtoContract $dto
     * @return PostCommentReplyResource
     * @throws AuthenticationException
     */
    public function postCommentReplyStore(PostCommentReplyStoreDtoContract $dto): PostCommentReplyResource;

}

<?php

namespace App\Services;

use App\Contracts\DtoContracts\V1\PostComment\PostCommentIndexDtoContract;
use App\Contracts\DtoContracts\V1\PostComment\PostCommentReplyStoreDtoContract;
use App\Contracts\DtoContracts\V1\PostComment\PostCommentStoreDtoContract;
use App\Contracts\ServiceInterfaces\PostCommentServiceInterface;
use App\Dto\V1\PostComment\PostCommentIndexDto;
use App\Dto\V1\PostComment\PostCommentReplyStoreDto;
use App\Dto\V1\PostComment\PostCommentStoreDto;
use App\Models\Resources\PostComment\PostCommentReplyResource;
use App\Models\Resources\PostComment\PostCommentResource;
use App\Presenters\PostCommentPresenter;
use App\Repositories\V1\PostCommentRepository;
use Illuminate\Auth\AuthenticationException;

final readonly class PostCommentService implements PostCommentServiceInterface
{
    /**
     * @param PostCommentRepository $postCommentRepository
     * @param PostCommentPresenter $postCommentPresenter
     */
    public function __construct(
        private PostCommentRepository $postCommentRepository,
        private PostCommentPresenter $postCommentPresenter
    )
    {
    }

    /**
     * @param PostCommentStoreDto|PostCommentStoreDtoContract $dto
     * @return PostCommentResource
     * @throws AuthenticationException
     */
    public function postCommentStore(PostCommentStoreDto|PostCommentStoreDtoContract $dto): PostCommentResource
    {
        $post = $this->postCommentRepository->postCommentStore(getUser(), $dto);

        return $this->postCommentPresenter->present($post);
    }

    /**
     * @param PostCommentIndexDto|PostCommentIndexDtoContract $dto
     * @return mixed
     */
    public function postCommentIndex(PostCommentIndexDto|PostCommentIndexDtoContract $dto): mixed
    {
        $posts = $this->postCommentRepository->postCommentIndex($dto);

        return $this->postCommentPresenter->presentIndex($posts);
    }

    /**
     * @param PostCommentReplyStoreDto|PostCommentReplyStoreDtoContract $dto
     * @return PostCommentReplyResource
     * @throws AuthenticationException
     */
    public function postCommentReplyStore(PostCommentReplyStoreDto|PostCommentReplyStoreDtoContract $dto): PostCommentReplyResource
    {
        $reply = $this->postCommentRepository->postCommentReplyStore(getUser(), $dto);

        return $this->postCommentPresenter->presentReply($reply);
    }
}

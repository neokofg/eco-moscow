<?php

namespace App\Services;

use App\Contracts\DtoContracts\V1\NoteComment\NoteCommentIndexDtoContract;
use App\Contracts\DtoContracts\V1\NoteComment\NoteCommentReplyStoreDtoContract;
use App\Contracts\DtoContracts\V1\NoteComment\NoteCommentStoreDtoContract;
use App\Contracts\ServiceInterfaces\NoteCommentServiceInterface;
use App\Dto\V1\NoteComment\NoteCommentIndexDto;
use App\Dto\V1\NoteComment\NoteCommentReplyStoreDto;
use App\Dto\V1\NoteComment\NoteCommentStoreDto;
use App\Models\Resources\NoteComment\NoteCommentReplyResource;
use App\Models\Resources\NoteComment\NoteCommentResource;
use App\Presenters\NoteCommentPresenter;
use App\Repositories\V1\NoteCommentRepository;
use Illuminate\Auth\AuthenticationException;

final readonly class NoteCommentService implements NoteCommentServiceInterface
{
    /**
     * @param NoteCommentRepository $noteCommentRepository
     * @param NoteCommentPresenter $noteCommentPresenter
     */
    public function __construct(
        private NoteCommentRepository $noteCommentRepository,
        private NoteCommentPresenter $noteCommentPresenter
    )
    {
    }

    /**
     * @param NoteCommentStoreDto|NoteCommentStoreDtoContract $dto
     * @return NoteCommentResource
     * @throws AuthenticationException
     */
    public function noteCommentStore(NoteCommentStoreDto|NoteCommentStoreDtoContract $dto): NoteCommentResource
    {
        $post = $this->noteCommentRepository->noteCommentStore(getUser(), $dto);

        return $this->noteCommentPresenter->present($post);
    }

    /**
     * @param NoteCommentIndexDto|NoteCommentIndexDtoContract $dto
     * @return mixed
     */
    public function noteCommentIndex(NoteCommentIndexDto|NoteCommentIndexDtoContract $dto): mixed
    {
        $posts = $this->noteCommentRepository->noteCommentIndex($dto);

        return $this->noteCommentPresenter->presentIndex($posts);
    }

    /**
     * @param NoteCommentReplyStoreDto|NoteCommentReplyStoreDtoContract $dto
     * @return NoteCommentReplyResource
     * @throws AuthenticationException
     */
    public function noteCommentReplyStore(NoteCommentReplyStoreDto|NoteCommentReplyStoreDtoContract $dto): NoteCommentReplyResource
    {
        $reply = $this->noteCommentRepository->noteCommentReplyStore(getUser(), $dto);

        return $this->noteCommentPresenter->presentReply($reply);
    }
}

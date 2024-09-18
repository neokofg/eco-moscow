<?php

namespace App\Contracts\ServiceInterfaces;

use App\Contracts\DtoContracts\V1\NoteComment\NoteCommentIndexDtoContract;
use App\Contracts\DtoContracts\V1\NoteComment\NoteCommentReplyStoreDtoContract;
use App\Contracts\DtoContracts\V1\NoteComment\NoteCommentStoreDtoContract;
use App\Models\Resources\NoteComment\NoteCommentReplyResource;
use App\Models\Resources\NoteComment\NoteCommentResource;
use Illuminate\Auth\AuthenticationException;

interface NoteCommentServiceInterface
{
    /**
     * @param NoteCommentStoreDtoContract $dto
     * @return NoteCommentResource
     */
    public function noteCommentStore(NoteCommentStoreDtoContract $dto): NoteCommentResource;

    /**
     * @param NoteCommentIndexDtoContract $dto
     * @return mixed
     */
    public function noteCommentIndex(NoteCommentIndexDtoContract $dto): mixed;

    /**
     * @param NoteCommentReplyStoreDtoContract $dto
     * @return NoteCommentReplyResource
     * @throws AuthenticationException
     */
    public function noteCommentReplyStore(NoteCommentReplyStoreDtoContract $dto): NoteCommentReplyResource;
}

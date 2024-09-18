<?php

namespace App\Repositories\V1;

use App\Contracts\DtoContracts\V1\NoteComment\NoteCommentIndexDtoContract;
use App\Contracts\DtoContracts\V1\NoteComment\NoteCommentReplyStoreDtoContract;
use App\Contracts\DtoContracts\V1\NoteComment\NoteCommentStoreDtoContract;
use App\Dto\V1\NoteComment\NoteCommentIndexDto;
use App\Dto\V1\NoteComment\NoteCommentReplyStoreDto;
use App\Dto\V1\NoteComment\NoteCommentStoreDto;
use App\Models\NoteComment;
use App\Models\NoteCommentReply;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class NoteCommentRepository extends Repository
{
    /**
     * @param User $user
     * @param NoteCommentStoreDto|NoteCommentStoreDtoContract $dto
     * @return NoteComment
     */
    public function noteCommentStore(User $user, NoteCommentStoreDto|NoteCommentStoreDtoContract $dto): NoteComment
    {
        return NoteComment::create([
            'comment' => $dto->comment,
            'note_id' => $dto->note_id,
            'user_id' => $user->id,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ]);
    }

    /**
     * @param NoteCommentIndexDto|NoteCommentIndexDtoContract $dto
     * @return LengthAwarePaginator
     */
    public function noteCommentIndex(NoteCommentIndexDto|NoteCommentIndexDtoContract $dto): LengthAwarePaginator
    {
        return NoteComment::where('post_id','=',$dto->note_id)
            ->paginate($dto->first, page: $dto->page)
            ->appends(['first' => $dto->first]);
    }

    /**
     * @param User $user
     * @param NoteCommentReplyStoreDto|NoteCommentReplyStoreDtoContract $dto
     * @return NoteCommentReply
     */
    public function noteCommentReplyStore(User $user, NoteCommentReplyStoreDto|NoteCommentReplyStoreDtoContract $dto): NoteCommentReply
    {
        return NoteCommentReply::create([
            'comment' => $dto->comment,
            'note_comment_id' => $dto->note_comment_id,
            'user_id' => $user->id,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ]);
    }
}

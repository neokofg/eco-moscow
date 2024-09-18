<?php

namespace App\Repositories\V1;

use App\Contracts\DtoContracts\V1\VideoComment\VideoCommentIndexDtoContract;
use App\Contracts\DtoContracts\V1\VideoComment\VideoCommentReplyStoreDtoContract;
use App\Contracts\DtoContracts\V1\VideoComment\VideoCommentStoreDtoContract;
use App\Dto\V1\VideoComment\VideoCommentIndexDto;
use App\Dto\V1\VideoComment\VideoCommentReplyStoreDto;
use App\Dto\V1\VideoComment\VideoCommentStoreDto;
use App\Models\User;
use App\Models\VideoComment;
use App\Models\VideoCommentReply;
use App\Repositories\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class VideoCommentRepository extends Repository
{
    /**
     * @param User $user
     * @param VideoCommentStoreDto|VideoCommentStoreDtoContract $dto
     * @return VideoComment
     */
    public function videoCommentStore(User $user, VideoCommentStoreDto|VideoCommentStoreDtoContract $dto): VideoComment
    {
        return VideoComment::create([
            'comment' => $dto->comment,
            'video_id' => $dto->video_id,
            'user_id' => $user->id,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ]);
    }

    /**
     * @param VideoCommentIndexDto|VideoCommentIndexDtoContract $dto
     * @return LengthAwarePaginator
     */
    public function videoCommentIndex(VideoCommentIndexDto|VideoCommentIndexDtoContract $dto): LengthAwarePaginator
    {
        return VideoComment::where('video_id','=',$dto->video_id)
            ->paginate($dto->first, page: $dto->page)
            ->appends(['first' => $dto->first]);
    }

    /**
     * @param User $user
     * @param VideoCommentReplyStoreDto|VideoCommentReplyStoreDtoContract $dto
     * @return VideoCommentReply
     */
    public function videoCommentReplyStore(User $user, VideoCommentReplyStoreDto|VideoCommentReplyStoreDtoContract $dto): VideoCommentReply
    {
        return VideoCommentReply::create([
            'comment' => $dto->comment,
            'video_comment_id' => $dto->video_comment_id,
            'user_id' => $user->id,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ]);
    }
}

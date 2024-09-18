<?php

namespace App\Repositories\V1;

use App\Dto\V1\Video\VideoIndexDto;
use App\Dto\V1\Video\VideoStoreDto;
use App\Models\User;
use App\Models\Video;
use App\Repositories\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class VideoRepository extends Repository
{
    /**
     * @param User $user
     * @param VideoStoreDto $dto
     * @return Video
     */
    public function videoStore(User $user, VideoStoreDto $dto): Video
    {
        return Video::create([
            'title' => $dto->name,
            'description' => $dto->description,
            'video_url' => $dto->video_url,
            'preview_url' => $dto->preview_url,
            'category_id' => $dto->category_id,
            'user_id' => $user->id,
        ]);
    }

    /**
     * @param VideoIndexDto $dto
     * @return LengthAwarePaginator
     */
    public function videoIndex(VideoIndexDto $dto): LengthAwarePaginator
    {
        $videos = Video::query();

        if (isset($dto->user_id)) {
            $videos->where('user_id', '=', $dto->user_id);
        }

        if (isset($dto->category_id)) {
            $videos->where('category_id', '=', $dto->category_id);
        }

        if (isset($dto->search)) {
            $videos->where(function ($query) use($dto){
                $query->where('title', 'ILIKE', '%' . $dto->search . '%')
                    ->orWhere('description', 'ILIKE', '%' . $dto->search . '%');
            });
        }

        return $videos->paginate($dto->first, page: $dto->page)->appends(['first' => $dto->first]);
    }

    /**
     * @param string $id
     * @return Video
     */
    public function videoGet(string $id): Video
    {
        $video = Video::findOrFail($id);

        $video->update([
            'views' => $video->views + 1
        ]);

        return $video;
    }
}

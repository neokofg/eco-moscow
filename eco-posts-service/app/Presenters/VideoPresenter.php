<?php

namespace App\Presenters;

use App\Models\Resources\Video\VideoResource;
use App\Models\Video;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class VideoPresenter
{
    public function present(Video $video): VideoResource
    {
        return new VideoResource($video);
    }

    public function presentIndex(LengthAwarePaginator $videos): mixed
    {
        return VideoResource::collection($videos)->response()->getData();
    }
}

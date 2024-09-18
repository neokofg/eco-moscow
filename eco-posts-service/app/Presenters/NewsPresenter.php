<?php

namespace App\Presenters;

use App\Models\News;
use App\Models\Resources\News\NewsIndexResource;
use App\Models\Resources\News\NewsResource;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class NewsPresenter
{
    /**
     * @param LengthAwarePaginator $newses
     * @return mixed
     */
    public function presentIndex(LengthAwarePaginator $newses): mixed
    {
        return NewsIndexResource::collection($newses)->response()->getData();
    }

    /**
     * @param News $news
     * @return NewsResource
     */
    public function present(News $news): NewsResource
    {
        return new NewsResource($news);
    }
}

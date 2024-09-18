<?php

namespace App\Presenters;

use App\Models\Post;
use App\Models\Resources\Post\PostIndexResource;
use App\Models\Resources\Post\PostResource;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class PostPresenter
{
    /**
     * @param Post $post
     * @return PostResource
     */
    public function present(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * @param LengthAwarePaginator $posts
     * @return mixed
     */
    public function presentIndex(LengthAwarePaginator $posts): mixed
    {
        return PostIndexResource::collection($posts)->response()->getData();
    }
}

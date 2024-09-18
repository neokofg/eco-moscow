<?php

namespace App\Repositories\V1;

use App\Dto\V1\Post\PostIndexDto;
use App\Dto\V1\Post\PostStoreDto;
use App\Models\Post;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class PostRepository extends Repository
{
    /**
     * @param User $user
     * @param PostStoreDto $dto
     * @return Post
     */
    public function postStore(User $user, PostStoreDto $dto): Post
    {
        return Post::create([
            'title' => $dto->title,
            'preview_url' => $dto->preview_url,
            'category_id' => $dto->category_id,
            'user_id' => $user->id,
            'content' => $dto->content,
        ]);
    }

    /**
     * @param PostIndexDto $dto
     * @return LengthAwarePaginator
     */
    public function postIndex(PostIndexDto $dto): LengthAwarePaginator
    {
        $posts = Post::query();

        if (isset($dto->search)) {
            $posts->where(function ($query) use($dto){
                $query->where('title', 'ILIKE', '%' . $dto->search . '%')
                    ->orWhere('content', 'ILIKE', '%' . $dto->search . '%');
            });
        }

        return $posts->paginate($dto->first, page: $dto->page)->appends(['first' => $dto->first]);
    }

    /**
     * @param string $id
     * @return Post
     */
    public function postGet(string $id): Post
    {
        $post = Post::findOrFail($id);

        $post->update([
            'views' => $post->views + 1
        ]);

        return $post;
    }
}

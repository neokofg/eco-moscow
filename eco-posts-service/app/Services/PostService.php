<?php

namespace App\Services;

use App\Contracts\DtoContracts\V1\Post\PostIndexDtoContract;
use App\Contracts\DtoContracts\V1\Post\PostStoreDtoContract;
use App\Contracts\ServiceInterfaces\PostServiceInterface;
use App\Dto\V1\Post\PostIndexDto;
use App\Dto\V1\Post\PostStoreDto;
use App\Models\Resources\Post\PostResource;
use App\Presenters\PostPresenter;
use App\Repositories\V1\PostRepository;
use Illuminate\Auth\AuthenticationException;

final readonly class PostService implements PostServiceInterface
{
    /**
     * @param PostRepository $postRepository
     * @param PostPresenter $postPresenter
     */
    public function __construct(
        private PostRepository $postRepository,
        private PostPresenter $postPresenter
    )
    {
    }

    /**
     * @param PostStoreDto|PostStoreDtoContract $dto
     * @return PostResource
     * @throws AuthenticationException
     */
    public function postStore(PostStoreDto|PostStoreDtoContract $dto): PostResource
    {
        $post = $this->postRepository->postStore(getUser(), $dto);

        return $this->postPresenter->present($post);
    }


    /**
     * @param PostIndexDto|PostIndexDtoContract $dto
     * @return mixed
     */
    public function postIndex(PostIndexDto|PostIndexDtoContract $dto): mixed
    {
        $posts = $this->postRepository->postIndex($dto);

        return $this->postPresenter->presentIndex($posts);
    }

    /**
     * @param string $id
     * @return PostResource
     */
    public function postGet(string $id): PostResource
    {
        $post = $this->postRepository->postGet($id);

        return $this->postPresenter->present($post);
    }
}

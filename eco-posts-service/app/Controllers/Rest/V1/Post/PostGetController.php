<?php

namespace App\Controllers\Rest\V1\Post;

use App\Contracts\ServiceInterfaces\PostServiceInterface;
use App\Controllers\Controller;
use App\Traits\ValidateIdTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class PostGetController extends Controller
{
    use ValidateIdTrait;

    /**
     * @param PostServiceInterface $postService
     */
    public function __construct(
        private PostServiceInterface $postService
    )
    {
        parent::__construct();
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function __invoke(string $id): JsonResponse
    {
        $this->validatePostId($id);

        try {
            $post = $this->postService->postGet($id);
        } catch (ModelNotFoundException $exception) {
            return $this->presenter->present(false, __('Post not found'), Response::HTTP_NOT_FOUND);
        }

        return $this->presenter->present($post, __('Successfully founded post'), Response::HTTP_OK);
    }
}

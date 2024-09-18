<?php

namespace App\Controllers\Rest\V1\Post;

use App\Contracts\ServiceInterfaces\PostServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\Post\PostStoreRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class PostStoreController extends Controller
{
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
     * @param PostStoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(PostStoreRequest $request): JsonResponse
    {
        $post = $this->postService->postStore($request->getDto());

        return $this->presenter->present($post, __('Successfully created post'), Response::HTTP_CREATED);
    }
}

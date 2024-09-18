<?php

namespace App\Controllers\Rest\V1\Post;

use App\Contracts\ServiceInterfaces\PostServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\Post\PostIndexRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class PostIndexController extends Controller
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
     * @param PostIndexRequest $request
     * @return JsonResponse
     */
    public function __invoke(PostIndexRequest $request): JsonResponse
    {
        $posts = $this->postService->postIndex($request->getDto());

        return $this->presenter->present($posts, __('Successfully got data'), Response::HTTP_OK);
    }
}

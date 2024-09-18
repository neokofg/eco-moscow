<?php

namespace App\Controllers\Rest\V1\PostComment;

use App\Contracts\ServiceInterfaces\PostCommentServiceInterface;
use App\Controllers\Controller;
use App\Dto\V1\PostComment\PostCommentIndexDto;
use App\Requests\Rest\V1\PostComment\PostCommentIndexRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class PostCommentIndexController extends Controller
{
    /**
     * @param PostCommentServiceInterface $postCommentService
     */
    public function __construct(
        private PostCommentServiceInterface $postCommentService
    )
    {
        parent::__construct();
    }

    /**
     * @param PostCommentIndexRequest $request
     * @return JsonResponse
     */
    public function __invoke(PostCommentIndexRequest $request): JsonResponse
    {
        $posts = $this->postCommentService->postCommentIndex($request->getDto());

        return $this->presenter->present($posts, __('Successfully got data'), Response::HTTP_OK);
    }
}

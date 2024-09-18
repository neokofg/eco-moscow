<?php

namespace App\Controllers\Rest\V1\PostComment;

use App\Contracts\ServiceInterfaces\PostCommentServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\PostComment\PostCommentStoreRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class PostCommentStoreController extends Controller
{
    /**
     * @param PostCommentServiceInterface $commentService
     */
    public function __construct(
        private PostCommentServiceInterface $commentService
    )
    {
        parent::__construct();
    }

    /**
     * @param PostCommentStoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(PostCommentStoreRequest $request): JsonResponse
    {
        $post = $this->commentService->postCommentStore($request->getDto());

        return $this->presenter->present($post, __('Successfully created comment'), Response::HTTP_CREATED);
    }
}

<?php

namespace App\Controllers\Rest\V1\PostComment;

use App\Contracts\ServiceInterfaces\PostCommentServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\PostComment\PostCommentReplyStoreRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class PostCommentReplyStoreController extends Controller
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
     * @param PostCommentReplyStoreRequest $request
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function __invoke(PostCommentReplyStoreRequest $request): JsonResponse
    {
        $reply = $this->postCommentService->postCommentReplyStore($request->getDto());

        return $this->presenter->present($reply, __('Successfully created reply'), Response::HTTP_CREATED);
    }
}

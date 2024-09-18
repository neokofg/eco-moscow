<?php

namespace App\Controllers\Rest\V1\VideoComment;

use App\Contracts\ServiceInterfaces\VideoCommentServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\VideoComment\VideoCommentReplyStoreRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class VideoCommentReplyStoreController extends Controller
{
    /**
     * @param VideoCommentServiceInterface $commentService
     */
    public function __construct(
        private VideoCommentServiceInterface $commentService
    )
    {
        parent::__construct();
    }

    /**
     * @param VideoCommentReplyStoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(VideoCommentReplyStoreRequest $request): JsonResponse
    {
        $reply = $this->commentService->videoCommentReplyStore($request->getDto());

        return $this->presenter->present($reply, __('Successfully created reply'), Response::HTTP_CREATED);
    }
}

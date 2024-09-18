<?php

namespace App\Controllers\Rest\V1\VideoComment;

use App\Contracts\ServiceInterfaces\VideoCommentServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\VideoComment\VideoCommentStoreRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class VideoCommentStoreController extends Controller
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
     * @param VideoCommentStoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(VideoCommentStoreRequest $request): JsonResponse
    {
        $video = $this->commentService->videoCommentStore($request->getDto());

        return $this->presenter->present($video, __('Successfully created video'), Response::HTTP_CREATED);
    }
}

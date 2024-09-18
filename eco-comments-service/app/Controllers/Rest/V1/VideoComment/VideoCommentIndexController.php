<?php

namespace App\Controllers\Rest\V1\VideoComment;

use App\Contracts\ServiceInterfaces\VideoCommentServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\VideoComment\VideoCommentIndexRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class VideoCommentIndexController extends Controller
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
     * @param VideoCommentIndexRequest $request
     * @return JsonResponse
     */
    public function __invoke(VideoCommentIndexRequest $request): JsonResponse
    {
        $videos = $this->commentService->videoCommentIndex($request->getDto());

        return $this->presenter->present($videos, __('Successfully got data'), Response::HTTP_OK);
    }
}

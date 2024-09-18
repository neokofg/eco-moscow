<?php

namespace App\Controllers\Rest\V1\Video;

use App\Contracts\ServiceInterfaces\VideoServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\Video\VideoStoreRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class VideoStoreController extends Controller
{
    /**
     * @param VideoServiceInterface $videoService
     */
    public function __construct(
        private VideoServiceInterface $videoService
    )
    {
        parent::__construct();
    }

    /**
     * @param VideoStoreRequest $request
     * @return JsonResponse
     */
    public function __invoke(VideoStoreRequest $request): JsonResponse
    {
        $video = $this->videoService->videoStore($request->getDto());

        return $this->presenter->present($video, __('Successfully uploaded video'), Response::HTTP_CREATED);
    }
}

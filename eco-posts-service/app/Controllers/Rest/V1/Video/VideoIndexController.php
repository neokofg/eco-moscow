<?php

namespace App\Controllers\Rest\V1\Video;

use App\Contracts\ServiceInterfaces\VideoServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\Video\VideoIndexRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class VideoIndexController extends Controller
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
     * @param VideoIndexRequest $request
     * @return JsonResponse
     */
    public function __invoke(VideoIndexRequest $request): JsonResponse
    {
        $videos = $this->videoService->videoIndex($request->getDto());

        return $this->presenter->present($videos, __('Successfully got data'), Response::HTTP_OK);
    }
}

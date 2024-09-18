<?php

namespace App\Controllers\Rest\V1\Video;

use App\Contracts\ServiceInterfaces\VideoServiceInterface;
use App\Controllers\Controller;
use App\Traits\ValidateIdTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class VideoGetController extends Controller
{
    use ValidateIdTrait;
    public function __construct(
        private VideoServiceInterface $videoService
    )
    {
        parent::__construct();
    }

    public function __invoke(string $id): JsonResponse
    {
        $this->validateVideoId($id);
        try {
            $video = $this->videoService->videoGet($id);
        } catch (ModelNotFoundException $exception) {
            return $this->presenter->present(false, __('Video not found'), Response::HTTP_NOT_FOUND);
        }

        return $this->presenter->present($video, __('Successfully got data'), Response::HTTP_OK);
    }
}

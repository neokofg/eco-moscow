<?php

namespace App\Controllers\Rest\V1\News;

use App\Contracts\ServiceInterfaces\NewsServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\News\NewsIndexRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class NewsIndexController extends Controller
{
    /**
     * @param NewsServiceInterface $newsService
     */
    public function __construct(
        private NewsServiceInterface $newsService
    )
    {
        parent::__construct();
    }

    /**
     * @param NewsIndexRequest $request
     * @return JsonResponse
     */
    public function __invoke(NewsIndexRequest $request): JsonResponse
    {
        $newses = $this->newsService->newsIndex($request->getDto());

        return $this->presenter->present($newses, __('Successfully got data'), Response::HTTP_OK);
    }
}

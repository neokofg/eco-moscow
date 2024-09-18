<?php

namespace App\Controllers\Rest\V1\News;

use App\Contracts\ServiceInterfaces\NewsServiceInterface;
use App\Controllers\Controller;
use App\Traits\ValidateIdTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class NewsGetController extends Controller
{
    use ValidateIdTrait;

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
     * @param string $id
     * @return JsonResponse
     */
    public function __invoke(string $id): JsonResponse
    {
        $this->validateNewsId($id);

        try {
            $news = $this->newsService->newsGet($id);
        } catch (ModelNotFoundException $exception) {
            return $this->presenter->present(false, __('News not found'), Response::HTTP_NOT_FOUND);
        }

        return $this->presenter->present($news, __('Successfully got data'), Response::HTTP_OK);
    }
}

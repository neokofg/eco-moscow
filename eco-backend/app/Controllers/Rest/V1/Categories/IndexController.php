<?php

namespace App\Controllers\Rest\V1\Categories;

use App\Contracts\ServiceInterfaces\CategoryServiceInterface;
use App\Controllers\Controller;
use App\Requests\Rest\V1\Category\IndexRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class IndexController extends Controller
{
    /**
     * @param CategoryServiceInterface $categoryService
     */
    public function __construct(
        private CategoryServiceInterface $categoryService
    )
    {
        parent::__construct();
    }

    /**
     * @param IndexRequest $request
     * @return JsonResponse
     */
    public function __invoke(IndexRequest $request): JsonResponse
    {
        $categories = $this->categoryService->indexCategories($request->getDto());

        return $this->presenter->present($categories, __('Successfully got data'), Response::HTTP_OK);
    }
}

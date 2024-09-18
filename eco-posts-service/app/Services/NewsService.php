<?php

namespace App\Services;

use App\Contracts\DtoContracts\V1\News\NewsIndexDtoContract;
use App\Contracts\ServiceInterfaces\NewsServiceInterface;
use App\Dto\V1\News\NewsIndexDto;
use App\Models\Resources\News\NewsResource;
use App\Presenters\NewsPresenter;
use App\Repositories\V1\NewsRepository;

final readonly class NewsService implements NewsServiceInterface
{
    /**
     * @param NewsRepository $newsRepository
     * @param NewsPresenter $newsPresenter
     */
    public function __construct(
        private NewsRepository $newsRepository,
        private NewsPresenter $newsPresenter
    )
    {
    }

    /**
     * @param NewsIndexDto|NewsIndexDtoContract $dto
     * @return mixed
     */
    public function newsIndex(NewsIndexDto|NewsIndexDtoContract $dto): mixed
    {
        $newses = $this->newsRepository->newsIndex($dto);

        return $this->newsPresenter->presentIndex($newses);
    }

    /**
     * @param string $id
     * @return NewsResource
     */
    public function newsGet(string $id): NewsResource
    {
        $news = $this->newsRepository->newsGet($id);

        return $this->newsPresenter->present($news);
    }
}

<?php

namespace App\Repositories\V1;

use App\Dto\V1\News\NewsIndexDto;
use App\Models\News;
use App\Repositories\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class NewsRepository extends Repository
{
    /**
     * @param NewsIndexDto $dto
     * @return LengthAwarePaginator
     */
    public function newsIndex(NewsIndexDto $dto): LengthAwarePaginator
    {
        $news = News::query();

        if (isset($dto->category_id)) {
            $news->where('category_id', '=', $dto->category_id);
        }

        if (isset($dto->search)) {
            $news->where(function ($query) use($dto){
                $query->where('header', 'ILIKE', '%' . $dto->search . '%')
                    ->orWhere('content', 'ILIKE', '%' . $dto->search . '%');
            });
        }

        return $news->paginate($dto->first, page: $dto->page)->appends(['first' => $dto->first]);
    }

    /**
     * @param string $id
     * @return News
     */
    public function newsGet(string $id): News
    {
        $news = News::findOrFail($id);

        $news->update([
            'views' => $news->views + 1
        ]);

        return $news;
    }
}

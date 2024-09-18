<?php

namespace App\Repositories\V1;

use App\Contracts\DtoContracts\V1\Note\WallDtoContract;
use App\Dto\V1\Note\WallDto;
use App\Models\PostsDb\Note;
use App\Repositories\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class NoteRepository extends Repository
{
    /**
     * @param WallDto|WallDtoContract $dto
     * @return LengthAwarePaginator
     */
    public function wallGet(WallDto|WallDtoContract $dto): LengthAwarePaginator
    {
        $notes = Note::query();

        $notes->orderBy('created_at', 'DESC');

        return $notes->paginate($dto->first, page: $dto->page)->appends(['first' => $dto->first]);

    }
}

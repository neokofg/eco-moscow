<?php

namespace App\Repositories\V1;

use App\Contracts\DtoContracts\V1\Note\NoteIndexDtoContract;
use App\Contracts\DtoContracts\V1\Note\NoteStoreDtoContract;
use App\Dto\V1\Note\NoteIndexDto;
use App\Dto\V1\Note\NoteStoreDto;
use App\Models\Note;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class NoteRepository extends Repository
{
    /**
     * @param User $user
     * @param NoteStoreDto|NoteStoreDtoContract $dto
     * @return Note
     */
    public function noteStore(User $user, NoteStoreDto|NoteStoreDtoContract $dto): Note
    {
        return Note::create([
            'title' => $dto->title,
            'content' => $dto->content,
            'image_url' => $dto->image_url,
            'category_id' => $dto->category_id,
            'user_id' => $user->id,
        ]);
    }

    /**
     * @param NoteIndexDto|NoteIndexDtoContract $dto
     * @return LengthAwarePaginator
     */
    public function noteIndex(NoteIndexDto|NoteIndexDtoContract $dto): LengthAwarePaginator
    {
        $notes = Note::query();

        if (isset($dto->user_id)) {
            $notes->where('user_id', '=', $dto->user_id);
        }

        if (isset($dto->category_id)) {
            $notes->where('category_id', '=', $dto->category_id);
        }

        if (isset($dto->search)) {
            $notes->where(function ($query) use($dto){
                $query->where('title', 'ILIKE', '%' . $dto->search . '%')
                    ->orWhere('content', 'ILIKE', '%' . $dto->search . '%');
            });
        }

        return $notes->paginate($dto->first, page: $dto->page)->appends(['first' => $dto->first]);
    }

    /**
     * @param string $id
     * @return Note
     */
    public function noteGet(string $id): Note
    {
        $note = Note::findOrFail($id);

        $note->update([
            'views' => $note->views + 1
        ]);

        return $note;
    }
}

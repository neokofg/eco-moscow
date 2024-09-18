<?php

namespace App\Presenters;

use App\Models\Note;
use App\Models\Resources\Note\NoteIndexResource;
use App\Models\Resources\Note\NoteResource;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class NotePresenter
{
    /**
     * @param Note $note
     * @return NoteResource
     */
    public function present(Note $note): NoteResource
    {
        return new NoteResource($note);
    }

    /**
     * @param LengthAwarePaginator $notes
     * @return mixed
     */
    public function presentIndex(LengthAwarePaginator $notes): mixed
    {
        return NoteIndexResource::collection($notes)->response()->getData();
    }
}

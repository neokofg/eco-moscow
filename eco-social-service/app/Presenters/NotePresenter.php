<?php

namespace App\Presenters;

use App\Models\Resources\Note\NoteIndexResource;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class NotePresenter
{
    /**
     * @param LengthAwarePaginator $notes
     * @return mixed
     */
    public function presentIndex(LengthAwarePaginator $notes): mixed
    {
        return NoteIndexResource::collection($notes)->response()->getData();
    }
}

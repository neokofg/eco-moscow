<?php

namespace App\Presenters;

use App\Models\Competition;
use App\Models\Resources\Competition\CompetitionIndexResource;
use App\Models\Resources\Competition\CompetitionResource;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class CompetitionPresenter
{
    public function present(Competition $event): CompetitionResource
    {
        return new CompetitionResource($event);
    }

    public function presentIndex(LengthAwarePaginator $events): mixed
    {
        return CompetitionIndexResource::collection($events)->response()->getData();
    }
}

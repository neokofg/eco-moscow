<?php

namespace App\Presenters;

use App\Models\Marathon;
use App\Models\Resources\Marathon\MarathonIndexResource;
use App\Models\Resources\Marathon\MarathonResource;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class MarathonPresenter
{
    public function present(Marathon $event): MarathonResource
    {
        return new MarathonResource($event);
    }

    public function presentIndex(LengthAwarePaginator $events): mixed
    {
        return MarathonIndexResource::collection($events)->response()->getData();
    }
}

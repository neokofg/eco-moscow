<?php

namespace App\Presenters;

use App\Models\Marathon;
use App\Models\Resources\Marathon\MarathonIndexResource;
use App\Models\Resources\Marathon\MarathonResource;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class MarathonPresenter
{
    /**
     * @param Marathon $event
     * @return MarathonResource
     */
    public function present(Marathon $event): MarathonResource
    {
        return new MarathonResource($event);
    }

    /**
     * @param LengthAwarePaginator $events
     * @return mixed
     */
    public function presentIndex(LengthAwarePaginator $events): mixed
    {
        return MarathonIndexResource::collection($events)->response()->getData();
    }
}

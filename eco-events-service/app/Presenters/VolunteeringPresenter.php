<?php

namespace App\Presenters;

use App\Models\Resources\Volunteering\VolunteeringIndexResource;
use App\Models\Resources\Volunteering\VolunteeringResource;
use App\Models\Volunteering;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class VolunteeringPresenter
{
    public function present(Volunteering $event): VolunteeringResource
    {
        return new VolunteeringResource($event);
    }

    public function presentIndex(LengthAwarePaginator $events): mixed
    {
        return VolunteeringIndexResource::collection($events)->response()->getData();
    }
}

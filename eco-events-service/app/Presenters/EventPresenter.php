<?php

namespace App\Presenters;

use App\Models\Event;
use App\Models\Resources\Event\EventIndexResource;
use App\Models\Resources\Event\EventResource;
use App\Models\Resources\Event\PromotionIndexResource;
use App\Models\Resources\Event\PromotionResource;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class EventPresenter
{
    public function present(Event $event): EventResource
    {
        return new EventResource($event);
    }

    public function presentIndex(LengthAwarePaginator $events): mixed
    {
        return EventIndexResource::collection($events)->response()->getData();
    }
}

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
    /**
     * @param Event $event
     * @return EventResource
     */
    public function present(Event $event): EventResource
    {
        return new EventResource($event);
    }

    /**
     * @param LengthAwarePaginator $events
     * @return mixed
     */
    public function presentIndex(LengthAwarePaginator $events): mixed
    {
        return EventIndexResource::collection($events)->response()->getData();
    }
}

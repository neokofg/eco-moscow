<?php

namespace App\Presenters;

use App\Models\Event;
use App\Models\Promotion;
use App\Models\Resources\Promotion\PromotionIndexResource;
use App\Models\Resources\Promotion\PromotionResource;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class PromotionPresenter
{
    /**
     * @param Promotion $event
     * @return PromotionResource
     */
    public function present(Promotion $event): PromotionResource
    {
        return new PromotionResource($event);
    }

    /**
     * @param LengthAwarePaginator $events
     * @return mixed
     */
    public function presentIndex(LengthAwarePaginator $events): mixed
    {
        return PromotionIndexResource::collection($events)->response()->getData();
    }
}

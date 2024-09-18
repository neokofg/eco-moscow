<?php

namespace App\Presenters;

use App\Models\Event;
use App\Models\Promotion;
use App\Models\Resources\Event\PromotionIndexResource;
use App\Models\Resources\Event\PromotionResource;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class PromotionPresenter
{
    public function present(Promotion $event): PromotionResource
    {
        return new PromotionResource($event);
    }

    public function presentIndex(LengthAwarePaginator $events): mixed
    {
        return PromotionIndexResource::collection($events)->response()->getData();
    }
}

<?php

namespace App\Controllers\Rest\V1\Promotion;

use App\Controllers\Controller;
use App\Models\Promotion;
use App\Models\PromotionUser;
use App\Presenters\PromotionPresenter;
use App\Requests\Rest\V1\Promotion\DonateRequest;
use App\Requests\Rest\V1\Promotion\IndexRequest;
use App\Requests\Rest\V1\Promotion\StoreRequest;
use App\Traits\ValidateIdTrait;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class PromotionController extends Controller
{
    use ValidateIdTrait;

    /**
     * @param PromotionPresenter $promotionPresenter
     */
    public function __construct(
        private PromotionPresenter $promotionPresenter
    )
    {
        parent::__construct();
    }

    /**
     * @param StoreRequest $request
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $promotion = Promotion::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'image_url' => $validated['image_url'],
            'requisites' => $validated['requisites'],
            'user_id' => getUser()->id,
        ]);

        $promotion = $this->promotionPresenter->present($promotion);

        return $this->presenter->present($promotion, __('Successfully created event'), Response::HTTP_CREATED);
    }

    /**
     * @param IndexRequest $request
     * @return JsonResponse
     */
    public function index(IndexRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $events = Promotion::query();

        if (isset($validated['user_id'])) {
            $events->where('user_id', $validated['user_id']);
        }

        if (isset($validated['category_id'])) {
            $events->where('category_id', $validated['category_id']);
        }

        if (isset($validated['search'])) {
            $events->where(function ($query) use ($validated) {
                $query->where('title', 'ILIKE', '%' . $validated['search'] . '%')
                    ->orWhere('content', 'ILIKE', '%' . $validated['search'] . '%');
            });
        }

        $events = $events->paginate($validated['first'], page: $validated['page'])->appends(['first' => $validated['first']]);

        $events = $this->promotionPresenter->presentIndex($events);

        return $this->presenter->present($events, __('Successfully got data'), Response::HTTP_OK);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function get(string $id): JsonResponse
    {
        $this->validatePromotionId($id);

        $event = Promotion::find($id);

        $event->update([
            'views' => $event->views + 1,
        ]);

        $event = $this->promotionPresenter->present($event);

        return $this->presenter->present($event, __('Successfully got data'), Response::HTTP_OK);
    }

    /**
     * @param DonateRequest $request
     * @param string $id
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function donate(DonateRequest $request, string $id): JsonResponse
    {
        $validated = $request->validated();
        $this->validatePromotionId($id);

        $event = Promotion::find($id);

        PromotionUser::create([
            'promotion_id' => $event->id,
            'sum' => $validated['sum'],
            'user_id' => getUser()->id,
        ]);

        $event = $this->promotionPresenter->present($event);

        return $this->presenter->present($event, __('Successfully got data'), Response::HTTP_OK);
    }
}

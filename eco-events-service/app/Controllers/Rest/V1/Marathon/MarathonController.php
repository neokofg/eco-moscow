<?php

namespace App\Controllers\Rest\V1\Marathon;

use App\Controllers\Controller;
use App\Models\Marathon;
use App\Models\MarathonUser;
use App\Presenters\MarathonPresenter;
use App\Requests\Rest\V1\Marathon\IndexRequest;
use App\Requests\Rest\V1\Marathon\StoreRequest;
use App\Traits\ValidateIdTrait;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class MarathonController extends Controller
{
    use ValidateIdTrait;

    /**
     * @param MarathonPresenter $marathonPresenter
     */
    public function __construct(
        private MarathonPresenter $marathonPresenter
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
        $event = Marathon::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'image_url' => $validated['image_url'],
            'user_id' => getUser()->id,
        ]);

        $event = $this->marathonPresenter->present($event);

        return $this->presenter->present($event, __('Successfully created event'), Response::HTTP_CREATED);
    }

    /**
     * @param IndexRequest $request
     * @return JsonResponse
     */
    public function index(IndexRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $events = Marathon::query();

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

        $events = $this->marathonPresenter->presentIndex($events);

        return $this->presenter->present($events, __('Successfully got data'), Response::HTTP_OK);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function get(string $id): JsonResponse
    {
        $this->validateMarathonId($id);

        $event = Marathon::find($id);

        $event->update([
            'views' => $event->views + 1,
        ]);

        $event = $this->marathonPresenter->present($event);

        return $this->presenter->present($event, __('Successfully got data'), Response::HTTP_OK);
    }

    /**
     * @param string $id
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function participate(string $id): JsonResponse
    {
        $this->validateMarathonId($id);

        $event = Marathon::find($id);

        MarathonUser::create([
            'marathon_id' => $event->id,
            'user_id' => getUser()->id,
        ]);

        $event = $this->marathonPresenter->present($event);

        return $this->presenter->present($event, __('Successfully got data'), Response::HTTP_OK);
    }
}

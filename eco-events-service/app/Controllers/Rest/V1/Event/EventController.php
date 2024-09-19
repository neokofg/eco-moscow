<?php

namespace App\Controllers\Rest\V1\Event;

use App\Controllers\Controller;
use App\Models\Event;
use App\Models\EventUser;
use App\Presenters\EventPresenter;
use App\Requests\Rest\V1\Event\IndexRequest;
use App\Requests\Rest\V1\Event\StoreRequest;
use App\Traits\ValidateIdTrait;
use Clickbar\Magellan\Data\Geometries\Point;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class EventController extends Controller
{
    use ValidateIdTrait;
    public function __construct(
        private EventPresenter $eventPresenter
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
        $event = Event::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'image_url' => $validated['image_url'],
            'address' => $validated['address'],
            'location' => Point::makeGeodetic($validated['latitude'], $validated['longitude']),
            'user_id' => getUser()->id,
        ]);

        $user = getUser();
        $user->update([
            'event_points' => $user->event_points + 1
        ]);

        $event = $this->eventPresenter->present($event);

        return $this->presenter->present($event, __('Successfully created event'), Response::HTTP_CREATED);
    }

    /**
     * @param IndexRequest $request
     * @return JsonResponse
     */
    public function index(IndexRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $events = Event::query();

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

        $events = $this->eventPresenter->presentIndex($events);

        return $this->presenter->present($events, __('Successfully got data'), Response::HTTP_OK);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function get(string $id): JsonResponse
    {
        $this->validateEventId($id);

        $event = Event::find($id);

        $event->update([
            'views' => $event->views + 1,
        ]);

        $event = $this->eventPresenter->present($event);

        return $this->presenter->present($event, __('Successfully got data'), Response::HTTP_OK);
    }

    /**
     * @param string $id
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function participate(string $id): JsonResponse
    {
        $this->validateEventId($id);

        $event = Event::find($id);

         EventUser::create([
            'event_id' => $event->id,
            'user_id' => getUser()->id,
        ]);

        $user = getUser();
        $user->update([
            'participant_points' => $user->participant_points + 50
        ]);

        $event = $this->eventPresenter->present($event);

        return $this->presenter->present($event, __('Successfully got data'), Response::HTTP_OK);
    }
}

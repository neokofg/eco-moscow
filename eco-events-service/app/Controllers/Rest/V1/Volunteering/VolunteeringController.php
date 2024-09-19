<?php

namespace App\Controllers\Rest\V1\Volunteering;

use App\Controllers\Controller;
use App\Controllers\Grpc\Client\ModerClient;
use App\Controllers\Grpc\Controller\ModerController;
use App\Models\Volunteering;
use App\Models\VolunteeringUser;
use App\Presenters\VolunteeringPresenter;
use App\Requests\Rest\V1\Volunteering\IndexRequest;
use App\Requests\Rest\V1\Volunteering\StoreRequest;
use App\Traits\ValidateIdTrait;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

final readonly class VolunteeringController extends Controller
{
    use ValidateIdTrait;

    /**
     * @param VolunteeringPresenter $volunteeringPresenter
     */
    public function __construct(
        private VolunteeringPresenter $volunteeringPresenter
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

        $client = App::make(ModerClient::class);
        $controller = new ModerController($client);
        if(!$controller->moder($validated['title'] . ' ' . $validated['content'])) {
            return $this->presenter->present(false, __('Bad words'), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $event = Volunteering::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'image_url' => $validated['image_url'],
            'user_id' => getUser()->id,
        ]);

        $user = getUser();
        $user->update([
            'event_points' => $user->event_points + 1
        ]);

        $event = $this->volunteeringPresenter->present($event);

        return $this->presenter->present($event, __('Successfully created event'), Response::HTTP_CREATED);
    }

    /**
     * @param IndexRequest $request
     * @return JsonResponse
     */
    public function index(IndexRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $events = Volunteering::query();

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

        $events = $this->volunteeringPresenter->presentIndex($events);

        return $this->presenter->present($events, __('Successfully got data'), Response::HTTP_OK);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function get(string $id): JsonResponse
    {
        $this->validateVolunteeringId($id);

        $event = Volunteering::find($id);

        $event->update([
            'views' => $event->views + 1,
        ]);

        $event = $this->volunteeringPresenter->present($event);

        return $this->presenter->present($event, __('Successfully got data'), Response::HTTP_OK);
    }

    /**
     * @param string $id
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function participate(string $id): JsonResponse
    {
        $this->validateVolunteeringId($id);

        $event = Volunteering::find($id);

        VolunteeringUser::create([
            'volunteering_id' => $event->id,
            'user_id' => getUser()->id,
        ]);

        $user = getUser();
        $user->update([
            'participant_points' => $user->participant_points + 50
        ]);

        $event = $this->volunteeringPresenter->present($event);

        return $this->presenter->present($event, __('Successfully got data'), Response::HTTP_OK);
    }
}

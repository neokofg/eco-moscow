<?php

namespace App\Controllers\Rest\V1\Competition;

use App\Controllers\Controller;
use App\Models\Competition;
use App\Models\CompetitionUser;
use App\Presenters\CompetitionPresenter;
use App\Requests\Rest\V1\Competition\IndexRequest;
use App\Requests\Rest\V1\Competition\StoreRequest;
use App\Traits\ValidateIdTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class CompetitionController extends Controller
{
    use ValidateIdTrait;
    public function __construct(
        private CompetitionPresenter $competitionPresenter
    )
    {
        parent::__construct();
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $event = Competition::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'image_url' => $validated['image_url'],
            'user_id' => getUser()->id,
        ]);

        $event = $this->competitionPresenter->present($event);

        return $this->presenter->present($event, __('Successfully created event'), Response::HTTP_CREATED);
    }

    public function index(IndexRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $events = Competition::query();

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

        $events = $this->competitionPresenter->presentIndex($events);

        return $this->presenter->present($events, __('Successfully got data'), Response::HTTP_OK);
    }

    public function get(string $id): JsonResponse
    {
        $this->validateCompetitionId($id);

        $event = Competition::find($id);

        $event = $this->competitionPresenter->present($event);

        return $this->presenter->present($event, __('Successfully got data'), Response::HTTP_OK);
    }

    public function participate(string $id): JsonResponse
    {
        $this->validateCompetitionId($id);

        $event = Competition::find($id);

        CompetitionUser::create([
            'competition_id' => $event->id,
            'user_id' => getUser()->id,
        ]);

        $event = $this->competitionPresenter->present($event);

        return $this->presenter->present($event, __('Successfully got data'), Response::HTTP_OK);
    }
}

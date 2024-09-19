<?php

namespace App\Controllers;

use App\Models\EventsDb\Competition;
use App\Models\EventsDb\Event;
use App\Models\EventsDb\Marathon;
use App\Models\EventsDb\Promotion;
use App\Models\EventsDb\Volunteering;
use App\Models\UserModeration;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

final readonly class DashboardController
{
    public function view()
    {
        return Inertia::render('Dashboard/mainPage');
    }

    public function viewEvents()
    {
        $data = [
            'total_events' => Event::count(),
            'total_competitions' => Competition::count(),
            'total_marathons' => Marathon::count(),
            'total_promotions' => Promotion::count(),
            'total_volunteering' => Volunteering::count(),
        ];

        // Функция для получения тренда по модели
        $getTrend = function ($model) {
            return $model::select(
                DB::raw("EXTRACT(YEAR FROM created_at) AS year"),
                DB::raw("EXTRACT(MONTH FROM created_at) AS month"),
                DB::raw('COUNT(*) AS total')
            )
                ->groupBy('year', 'month')
                ->orderBy('year')
                ->orderBy('month')
                ->get();
        };

        // Функция для получения распределения по категориям
        $getByCategory = function ($model) {
            return $model::select('category_id', DB::raw('COUNT(*) AS total'))
                ->groupBy('category_id')
                ->get();
        };

        // Получение трендов
        $data['events_trend'] = $getTrend(Event::class);
        $data['competitions_trend'] = $getTrend(Competition::class);
        $data['marathons_trend'] = $getTrend(Marathon::class);
        $data['promotions_trend'] = $getTrend(Promotion::class);
        $data['volunteering_trend'] = $getTrend(Volunteering::class);

        // Получение распределения по категориям
        $data['events_by_category'] = $getByCategory(Event::class);
        $data['competitions_by_category'] = $getByCategory(Competition::class);
        $data['marathons_by_category'] = $getByCategory(Marathon::class);
        $data['promotions_by_category'] = $getByCategory(Promotion::class);
        $data['volunteering_by_category'] = $getByCategory(Volunteering::class);
        return Inertia::render('Events/eventsPage', ['stats' => $data]);
    }

    public function viewUsers()
    {
        $userModerations = UserModeration::with(['user'])->get();
        return Inertia::render('Accounts/accountsPage', ['accounts' => $userModerations]);
    }
}

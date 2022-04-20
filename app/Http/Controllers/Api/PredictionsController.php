<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\LeagueInterface;
use App\Repositories\Interfaces\WeekInterface;
use App\Services\PredictionsService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class PredictionsController extends Controller
{
    private LeagueInterface $league;

    private WeekInterface $week;

    public function __construct(LeagueInterface $league, WeekInterface $week)
    {
        $this->league = $league;
        $this->week = $week;
    }

    public function __invoke(PredictionsService $service): JsonResponse
    {
        $league = $this->league->all(['team']);

        try {
            $this->week->getUpcomingWeek();
        } catch (ModelNotFoundException $e) {
            // League is over
            $leaderboard = [];
            foreach ($league as $key => $team) {
                $leaderboard[$team->team->name] = ($key == 0 ? 100 : 0);
            }
            arsort($leaderboard, SORT_NUMERIC);

            return response()->json([
                'predictions' => $leaderboard
            ]);
        }

        return response()->json([
            'predictions' => $service->predict($league)
        ]);
    }
}

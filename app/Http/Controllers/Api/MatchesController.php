<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MatchResourceCollection;
use App\Repositories\Interfaces\MatchInterface;
use App\Repositories\Interfaces\WeekInterface;
use App\Services\LeagueService;
use App\Services\MatchmakingService;
use App\Traits\Matches;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MatchesController extends Controller
{
    use Matches;

    private MatchInterface $match;

    private WeekInterface $week;

    public function __construct(MatchInterface $match, WeekInterface $week)
    {
        $this->match = $match;
        $this->week = $week;
    }

    public function index($week): MatchResourceCollection
    {
        $matches = $this->match->allByWeek($week, ['firstTeam', 'secondTeam']);

        return new MatchResourceCollection($matches);
    }

    public function play(MatchmakingService $matchmakingService, LeagueService $leagueService): JsonResponse
    {
        try {
            $week = $this->week->getUpcomingWeek();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'League weeks are over!'], 400);
        }

        $this->playMatches($week, $matchmakingService, $leagueService);

        return response()->json(['week' => $week]);
    }

    public function playAll(MatchmakingService $matchmakingService, LeagueService $leagueService): JsonResponse
    {
        $weeks = $this->week->getUpcomingWeeks();

        $results = [];
        foreach ($weeks as $week) {
            $results[$week->number] = $this->playMatches($week, $matchmakingService, $leagueService);
        }

        return response()->json([
            'week' => $this->week->getCurrentWeek(),
            'matches' => $results,
        ]);
    }
}

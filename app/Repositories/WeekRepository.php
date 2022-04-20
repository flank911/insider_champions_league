<?php


namespace App\Repositories;


use App\Models\League;
use App\Models\Matches;
use App\Models\Week;
use App\Repositories\Interfaces\LeagueInterface;
use App\Repositories\Interfaces\MatchInterface;
use App\Repositories\Interfaces\WeekInterface;

class WeekRepository implements WeekInterface
{
    private Week $week;

    public function __construct(Week $week)
    {
        $this->week = $week;
    }

    public function setPlayed(int $week)
    {
        return $this->week->where('id', $week)->setPlayed();
    }

    public function getUpcomingWeek()
    {
        return $this->week
            ->notPlayed()
            ->orderBy('number')
            ->firstOrFail();
    }

    public function getCurrentWeek()
    {
        return $this->week
            ->played()
            ->orderBy('number', 'desc')
            ->first();
    }

    public function getUpcomingWeeks()
    {
        return $this->week
            ->notPlayed()
            ->orderBy('number')
            ->get();
    }
}

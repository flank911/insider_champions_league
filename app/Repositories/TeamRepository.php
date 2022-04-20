<?php


namespace App\Repositories;


use App\Models\Team;
use App\Repositories\Interfaces\TeamInterface;

class TeamRepository implements TeamInterface
{
    private Team $team;

    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function find(int $team_id)
    {
        return $this->team->find($team_id);
    }

    public function getTeamsIds()
    {
        return $this->team
            ->select('id')
            ->get()
            ->pluck('id')
            ->toArray();
    }
}

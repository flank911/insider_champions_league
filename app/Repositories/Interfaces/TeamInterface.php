<?php


namespace App\Repositories\Interfaces;


interface TeamInterface
{
    public function find(int $team_id);

    public function getTeamsIds();
}

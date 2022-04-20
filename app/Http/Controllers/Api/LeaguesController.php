<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LeagueResourceCollection;
use App\Repositories\Interfaces\LeagueInterface;
use Illuminate\Http\Request;

class LeaguesController extends Controller
{
    private LeagueInterface $league;

    public function __construct(LeagueInterface $league)
    {
        $this->league = $league;
    }

    public function index(Request $request): LeagueResourceCollection
    {
        $leagues = $this->league->all(['team']);
        return new LeagueResourceCollection($leagues);
    }
}

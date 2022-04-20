<?php

namespace App\Providers;

use App\Repositories\Interfaces\LeagueInterface;
use App\Repositories\Interfaces\MatchInterface;
use App\Repositories\Interfaces\TeamInterface;
use App\Repositories\Interfaces\WeekInterface;
use App\Repositories\LeagueRepository;
use App\Repositories\MatchRepository;
use App\Repositories\TeamRepository;
use App\Repositories\WeekRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LeagueInterface::class, LeagueRepository::class);
        $this->app->bind(MatchInterface::class, MatchRepository::class);
        $this->app->bind(WeekInterface::class, WeekRepository::class);
        $this->app->bind(TeamInterface::class, TeamRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

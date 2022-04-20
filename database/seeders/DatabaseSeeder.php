<?php

namespace Database\Seeders;

use App\Models\League;
use App\Models\Team;
use App\Models\Week;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'id' => 1,
                'name' => 'Liverpool',
                'img' => 'https://resources.premierleague.com/premierleague/badges/25/t14.png',
                'strength' => 73,
            ],
            [
                'id' => 2,
                'name' => 'Manchester City',
                'img' => 'https://resources.premierleague.com/premierleague/badges/25/t43.png',
                'strength' => 74,
            ],
            [
                'id' => 3,
                'name' => 'Chelsea',
                'img' => 'https://resources.premierleague.com/premierleague/badges/25/t8.png',
                'strength' => 62,
            ],
            [
                'id' => 4,
                'name' => 'Arsenal',
                'img' => 'https://resources.premierleague.com/premierleague/badges/25/t3.png',
                'strength' => 54,
            ],
        ];
        Team::insert($teams);

        $weeks = [];
        for ($i = 1; $i <= ((count($teams) - 1) * 2); $i++) {
            $weeks[] = [
                'number' => $i,
                'played' => 0,
                'season' => date('Y', strtotime('-1 year')) . '/' . date('y'),
            ];
        }
        Week::insert($weeks);

        $league = [];
        foreach ($teams as $team) {
            $league[] = ['team_id' => $team['id']];
        }
        League::insert($league);
    }
}

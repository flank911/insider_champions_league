<?php

namespace App\Console\Commands;

use App\Models\League;
use App\Models\Matches;
use App\Models\Team;
use App\Models\Week;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class RefreshData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh data in database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Schema::disableForeignKeyConstraints();
        League::truncate();
        Matches::truncate();
        Team::truncate();
        Week::truncate();
        Schema::enableForeignKeyConstraints();

        Artisan::call('db:seed');

        $this->info('Now data is refreshed');

        return 0;
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained();
            $table->tinyInteger('points')->default(0);
            $table->tinyInteger('played')->default(0);
            $table->tinyInteger('won')->default(0);
            $table->tinyInteger('lost')->default(0);
            $table->tinyInteger('draw')->default(0);
            $table->tinyInteger('goal_difference')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leagues');
    }
}

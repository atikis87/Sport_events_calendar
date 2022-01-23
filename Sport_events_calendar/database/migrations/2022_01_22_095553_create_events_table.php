<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('events', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('home_team_id');
            $table->foreignId('away_team_id'); 
            $table->foreignId('primary_category_id');       
            $table->datetime('start_time');

            $table->foreign('home_team_id','home_foreign')->references('id')->on('teams');
            $table->foreign('away_team_id','away_foreign')->references('id')->on('teams');
            $table->foreign('primary_category_id','primary_foreign')->references('id')->on('primary_categories');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('teams', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('primary_category_id');
            $table->string('display_name', 50);

            $table->foreign('primary_category_id', 'p_cat_foreign')->references('id')->on('primary_categories');
            /*
            ->onDelete('cascade');
            */



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}

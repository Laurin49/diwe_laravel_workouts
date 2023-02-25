<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('workout_id')->unsigned();
            $table->integer('exercise_id')->unsigned();
            $table->smallInteger('satz');
            $table->smallInteger('wdh');
            $table->float('gewicht', 6, 2);
            $table->foreign('workout_id')->references('id')->on('workouts');
            $table->foreign('exercise_id')->references('id')->on('exercises');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_items');
    }
};

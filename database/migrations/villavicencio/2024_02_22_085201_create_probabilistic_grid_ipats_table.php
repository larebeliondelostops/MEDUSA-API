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
        Schema::create('probabilistic_grid_ipats', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->json('coordinates')->nullable();
            //caidad de ocupante
            $table->float('actual_state_fall_occupant', 6, 6);
            $table->float('future_state_fall_occupant', 6, 6);
            //choque
            $table->float('actual_state_crash', 6, 6);
            $table->float('future_state_crash', 6, 6);
            //atropello
            $table->float('actual_state_run_over', 6, 6);
            $table->float('future_state_run_over', 6, 6);
            //volcamiento
            $table->float('actual_state_overturn', 6, 6);
            $table->float('future_state_overturn', 6, 6);
            //otro
            $table->float('actual_state_other', 6, 6);
            $table->float('future_state_other', 6, 6);
            $table->float('actual_state_accidents', 6, 6);
            $table->float('future_state_accidents', 6, 6);
            $table->float('actual_state_average', 6, 6)->nullable();
            $table->float('future_state_average', 6, 6)->nullable();
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
        Schema::dropIfExists('probabilistic_grid_ipats');
    }
};

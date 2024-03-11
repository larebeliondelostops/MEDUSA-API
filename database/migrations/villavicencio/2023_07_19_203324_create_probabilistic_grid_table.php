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
        Schema::create('probabilistic_grid', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->float('actual_state_personal_injuries', 6, 6)->nullable();
            $table->float('future_state_personal_injuries', 6, 6)->nullable();
            $table->float('actual_state_theft_residences', 6, 6)->nullable();
            $table->float('future_state_theft_residences', 6, 6)->nullable();
            $table->float('actual_state_theft_commerce', 6, 6)->nullable();
            $table->float('future_state_theft_commerce', 6, 6)->nullable();
            $table->float('actual_state_theft_automotive', 6, 6)->nullable();
            $table->float('future_state_theft_automotive', 6, 6)->nullable();
            $table->float('future_state_theft_motorcycles', 6, 6)->nullable();
            $table->float('actual_state_theft_motorcycles', 6, 6)->nullable();
            $table->float('actual_state_theft_financial_entities', 6, 6)->nullable();
            $table->float('future_state_theft_financial_entities', 6, 6)->nullable();
            $table->float('actual_state_homicide', 6, 6)->nullable();
            $table->float('future_state_homicide', 6, 6)->nullable();
            $table->float('actual_state_kidnapping', 6, 6)->nullable();
            $table->float('future_state_kidnapping', 6, 6)->nullable();
            $table->float('actual_state_extortion', 6, 6)->nullable();
            $table->float('future_state_extortion', 6, 6)->nullable();
            $table->float('actual_state_terrorism', 6, 6)->nullable();
            $table->float('future_state_terrorism', 6, 6)->nullable();
            $table->float('actual_state_average', 6, 6)->nullable();
            $table->float('future_state_average', 6, 6)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('probabilistic_grid');
    }
};

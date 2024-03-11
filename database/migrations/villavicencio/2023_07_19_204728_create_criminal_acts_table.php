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
        Schema::create('criminal_acts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('indicator_id')->unsigned();
            $table->foreign('indicator_id')->references('id')->on('indicators');
            $table->bigInteger('probabilistic_grid_id');
            $table->foreign('probabilistic_grid_id')->references('id')->on('probabilistic_grid');
            $table->string('head')->nullable();
            $table->string('district')->nullable();
            $table->string('station')->nullable();
            $table->string('cai')->nullable();
            $table->string('quadrant')->nullable();
            $table->string('neighborhood')->nullable();
            $table->integer('number')->nullable();
            $table->string('address')->nullable();
            $table->string('site')->nullable();
            $table->string('month')->nullable();
            $table->string('week')->nullable();
            $table->date('date')->nullable();
            $table->string('day')->nullable();
            $table->time('time')->nullable();
            $table->integer('hour_24')->nullable();
            $table->string('crime')->nullable();
            $table->string('conduct')->nullable();
            $table->string('modality')->nullable();
            $table->string('description')->nullable();
            $table->string('asset_class')->nullable();
            $table->string('model')->nullable();
            $table->string('zone')->nullable();
            $table->string('unique_number')->nullable();
            $table->integer('quantity_2')->nullable();
            $table->string('plate')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('criminal_acts', function (Blueprint $table) {
            $table->dropForeign(['indicator_id']);
            $table->dropForeign(['probabilistic_grid_id']);
        });
        Schema::dropIfExists('criminal_acts');
    }
};

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
        Schema::create('data_ditra', function (Blueprint $table) {
            $table->id();
            $table->integer('year')->nullable();
            $table->string('uuid')->nullable();
            $table->dateTime('occurrence_date')->nullable();
            $table->string('month')->nullable();
            $table->string('day')->nullable();
            $table->time('hour')->nullable();
            $table->string('hour_range')->nullable();
            $table->string('sectional')->nullable();
            $table->string('coordinates')->nullable();
            $table->string('assigned')->nullable();
            $table->bigInteger('identification')->nullable();
            $table->string('grade')->nullable();
            $table->string('names')->nullable();
            $table->string('last_names')->nullable();
            $table->integer('age')->nullable();
            $table->string('age_range')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('intoxication')->nullable();
            $table->string('responsibility')->nullable();
            $table->string('plate')->nullable();
            $table->string('vehicle_class')->nullable();
            $table->string('model')->nullable();
            $table->string('cc')->nullable();
            $table->string('service_class')->nullable();
            $table->string('insurance')->nullable();
            $table->string('inspection')->nullable();
            $table->string('license')->nullable();
            $table->string('type')->nullable();
            //campo relacionado con el id de la tabla indicator
            $table->bigInteger('indicator');
            $table->foreign('indicator')->references('id')->on('indicators');
            $table->text('hypothesis')->nullable();
            $table->text('possible_occurrence')->nullable();
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
        Schema::dropIfExists('data_ditra');
    }
};
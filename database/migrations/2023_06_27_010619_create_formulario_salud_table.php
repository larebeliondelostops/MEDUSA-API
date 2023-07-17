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
        Schema::create('health', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idEntities');
            $table->foreign('idEntities')->references('id')->on('entities');
            $table->integer('emergencyPatients');
            $table->integer('emergencyBedsAvailable');
            $table->integer('availableOperatingRooms');
            $table->integer('intensiveCareUnitAvailable');
            $table->integer('firstLevelBeds');
            $table->integer('secondLevelBeds');
            $table->integer('thirdLevelBeds');
            $table->boolean('bloodBank');
            $table->integer('doctorsInTheShift');
            $table->integer('nursesInTheShift');
            $table->string('affiliatedIps');
            $table->integer('numberOfEmergenciesDay');
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
        Schema::dropIfExists('Health');
    }
};

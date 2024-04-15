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
            $table->uuid('uuid')->unique();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->integer('emergency_patients')->nullable();
            $table->integer('emergency_beds_available')->nullable();
            $table->integer('available_operating_rooms')->nullable();
            $table->integer('intensive_care_unit_available')->nullable();
            $table->integer('first_level_beds')->nullable();
            $table->integer('second_level_beds')->nullable();
            $table->integer('third_level_beds')->nullable();
            $table->boolean('blood_bank')->nullable();
            $table->integer('doctors_in_the_shift')->nullable();
            $table->integer('nurses_in_the_shift')->nullable();
            $table->string('affiliated_ips')->nullable();
            $table->integer('number_of_emergencies_day')->nullable();
            $table->timestamps();

            $table->index('uuid');
        });
    }

    public function down()
    {
        Schema::dropIfExists('health');
    }
};

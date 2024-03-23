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
<<<<<<< HEAD:database/migrations/ditra/2023_07_19_204523_create_indicators_table.php
        Schema::create('indicators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
=======
        Schema::create('milestone_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
>>>>>>> viper-develop:database/migrations/villavicencio/2024_01_27_144625_create_milestone_classes_table.php
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
<<<<<<< HEAD:database/migrations/ditra/2023_07_19_204523_create_indicators_table.php
        Schema::dropIfExists('indicators');
=======
        Schema::dropIfExists('milestone_class');
>>>>>>> viper-develop:database/migrations/villavicencio/2024_01_27_144625_create_milestone_classes_table.php
    }
};

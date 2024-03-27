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
        Schema::create('digital_zones', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();

            $table->index('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('digital_zones');
    }
};

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
        Schema::create('ipats', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('id_agent')->nullable();
            $table->string('id_ipat')->nullable();
            $table->string('injured')->nullable();
            $table->string('victims')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->date('date_ipat')->nullable();
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
        Schema::dropIfExists('ipats');
    }
};

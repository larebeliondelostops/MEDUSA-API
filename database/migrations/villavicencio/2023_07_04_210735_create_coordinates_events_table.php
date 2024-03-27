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
        Schema::create('coordinates_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->foreign('event_id')->references('id')->on('events');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('coordinates_events', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
        });
        Schema::dropIfExists('coordinates_events');
    }
};

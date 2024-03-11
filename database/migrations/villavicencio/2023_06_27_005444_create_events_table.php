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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->bigInteger('event_type_id')->unsigned();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('capacity');
            $table->string('place');
            $table->string('authorizing_entity');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->timestamps();
            $table->index('uuid');
            $table->foreign('event_type_id')->references('id')->on('events_type');
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['event_type_id']);
        });

        Schema::dropIfExists('events');
    }
};

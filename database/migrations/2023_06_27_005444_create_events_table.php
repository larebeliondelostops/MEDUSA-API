<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Connection name.
     *
     * @return string
     */
    protected $connection = 'villavicencio';

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
            $table->bigInteger('idEventType')->unsigned();
            $table->string('name');
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('capacity');
            $table->string('place');
            $table->string('authorizingEntity');
            $table->timestamps();

            $table->index('uuid');
            $table->foreign('idEventType')->references('id')->on('eventsType');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            // Eliminar la clave foránea 'idEventType'
            $table->dropForeign(['idEventType']);
        });

        Schema::dropIfExists('events');
    }
};

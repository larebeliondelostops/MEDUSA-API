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
        Schema::create('mobile_devices', function (Blueprint $table) {
            $table->id();
            //nombre de usuario
            //id user
            $table->bigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('device_token')->unique();
            $table->string('position')->nullable();
            $table->boolean('is_active_position')->default(true);
            //boleano para saber si el dispositivo quiere o no recibir notificaciones
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('mobile_devices');
    }
};

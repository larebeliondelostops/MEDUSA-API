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
        Schema::create('control_panel', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('stage_control_id');
            $table->timestamps();
        
            $table->foreign('stage_control_id')->references('id')->on('stage_control')->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['name', 'stage_control_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_panel');
    }
};
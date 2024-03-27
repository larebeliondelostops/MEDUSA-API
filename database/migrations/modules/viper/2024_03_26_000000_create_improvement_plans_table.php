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
        Schema::create('improvement_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('description');
            $table->unsignedBigInteger('alert_id')->unique(); 
            $table->timestamps();
        
            $table->foreign('alert_id')->references('id')->on('alerts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('improvement_plans');
    }
};

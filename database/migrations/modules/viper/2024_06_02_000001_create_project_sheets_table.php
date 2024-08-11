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
        Schema::create('project_sheets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique();
            $table->string('location', 255);
            $table->unsignedBigInteger('phase_id');
            
            $table->timestamps();
        
            $table->foreign('phase_id')->references('id')->on('phases')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_sheets');
    }
};
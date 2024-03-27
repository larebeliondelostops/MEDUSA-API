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
        Schema::create('project_user_role', function (Blueprint $table) {
            $table->id();
            $table->string('project_id',255);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('rol_id'); 
            $table->timestamps();
        
            $table->foreign('project_id')->references('bpin')->on('projects')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_user_role');
    }
};

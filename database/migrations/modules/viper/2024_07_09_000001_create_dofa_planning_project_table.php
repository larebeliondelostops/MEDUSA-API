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
        Schema::create('dofa_planning_project', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->string('responsible')->nullable();
            $table->boolean('verification')->default(false);
            $table->unsignedBigInteger('dofa_planning_id');
            $table->string('project_id',255);
            $table->timestamps();
        
            $table->foreign('dofa_planning_id')->references('id')->on('dofa_planning')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('project_id')->references('bpin')->on('projects')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['dofa_planning_id', 'project_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dofa_planning_project');
    }
};
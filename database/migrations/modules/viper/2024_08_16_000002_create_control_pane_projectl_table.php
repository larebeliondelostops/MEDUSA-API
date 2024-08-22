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
        Schema::create('control_panel_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('control_panel_id');
            $table->string('project_id',255);
            $table->text('description')->nullable();
            $table->timestamps();
        
            $table->foreign('control_panel_id')->references('id')->on('control_panel')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('project_id')->references('bpin')->on('projects')->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['control_panel_id', 'project_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('control_panel_project');
    }
};
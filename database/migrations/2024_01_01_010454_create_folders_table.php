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
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('stage_id');
            $table->string('project_id', 255);
            $table->unsignedBigInteger('higher_folder_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('project_id')->references('bpin')->on('projects')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('higher_folder_id')->references('id')->on('folders')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('folders');
    }
};

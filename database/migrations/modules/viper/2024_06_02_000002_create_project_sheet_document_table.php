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
        Schema::create('project_sheet_document', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_sheet_id');
            $table->unsignedBigInteger('document_id')->nullable();
            $table->string('project_id', 255);
            $table->timestamps();
        
            $table->foreign('project_sheet_id')->references('id')->on('project_sheets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('project_id')->references('bpin')->on('projects')->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['project_sheet_id', 'project_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_sheet_document');
    }
};
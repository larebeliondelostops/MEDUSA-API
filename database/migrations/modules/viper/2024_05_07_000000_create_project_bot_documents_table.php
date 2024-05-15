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
        Schema::create('project_bot_documents', function (Blueprint $table) {
            $table->id();
            $table->string('project_id', 255);
            $table->unsignedBigInteger('document_id');
            $table->timestamps();
        
            $table->foreign('project_id')->references('bpin')->on('projects')->onDelete('cascade');
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_bot_documents');
    }
};

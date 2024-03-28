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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('url', 255);
            $table->unsignedBigInteger('responsible')->nullable();
            $table->unsignedBigInteger('folder_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('responsible')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
};

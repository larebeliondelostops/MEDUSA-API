<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Connection name.
     *
     * @return string
     */
    protected $connection = 'villavicencio';
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folder_relationships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('higher_folder');
            $table->unsignedBigInteger('lower_folder');
            $table->timestamps();

            $table->foreign('higher_folder')->references('id')->on('folders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('lower_folder')->references('id')->on('folders')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('folder_relationships');
    }
};

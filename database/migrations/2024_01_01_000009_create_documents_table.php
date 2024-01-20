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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('url', 255);
            $table->string('responsible', 100);
            $table->unsignedBigInteger('folder_id');
            $table->timestamps();
            $table->softDeletes();
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

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
        Schema::create('precedences', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('delay_time');
            $table->unsignedBigInteger('higher_id');
            $table->unsignedBigInteger('lower_id');
            
            $table->foreign('higher_id')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('lower_id')->references('id')->on('activities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('precedences');
    }
};

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
        Schema::create('progresses', function (Blueprint $table) {
            $table->id();
            $table->integer('week');
            $table->text('activity_completed')->nullable();
            $table->text('observations')->nullable(); 
            $table->text('summary')->nullable(); 
            $table->text('conclusions')->nullable(); 
            $table->text('recommendations')->nullable();
            $table->decimal('planned_physical_progress', 8, 2);
            $table->decimal('actual_physical_progress', 8, 2); 
            $table->decimal('financial_progress_on_site', 15, 2); 
            $table->decimal('billed_financial_progress', 15, 2); 
            $table->unsignedBigInteger('activity_id');
            $table->timestamps();
        
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade')->onUpdate('cascade');

            $table->unique(['week','activity_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progresses');
    }
};
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
        Schema::create('projects', function (Blueprint $table) {
            $table->string('bpin', 255)->primary();
            $table->string('name', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('substate', 100)->nullable();
            $table->integer('total_value')->nullable();
            $table->integer('requested_value')->nullable();
            $table->integer('executed_value')->nullable();
            $table->integer('physical_progress')->nullable();
            $table->integer('financial_advance')->nullable();
            $table->string('beneficiaries', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};

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
            $table->string('name', 100);
            $table->string('ocad', 100);
            $table->string('type', 100);
            $table->string('state', 100);
            $table->string('substate', 100);
            $table->integer('total_value');
            $table->integer('requested_value');
            $table->integer('executed_value');
            $table->integer('physical_progress');
            $table->integer('responsible_entity');
            $table->string('sector', 255);
            $table->string('location', 255);
            $table->string('beneficiaries', 255);
            $table->string('planner', 255);
            $table->date('execution_approval_date');
            $table->date('completion_date');
            $table->string('reporting_frequency', 255);
            $table->string('general_objective', 255);
            $table->string('responsible', 255);
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
        Schema::dropIfExists('projects');
    }
};

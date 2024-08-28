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
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('type');
            $table->tinyInteger('severity_id');
            $table->boolean('is_read')->default(false); 
            $table->text('description');
            $table->unsignedBigInteger('indicator_id')->nullable();
            $table->string('project_id',255);
            $table->unsignedBigInteger('improvement_plan_id')->nullable();
            $table->string('user_email'); 
            $table->string('related_item_type', 40)->nullable();
            $table->unsignedBigInteger('related_item_id')->nullable();

            $table->foreign('related_item_type')->on('id')->references('viper_items')->onDelete('cascade');
            $table->foreign('severity_id')->references('id')->on('alert_severities')->onDelete('cascade');
            $table->foreign('indicator_id')->references('id')->on('indicators_viper')->onDelete('cascade');
            $table->foreign('project_id')->references('bpin')->on('projects')->onDelete('cascade');
            $table->foreign('improvement_plan_id')->references('id')->on('improvement_plans')->onDelete('cascade');
            $table->foreign('user_email')->references('email')->on('users')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::dropIfExists('alerts');
    }
};

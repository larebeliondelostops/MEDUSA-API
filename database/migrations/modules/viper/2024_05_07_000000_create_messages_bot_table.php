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
        Schema::create('messages_bot', function (Blueprint $table) {
            $table->id();
            $table->string('query',255);
            $table->text('response');
            $table->string('files',255);
            $table->unsignedBigInteger('project_user_role_id');
            $table->timestamps();
        
            $table->foreign('project_user_role_id')->references('id')->on('project_user_role')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages_bot');
    }
};

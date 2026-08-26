<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('incident')) {
            return;
        }

        Schema::create('incident', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('indicator');
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('day')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->boolean('reviewed')->default(false);
            $table->timestamps();

            $table->foreign('indicator')
                ->references('id')
                ->on('indicators');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incident');
    }
};

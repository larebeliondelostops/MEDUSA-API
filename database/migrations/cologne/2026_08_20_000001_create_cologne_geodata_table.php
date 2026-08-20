<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('cologne_geodata')) {
            return;
        }

        Schema::create('cologne_geodata', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('dataset', 64);
            $table->string('source_key', 191);
            $table->string('source_hash', 64);
            $table->string('name')->nullable();
            $table->string('geometry_type', 32);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->json('geometry')->nullable();
            $table->json('properties')->nullable();
            $table->string('source_crs', 32)->nullable();
            $table->timestamps();

            $table->unique(['dataset', 'source_key']);
            $table->index(['dataset', 'geometry_type']);
        });
    }

    public function down(): void
    {
        // Los datos geograficos importados se conservan intencionalmente.
        // Su eliminacion requiere una operacion explicita fuera de migrate/rollback.
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('modules')) {
            $addSlug = ! Schema::hasColumn('modules', 'slug');
            $addNamespace = ! Schema::hasColumn('modules', 'namespace');

            if ($addSlug || $addNamespace) {
                Schema::table('modules', function (Blueprint $table) use ($addSlug, $addNamespace) {
                    if ($addSlug) {
                        $table->integer('slug')->nullable()->after('description');
                    }

                    if ($addNamespace) {
                        $table->string('namespace')->nullable()->after('slug');
                    }
                });
            }

            if ($addSlug) {
                Schema::table('modules', function (Blueprint $table) {
                    $table->foreign('slug')->references('id')->on('slugs');
                });
            }
        }

        if (Schema::hasTable('fields') && ! Schema::hasColumn('fields', 'model_select')) {
            Schema::table('fields', function (Blueprint $table) {
                $table->string('model_select')->nullable()->after('schema');
            });
        }
    }

    public function down(): void
    {
        // Legacy databases may have created these columns outside migrations.
        // They are intentionally preserved on rollback.
    }
};

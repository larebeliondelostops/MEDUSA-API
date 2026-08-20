<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('indicators') || Schema::hasColumn('indicators', 'parent_indicator_id')) {
            return;
        }

        Schema::table('indicators', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_indicator_id')->nullable()->after('description');
            $table->foreign('parent_indicator_id')
                ->references('id')
                ->on('indicators')
                ->nullOnDelete();
        });
    }

    public function down()
    {
        if (! Schema::hasTable('indicators') || ! Schema::hasColumn('indicators', 'parent_indicator_id')) {
            return;
        }

        Schema::table('indicators', function (Blueprint $table) {
            $table->dropForeign(['parent_indicator_id']);
            $table->dropColumn('parent_indicator_id');
        });
    }
};

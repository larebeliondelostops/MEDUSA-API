<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuBarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Marcadores para villavicencio
         */
        DB::connection('villavicencio')->table('bar_menu')->insert([
            [
                'id' => 1,
                'type_marker' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'type_marker' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'type_marker' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'type_marker' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'type_marker' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'type_marker' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'type_marker' => 51,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'type_marker' => 52,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'type_marker' => 53,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'type_marker' => 54,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'type_marker' => 55,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /**
         * Marcadores para neiva
         */
        DB::connection('neiva')->table('bar_menu')->insert([
            [
                'id' => 1,
                'type_marker' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'type_marker' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'type_marker' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'type_marker' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'type_marker' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'type_marker' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'type_marker' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'type_marker' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'type_marker' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'type_marker' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'type_marker' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'type_marker' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'type_marker' => 51,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'type_marker' => 52,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'type_marker' => 53,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

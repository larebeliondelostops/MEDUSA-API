<?php

namespace Database\Seeders\villavicencio;

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
        DB::table('bar_menu')->insert([
            [
                'id' => 1,
                'marker' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'marker' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'marker' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'marker' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'marker' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'marker' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'marker' => 51,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'marker' => 52,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'marker' => 53,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'marker' => 54,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'marker' => 55,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Viper
            [
                'id' => 100,
                'marker' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

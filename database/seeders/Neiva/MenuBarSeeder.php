<?php

namespace Database\Seeders\Neiva;

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
         * Marcadores para neiva
         */
        DB::table('bar_menu')->insert([
            [
                'id' => 1,
                'marker' => 1,
                'enabled' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'marker' => 2,
                'enabled' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'marker' => 3,
                'enabled' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'marker' => 4,
                'enabled' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'marker' => 5,
                'enabled' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'marker' => 6,
                'enabled' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'marker' => 7,
                'enabled' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'marker' => 8,
                'enabled' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'marker' => 9,
                'enabled' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'marker' => 10,
                'enabled' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'marker' => 11,
                'enabled' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'marker' => 12,
                'enabled' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'marker' => 13,
                'enabled' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'marker' => 14,
                'enabled' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'marker' => 15,
                'enabled' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

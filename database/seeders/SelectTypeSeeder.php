<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SelectTypeSeeder extends Seeder
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
        DB::connection('villavicencio')->table('select_type')->insert([
            [
                'id' => 1,
                'type' => 'Input',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'type' => 'Input Number',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'type' => 'Input Email',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'type' => 'Select',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'type' => 'Checkbox',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        /**
         * Marcadores para neiva
         */
        DB::connection('neiva')->table('select_type')->insert([
            [
                'id' => 1,
                'type' => 'Input',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'type' => 'Input Number',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'type' => 'Input Email',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'type' => 'Select',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'type' => 'Checkbox',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'type' => 'Map Marker',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'type' => 'Map Polygon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'type' => 'Map Polyline',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

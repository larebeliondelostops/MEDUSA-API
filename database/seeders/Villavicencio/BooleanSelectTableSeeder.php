<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BooleanSelectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boolean_select')->insert([
            [
                'id' => 0,
                'value' => 'si',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 1,
                'value' => 'no',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

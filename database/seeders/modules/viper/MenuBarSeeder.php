<?php

namespace Database\Seeders\modules\viper;

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
                'id' => 100,
                'marker' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

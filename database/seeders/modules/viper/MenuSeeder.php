<?php

namespace Database\Seeders\Modules\Viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
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
        DB::table('menu')->insert([
            [
                'id' => 4,
                'name' => 'Viper',
                'path' => 'viper',
                'icon' => 'assured_workload',
                'slug' => 'viper',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

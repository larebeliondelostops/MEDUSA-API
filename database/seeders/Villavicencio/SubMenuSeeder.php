<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubMenuSeeder extends Seeder
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
        DB::table('sub_menu')->insert([
            [
                'sub_menu' => 1,
                'menu' => 5,
                'level' => 2,
                'identifier' => "5-1",
                'name' => 'Alarmas',
                'path' => 'markers/alarm',
                'icon' => 'notifications_active',
                'slug' => 'alarm',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sub_menu' => 2,
                'menu' => 5,
                'level' => 2,
                'identifier' => "5-2",
                'name' => 'Puestos de votación',
                'path' => 'markers/pollingPlace',
                'icon' => 'how_to_vote',
                'slug' => 'pollingPlace',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

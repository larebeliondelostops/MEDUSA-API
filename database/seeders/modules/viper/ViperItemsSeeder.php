<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViperItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('viper_items')->insert([
            ['name' => 'Activities'],
            ['name' => 'Deliverables'],
            ['name' => 'Documents']
        ]);
    }
}

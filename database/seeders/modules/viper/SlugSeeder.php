<?php


namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlugSeeder extends Seeder
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
        DB::table('slugs')->insert([
            [
                'id' => 1,
                'name' => 'Proyectos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

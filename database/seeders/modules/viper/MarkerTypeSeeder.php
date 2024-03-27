<?php


namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkerTypeSeeder extends Seeder
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
        DB::table('marker_type')->insert([
            [
                'id' => 1,
                'name' => 'Point',
                'description' => 'Todos los marcadores de tipo punto',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

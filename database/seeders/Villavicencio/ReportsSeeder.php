<?php


namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportsSeeder extends Seeder
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
        DB::table('reports')->insert([
            [
                'id' => 1,
                'slug' => 6,
                'name' => 'Incidentes',
                'description' => 'Incidentes Villavicencio',
                'namespace' => 'App\Strategies\StrategiesReports\Villavicencio\StrategyIncidentsReports',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'slug' => 7,
                'name' => 'Ipats',
                'description' => 'Incidentes automovilisticos',
                'namespace' => 'App\Strategies\StrategiesReports\Villavicencio\StrategyIpatsReports',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

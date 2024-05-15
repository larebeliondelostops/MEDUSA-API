<?php


namespace Database\Seeders\modules\viper;

use App\Models\Slug;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkersSeeder extends Seeder
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
        DB::table('marker')->insert([
            [
                'id' => 100,
                'marker_type' => 1,
                'name' => 'Proyectos',
                'icon' => 'location_on',
                'color' => 'blue',
                'slug' => Slug::where(['name' => 'Proyectos'])->first()->id,
                'namespace' => 'App\Strategies\StrategiesPoints\Viper\StrategyProjectMarker',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}

<?php

namespace Database\Seeders;

use Ramsey\Uuid\Uuid;
use App\Clases\SaveGeoJson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmbientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Marcadores para neiva
         */
        DB::connection('neiva')->table('ambient')->insert([
            [
                'id' => 1,
                'uuid' => Uuid::uuid4()->toString(),
                'name' => 'Estacion Alcaldia',
                'position' => SaveGeoJson::saveLikePoint(["type" => "Point", "coordinates" => [[-75.2894654206662, 2.928784311025512]]]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'uuid' => Uuid::uuid4()->toString(),
                'name' => 'Estacion Talleres Alcaldia',
                'position' => SaveGeoJson::saveLikePoint(["type" => "Point", "coordinates" => [[-75.29291833161336, 2.935833924226003]]]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

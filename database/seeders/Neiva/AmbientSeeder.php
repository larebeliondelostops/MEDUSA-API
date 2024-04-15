<?php

namespace Database\Seeders\Neiva;

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
        DB::table('ambient')->insert([
            [
                'id' => 1,
                'uuid' => Uuid::uuid4()->toString(),
                'name' => 'Estacion Alcaldia',
                'latitude' => '2.928784311025512',  
                'longitude' => '-75.2894654206662',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'uuid' => Uuid::uuid4()->toString(),
                'name' => 'Estacion Talleres Alcaldia',
                'latitude' => '2.935833924226003',
                'longitude' => '-75.29291833161336',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class MunicipalitySeeder extends Seeder
{
    public function run()
    {
        $coordinates = [
            "Villavicencio" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => 3.2219886587045397,
                "longitude" => -74.0877486836099,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            // Agrega nuevos municipios aquí
            "Acacías" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => 3.989037,
                "longitude" => -73.757978,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Granada" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => 3.546263,
                "longitude" => -73.706879,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            // Continúa agregando municipios...
        ];

        $municipalities = [
            [
                "name" => "Villavicencio",
                "coordinate_id" => $coordinates["Villavicencio"]['id'],
                "department_id" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            // Agrega los nuevos municipios aquí
            [
                "name" => "Acacías",
                "coordinate_id" => $coordinates["Acacías"]['id'],
                "department_id" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Granada",
                "coordinate_id" => $coordinates["Granada"]['id'],
                "department_id" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            // Continúa agregando municipios...
        ];

        // Primero se debe registrar la locación
        foreach ($coordinates as $coordinate) {
            DB::table('coordinates')->insert($coordinate);
        }

        foreach ($municipalities as $municipality) {
            DB::table('municipalities')->insert($municipality);
        }
    }
}

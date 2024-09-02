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
                "latitude" => '4.1249245',
                "longitude" => '-73.6916347',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Acacías" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '4.1064627',
                "longitude" => '-73.6455713',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Granada" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '4.1491741',
                "longitude" => '-73.6311278',
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        $municipalities = [
            [
                "name" => "Villavicencio",
                "coordinate_id" => $coordinates["Villavicencio"]['id'],
                "department_id" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
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
        
        // Municipios de Valle del Cauca

        $coordinates = [
            "Alcalá" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '4.6735178',
                "longitude" => '-76.7923353',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Restrepo" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '3.8217418',
                "longitude" => '-76.5389027',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Sevilla" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '4.2744204',
                "longitude" => '-75.9516467',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Versalles" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '4.5757333',
                "longitude" => '-76.2098421',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Yotoco" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '3.8602943',
                "longitude" => '-76.3949518',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Bugalagrande" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '4.2108723',
                "longitude" => '-76.1660697',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Pradera" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '3.4182079',
                "longitude" => '-76.2525957',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "La Cumbre" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '3.6494532',
                "longitude" => '-76.5731171',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Dagua" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '3.6585404',
                "longitude" => '-76.7011678',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Florida" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '3.323832',
                "longitude" => '-76.3062519',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Tuluá" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '4.0856667',
                "longitude" => '-76.1972779',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Vijes" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '3.7003997',
                "longitude" => '-76.4428876',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            
            // Continuar agregando municipios aquí...
        ];

        $municipalities = [
            [
                "name" => "Alcalá",
                "coordinate_id" => $coordinates["Alcalá"]['id'],
                "department_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Restrepo",
                "coordinate_id" => $coordinates["Restrepo"]['id'],
                "department_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Sevilla",
                "coordinate_id" => $coordinates["Sevilla"]['id'],
                "department_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Versalles",
                "coordinate_id" => $coordinates["Versalles"]['id'],
                "department_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Yotoco",
                "coordinate_id" => $coordinates["Yotoco"]['id'],
                "department_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Bugalagrande",
                "coordinate_id" => $coordinates["Bugalagrande"]['id'],
                "department_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Pradera",
                "coordinate_id" => $coordinates["Pradera"]['id'],
                "department_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "La Cumbre",
                "coordinate_id" => $coordinates["La Cumbre"]['id'],
                "department_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Dagua",
                "coordinate_id" => $coordinates["Dagua"]['id'],
                "department_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Florida",
                "coordinate_id" => $coordinates["Florida"]['id'],
                "department_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Tuluá",
                "coordinate_id" => $coordinates["Tuluá"]['id'],
                "department_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Vijes",
                "coordinate_id" => $coordinates["Vijes"]['id'],
                "department_id" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            // Continuar agregando municipios aquí...
        ];

        // Registrar las locaciones primero
        foreach ($coordinates as $coordinate) {
            DB::table('coordinates')->insert($coordinate);
        }

        foreach ($municipalities as $municipality) {
            DB::table('municipalities')->insert($municipality);
        }

        // Municipios de San Andres y Providencia
        $coordinates = [
            "San Andres" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '12.5767336',
                "longitude" => '-81.7257966',
                "created_at" => now(),
                "updated_at" => now(),
            ],
            "Providencia" => [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '13.3532573',
                "longitude" => '-81.413972',
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        $municipalities = [
            [
                "name" => "San Andrés",
                "coordinate_id" => $coordinates["San Andres"]['id'],
                "department_id" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Providencia",
                "coordinate_id" => $coordinates["Providencia"]['id'],
                "department_id" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        foreach ($coordinates as $coordinate) {
            DB::table('coordinates')->insert($coordinate);
        }

        foreach ($municipalities as $municipality) {
            DB::table('municipalities')->insert($municipality);
        }
    }
}

<?php

namespace Database\Seeders\modules\viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class DepartmentSeeder extends Seeder
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
        $coordinates = [
            "Meta" =>   [
                            "id" => Uuid::uuid4()->toString(),
                            "type" => "Point",
                            "latitude" => 3.2719886587045397,
                            "longitude" => -73.0877486836099,
                            "created_at" => now(),
                            "updated_at" => now(),
                        ],
        ];

        $deparments = [
            [
                "name" => "Meta",
                "coordinate_id" => $coordinates["Meta"]["id"],
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        //Primero se debe registrar la locacion
        foreach ($coordinates as $coordinate)
        DB::table('coordinates')->insert([
            $coordinate
        ]);

        foreach ($deparments as $deparment)
            DB::table('departments')->insert([
                $deparment
            ]);

        /**
         * Marcadores para Valle del Cauca
         */
        $coordinates = [
            "Valle del Cauca" =>   [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '4.0400707',
                "longitude" => '-77.9517134',
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        $departments = [
            [
                "name" => "Valle del Cauca",
                "coordinate_id" => $coordinates["Valle del Cauca"]["id"],
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        // Primero se debe registrar la locación
        foreach ($coordinates as $coordinate) {
            DB::table('coordinates')->insert([
                $coordinate
            ]);
        }

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                $department
            ]);
        }

        /**
         * Marcadores para San Andres y Providencia
         */
        $coordinates = [
            "San Andres y Providencia" =>   [
                "id" => Uuid::uuid4()->toString(),
                "type" => "Point",
                "latitude" => '12.9379259',
                "longitude" => '-82.2034544',
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        $departments = [
            [
                "name" => "San Andres y Providencia",
                "coordinate_id" => $coordinates["San Andres y Providencia"]["id"],
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        // Primero se debe registrar la locación
        foreach ($coordinates as $coordinate) {
            DB::table('coordinates')->insert([
                $coordinate
            ]);
        }

        foreach ($departments as $department) {
            DB::table('departments')->insert([
                $department
            ]);
        }
    }
}

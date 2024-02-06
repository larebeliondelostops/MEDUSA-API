<?php

namespace Database\Seeders\Viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class MunicipalitySeeder extends Seeder
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
            "Villavicencio" =>   [
                            "id" => Uuid::uuid4()->toString(),
                            "type" => "Point",
                            "latitude" => 3.2219886587045397,
                            "longitude" => -74.0877486836099,
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
        ];

        //Primero se debe registrar la locacion
        foreach ($coordinates as $coordinate)
        DB::connection('villavicencio')->table('coordinates')->insert([
            $coordinate
        ]);

        foreach ($municipalities as $municipality)
            DB::connection('villavicencio')->table('municipalities')->insert([
                $municipality
            ]);

    }
}

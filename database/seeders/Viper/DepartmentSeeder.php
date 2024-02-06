<?php

namespace Database\Seeders\Viper;

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
        DB::connection('villavicencio')->table('coordinates')->insert([
            $coordinate
        ]);

        foreach ($deparments as $deparment)
            DB::connection('villavicencio')->table('departments')->insert([
                $deparment
            ]);
    }
}

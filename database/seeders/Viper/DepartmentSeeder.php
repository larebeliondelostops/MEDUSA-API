<?php

namespace Database\Seeders\Viper;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::connection('villavicencio')->table('departments')->insert([
            [
                "name" => "Meta",
                "type_location" => "Point",
                "latitude" => 3.2719886587045397,
                "longitude" => -73.0877486836099,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}

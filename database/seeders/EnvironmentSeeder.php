<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::setDefaultConnection('neiva');

        $data = '        
        {
            "array": [
                {
                    "type": "Feature",
                    "markerType": 23,
                    "id": "b6141b0e-c775-49eb-a68d-17f56f057943",
                    "title": "Estacion Alcaldia",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928784311025512,
                            -75.2894654206662
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 23,
                    "id": "77d49508-4949-4b78-9081-b31ad442a540",
                    "title": "Estacion Talleres Alcaldia",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935833924226003,
                            -75.29291833161336
                        ]
                    }
                }
            ]
        }';
        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('environment')->insert([
                'name' => $Data['title'],
                'uuid'=> Str::uuid(),
                'position' => json_encode($Data['geometry'])
            ]);
        } 
    }
}

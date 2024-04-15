<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = '
        {
          "array":[
            {
              "id": 1,
              "name": "Point",
              "description": "Todos los marcadores de tipo punto",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 2,
              "name": "Polyline",
              "description": "Todos los marcadores de tipo linea",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 3,
              "name": "Polygon",
              "description": "Todos los marcadores de tipo poligono",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 4,
              "name": "Point And Polyline",
              "description": "Todos los marcadores de tipo punto y linea",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 5,
              "name": "Special",
              "description": "Todos los marcadores de tipo especial",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('marker_type')->insert([
                'id' => $Data['id'],
                'name' => $Data['name'],
                'description' => $Data['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
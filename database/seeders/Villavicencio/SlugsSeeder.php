<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlugsSeeder extends Seeder
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
              "slugs": 1,
              "id": 1,
              "name": "alarm",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 2,
              "id": 2,
              "name": "cai",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 4,
              "id": 4,
              "name": "pollingPlace",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 5,
              "id": 5,
              "name": "fiber",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 6,
              "id": 6,
              "name": "incident",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 8,
              "id": 8,
              "name": "trafficLight",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 9,
              "id": 10,
              "name": "user",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 10,
              "id": 50,
              "name": "camera",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 11,
              "id": 51,
              "name": "probabilisticModel",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 12,
              "id": 52,
              "name": "heatmap",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 13,
              "id": 53,
              "name": "traffic",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 14,
              "id": 54,
              "name": "movementUnity",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 15,
              "id": 55,
              "name": "event",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 7,
              "id": 7,
              "name": "ipat",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            },
            {
              "slugs": 3,
              "id": 3,
              "name": "health",
              "created_at": "2024-03-27 17:41:34",
              "updated_at": "2024-03-27 17:41:34"
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('slugs')->insert([
                'slugs' => $Data['slugs'],
                'id' => $Data['id'],
                'name' => $Data['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
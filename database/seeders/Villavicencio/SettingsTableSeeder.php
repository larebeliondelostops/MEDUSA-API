<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
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
              "id": 4,
              "key": "position",
              "value": "4.1396714980773,-73.626853407306",
              "created_at": "2024-03-14 09:15:22",
              "updated_at": "2024-03-14 09:15:22"
            },
            {
              "id": 1,
              "key": "main_zoom",
              "value": "14",
              "created_at": "2024-03-14 09:09:17",
              "updated_at": "2024-03-14 09:42:04"
            },
            {
              "id": 2,
              "key": "heatmap_density",
              "value": "50",
              "created_at": "2024-03-14 09:09:17",
              "updated_at": "2024-03-14 09:42:04"
            },
            {
              "id": 3,
              "key": "map_request",
              "value": "incidents, indicators, tomtom, waze",
              "created_at": "2024-03-14 09:09:17",
              "updated_at": "2024-03-14 12:30:47"
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('settings')->insert([
                'id' => $Data['id'],
                'key' => $Data['key'],
                'value' => $Data['value'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
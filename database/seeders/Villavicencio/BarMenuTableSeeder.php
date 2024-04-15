<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarMenuTableSeeder extends Seeder
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
              "marker": 1,
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 2,
              "marker": 2,
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 3,
              "marker": 3,
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 4,
              "marker": 4,
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 5,
              "marker": 5,
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 7,
              "marker": 51,
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 8,
              "marker": 52,
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 9,
              "marker": 53,
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 10,
              "marker": 54,
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 11,
              "marker": 55,
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 6,
              "marker": 50,
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 12,
              "marker": 7,
              "enabled": true,
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 13,
              "marker": 8,
              "enabled": true,
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 14,
              "marker": 57,
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('bar_menu')->insert([
                'id' => $Data['id'],
                'marker' => $Data['marker'],
                'enabled' => $Data['enabled'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
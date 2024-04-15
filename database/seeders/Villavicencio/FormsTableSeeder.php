<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormsTableSeeder extends Seeder
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
              "module": 1,
              "field": 1,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 2,
              "module": 1,
              "field": 2,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 3,
              "module": 1,
              "field": 3,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 4,
              "module": 1,
              "field": 4,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 5,
              "module": 1,
              "field": 5,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 9,
              "module": 7,
              "field": 1,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 10,
              "module": 7,
              "field": 4,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 11,
              "module": 7,
              "field": 6,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 12,
              "module": 7,
              "field": 7,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 13,
              "module": 7,
              "field": 8,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 14,
              "module": 7,
              "field": 9,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 15,
              "module": 7,
              "field": 10,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 19,
              "module": 2,
              "field": 14,
              "created_at": "2023-09-29 15:35:04",
              "updated_at": "2023-09-29 15:35:04"
            },
            {
              "id": 20,
              "module": 2,
              "field": 15,
              "created_at": "2023-09-29 15:35:04",
              "updated_at": "2023-09-29 15:35:04"
            },
            {
              "id": 21,
              "module": 2,
              "field": 16,
              "created_at": "2023-09-29 15:35:04",
              "updated_at": "2023-09-29 15:35:04"
            },
            {
              "id": 22,
              "module": 2,
              "field": 17,
              "created_at": "2023-09-29 15:35:04",
              "updated_at": "2023-09-29 15:35:04"
            },
            {
              "id": 24,
              "module": 2,
              "field": 13,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 23,
              "module": 2,
              "field": 12,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 25,
              "module": 2,
              "field": 4,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 26,
              "module": 2,
              "field": 1,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 27,
              "module": 3,
              "field": 1,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 28,
              "module": 3,
              "field": 4,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 29,
              "module": 3,
              "field": 6,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 30,
              "module": 3,
              "field": 18,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 31,
              "module": 3,
              "field": 19,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 32,
              "module": 3,
              "field": 20,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 33,
              "module": 3,
              "field": 21,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 34,
              "module": 3,
              "field": 22,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 35,
              "module": 3,
              "field": 23,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 36,
              "module": 3,
              "field": 24,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 37,
              "module": 3,
              "field": 25,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 38,
              "module": 3,
              "field": 26,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 39,
              "module": 3,
              "field": 27,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 40,
              "module": 3,
              "field": 28,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 41,
              "module": 3,
              "field": 29,
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 42,
              "module": 6,
              "field": 1,
              "created_at": "2024-03-05 16:08:15",
              "updated_at": "2024-03-05 16:08:15"
            },
            {
              "id": 43,
              "module": 6,
              "field": 4,
              "created_at": "2024-03-05 16:08:15",
              "updated_at": "2024-03-05 16:08:15"
            },
            {
              "id": 44,
              "module": 6,
              "field": 6,
              "created_at": "2024-03-05 16:08:15",
              "updated_at": "2024-03-05 16:08:15"
            },
            {
              "id": 45,
              "module": 8,
              "field": 31,
              "created_at": "2024-03-06 17:37:32",
              "updated_at": "2024-03-06 17:37:32"
            },
            {
              "id": 46,
              "module": 8,
              "field": 32,
              "created_at": "2024-03-06 17:37:32",
              "updated_at": "2024-03-06 17:37:32"
            },
            {
              "id": 47,
              "module": 8,
              "field": 33,
              "created_at": "2024-03-06 17:37:32",
              "updated_at": "2024-03-06 17:37:32"
            },
            {
              "id": 48,
              "module": 8,
              "field": 35,
              "created_at": "2024-03-06 17:37:32",
              "updated_at": "2024-03-06 17:37:32"
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('forms')->insert([
                'id' => $Data['id'],
                'module' => $Data['module'],
                'field' => $Data['field'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
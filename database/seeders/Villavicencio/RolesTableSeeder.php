<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
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
              "name": "Administrador",
              "guard_name": "api",
              "created_at": "2023-09-28 09:43:39",
              "updated_at": "2023-09-28 09:43:39"
            },
            {
              "id": 2,
              "name": "Editor",
              "guard_name": "api",
              "created_at": "2023-09-29 16:34:11",
              "updated_at": "2023-09-29 16:34:11"
            },
            {
              "id": 3,
              "name": "Secretario De Movilidad",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('roles')->insert([
                'id' => $Data['id'],
                'name' => $Data['name'],
                'guard_name' => $Data['guard_name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
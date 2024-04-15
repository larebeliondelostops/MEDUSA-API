<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRolesTableSeeder extends Seeder
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
              "role_id": 1,
              "model_type": "1",
              "model_id": 1
            },
            {
              "role_id": 2,
              "model_type": "App\Models\User",
              "model_id": 24
            },
            {
              "role_id": 2,
              "model_type": "App\Models\User",
              "model_id": 2
            },
            {
              "role_id": 2,
              "model_type": "App\Models\User",
              "model_id": 21
            },
            {
              "role_id": 1,
              "model_type": "App\Models\User",
              "model_id": 25
            },
            {
              "role_id": 1,
              "model_type": "App\Models\User",
              "model_id": 26
            },
            {
              "role_id": 1,
              "model_type": "App\Models\User",
              "model_id": 1
            },
            {
              "role_id": 1,
              "model_type": "App\Models\User",
              "model_id": 27
            },
            {
              "role_id": 1,
              "model_type": "App\Models\User",
              "model_id": 28
            },
            {
              "role_id": 1,
              "model_type": "App\Models\User",
              "model_id": 29
            },
            {
              "role_id": 1,
              "model_type": "App\Models\User",
              "model_id": 30
            },
            {
              "role_id": 1,
              "model_type": "App\Models\User",
              "model_id": 31
            },
            {
              "role_id": 1,
              "model_type": "App\Models\User",
              "model_id": 32
            },
            {
              "role_id": 3,
              "model_type": "App\Models\User",
              "model_id": 43
            },
            {
              "role_id": 1,
              "model_type": "App\Models\User",
              "model_id": 44
            },
            {
              "role_id": 2,
              "model_type": "App\Models\User",
              "model_id": 7
            },
            {
              "role_id": 2,
              "model_type": "App\Models\User",
              "model_id": 46
            },
            {
              "role_id": 2,
              "model_type": "App\Models\User",
              "model_id": 47
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('model_has_roles')->insert([
                'role_id' => $Data['role_id'],
                'model_type' => $Data['model_type'],
                'model_id' => $Data['model_id'],
            ]);
        }
    }
}
<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasPermissionsTableSeeder extends Seeder
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
              "permission_id": 28,
              "model_type": "App\Models\User",
              "model_id": 43
            },
            {
              "permission_id": 23,
              "model_type": "App\Models\User",
              "model_id": 43
            },
            {
              "permission_id": 24,
              "model_type": "App\Models\User",
              "model_id": 43
            },
            {
              "permission_id": 31,
              "model_type": "App\Models\User",
              "model_id": 43
            },
            {
              "permission_id": 37,
              "model_type": "App\Models\User",
              "model_id": 43
            },
            {
              "permission_id": 43,
              "model_type": "App\Models\User",
              "model_id": 43
            },
            {
              "permission_id": 44,
              "model_type": "App\Models\User",
              "model_id": 43
            },
            {
              "permission_id": 27,
              "model_type": "App\Models\User",
              "model_id": 43
            },
            {
              "permission_id": 21,
              "model_type": "App\Models\User",
              "model_id": 43
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('model_has_permissions')->insert([
                'permission_id' => $Data['permission_id'],
                'model_type' => $Data['model_type'],
                'model_id' => $Data['model_id'],
            ]);
        }
    }
}
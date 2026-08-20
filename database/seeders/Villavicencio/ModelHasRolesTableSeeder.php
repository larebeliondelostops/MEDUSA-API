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
        $sourceEmails = [
            1 => 'ignicion@gmail.com',
            2 => 'cristianrincon.ui@gmail.com',
            7 => 'ackmilopamo@gmail.com',
            21 => 'test@test.com',
            24 => 'testza@test.com',
            25 => 'llampreac@gmail.com',
            26 => 'mferreirap24@gmail.com',
            27 => 'usuarioprueba@gmail.com',
            28 => 'danielxz331@gmail.com',
            29 => 'jabella@gmail.com',
            30 => 'fanor@gmail.com',
            31 => 'alferez@gmail.com',
            32 => 'torres@gmail.com',
            43 => 'secretaria_movilidad@gmail.com',
            44 => 'dianarincon@gmail.com',
            47 => 'testgoogle@gmail.com',
        ];
        $sourceRoles = [
            1 => 'Administrador',
            2 => 'Editor',
            3 => 'Secretario De Movilidad',
        ];

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

        $data = str_replace('App\\Models\\User', 'App\\\\Models\\\\User', $data);
        $dataArray = json_decode($data, true, 512, JSON_THROW_ON_ERROR);

        foreach ($dataArray['array'] as $Data) {
            if (! isset($sourceEmails[$Data['model_id']])
                || ! isset($sourceRoles[$Data['role_id']])
                || $Data['model_type'] !== 'App\\Models\\User'
            ) {
                continue;
            }

            $userId = DB::table('users')
                ->where('email', $sourceEmails[$Data['model_id']])
                ->value('id');
            $roleId = DB::table('roles')
                ->where('name', $sourceRoles[$Data['role_id']])
                ->where('guard_name', 'api')
                ->value('id');

            if (! $userId || ! $roleId) {
                continue;
            }

            DB::table('model_has_roles')->insertOrIgnore([
                'role_id' => $roleId,
                'model_type' => $Data['model_type'],
                'model_id' => $userId,
            ]);
        }
    }
}

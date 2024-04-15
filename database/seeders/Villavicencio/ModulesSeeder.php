<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulesSeeder extends Seeder
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
              "name": "Usuarios",
              "description": "Módulo para la gestión de usuarios",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 2,
              "name": "Eventos",
              "description": "Módulo para la gestión de eventos",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 3,
              "name": "Salud",
              "description": "Módulo para la gestión de salud",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 4,
              "name": "Gobierno",
              "description": "Módulo para la gestión de gobierno",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 5,
              "name": "Cámaras",
              "description": "Módulo para la gestión de cámaras",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 6,
              "name": "Alarmas",
              "description": "Módulo para la gestión de las alarmas",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 7,
              "name": "Mesas de votación",
              "description": "Módulo para la gestión de las mesas de votación (lugares)",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 8,
              "name": "Configuraciones",
              "description": "Modulo para configurar los parametros de inicio de la plataforma",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('modules')->insert([
                'id' => $Data['id'],
                'name' => $Data['name'],
                'description' => $Data['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
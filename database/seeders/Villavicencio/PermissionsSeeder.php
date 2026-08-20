<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
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
              "name": "ver-usuarios",
              "guard_name": "api",
              "created_at": "2023-09-28 09:46:11",
              "updated_at": "2023-09-28 09:46:11"
            },
            {
              "id": 16,
              "name": "commandbar-Alarmas",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 17,
              "name": "commandbar-Cais",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 18,
              "name": "commandbar-Salud",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 19,
              "name": "commandbar-Viper",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 20,
              "name": "commandbar-Puestos de votación",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 21,
              "name": "commandbar-Fibra Óptica",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 22,
              "name": "commandbar-Incidentes",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 23,
              "name": "commandbar-Ipats",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 24,
              "name": "commandbar-Semaforos",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 25,
              "name": "commandbar-Camaras",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 26,
              "name": "commandbar-Modelo Probabilistico",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 27,
              "name": "commandbar-Mapa de Calor",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 28,
              "name": "commandbar-Tráfico",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 29,
              "name": "commandbar-Unidades móviles",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 30,
              "name": "commandbar-Eventos",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 31,
              "name": "menu-Mapa",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 32,
              "name": "menu-Eventos",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 33,
              "name": "menu-Salud",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 34,
              "name": "menu-Incidentes",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 35,
              "name": "menu-Marcadores",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 36,
              "name": "menu-Usuarios",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 37,
              "name": "menu-Reportes",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 38,
              "name": "submenu-Alarmas",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 39,
              "name": "submenu-Puestos de votación",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 40,
              "name": "submenu-Incidentes",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 41,
              "name": "submenu-Eventos",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 42,
              "name": "submenu-Salud",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 43,
              "name": "submenu-Ipats",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 44,
              "name": "commandbar-Modelo Probabilistico IPATS",
              "guard_name": "api",
              "created_at": null,
              "updated_at": null
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('permissions')->insertOrIgnore([
                'id' => $Data['id'],
                'name' => $Data['name'],
                'guard_name' => $Data['guard_name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

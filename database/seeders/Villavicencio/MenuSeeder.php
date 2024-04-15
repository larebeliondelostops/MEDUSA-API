<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
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
              "name": "Mapa",
              "path": "map",
              "icon": "public",
              "slug": "map",
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 5,
              "name": "Marcadores",
              "path": null,
              "icon": "place",
              "slug": "markers",
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 6,
              "name": "Usuarios",
              "path": "users",
              "icon": "person",
              "slug": "users",
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 4,
              "name": "Incidentes",
              "path": "markers/incident",
              "icon": "assured_workload",
              "slug": "incident",
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 7,
              "name": "Reportes",
              "path": "reports",
              "icon": "query_stats",
              "slug": "report",
              "enabled": true,
              "created_at": "2023-10-06 17:22:03",
              "updated_at": "2023-10-06 17:22:06"
            },
            {
              "id": 2,
              "name": "Eventos",
              "path": "markers/event",
              "icon": "event",
              "slug": "event",
              "enabled": false,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 3,
              "name": "Salud",
              "path": "markers/health",
              "icon": "health_and_safety",
              "slug": "health",
              "enabled": false,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('menu')->insert([
                'id' => $Data['id'],
                'name' => $Data['name'],
                'path' => $Data['path'],
                'icon' => $Data['icon'],
                'slug' => $Data['slug'],
                'enabled' => $Data['enabled'],

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
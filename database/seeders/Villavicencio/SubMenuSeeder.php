<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubMenuSeeder extends Seeder
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
              "sub_menu": 1,
              "identifier": "5-1",
              "menu": 5,
              "level": 2,
              "name": "Alarmas",
              "path": "markers/alarm",
              "icon": "notifications_active",
              "slug": "alarm",
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "sub_menu": 2,
              "identifier": "5-2",
              "menu": 5,
              "level": 2,
              "name": "Puestos de votación",
              "path": "markers/pollingPlace",
              "icon": "how_to_vote",
              "slug": "pollingPlace",
              "enabled": true,
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "sub_menu": 3,
              "identifier": "7-1",
              "menu": 7,
              "level": 2,
              "name": "Incidentes",
              "path": "reports/incident",
              "icon": "error",
              "slug": "incident",
              "enabled": true,
              "created_at": "2023-10-06 17:23:06",
              "updated_at": "2023-10-06 17:23:07"
            },
            {
              "sub_menu": 4,
              "identifier": "5-3",
              "menu": 5,
              "level": 2,
              "name": "Eventos",
              "path": "markers/event",
              "icon": "event",
              "slug": "event",
              "enabled": true,
              "created_at": "2023-10-06 17:23:06",
              "updated_at": "2023-10-06 17:23:06"
            },
            {
              "sub_menu": 5,
              "identifier": "5-4",
              "menu": 5,
              "level": 2,
              "name": "Salud",
              "path": "markers/health",
              "icon": "health_and_safety",
              "slug": "health",
              "enabled": true,
              "created_at": "2023-10-06 17:23:06",
              "updated_at": "2023-10-06 17:23:06"
            },
            {
              "sub_menu": 6,
              "identifier": "7-2",
              "menu": 7,
              "level": 2,
              "name": "Ipats",
              "path": "reports/ipats",
              "icon": "error",
              "slug": "ipats",
              "enabled": true,
              "created_at": "2023-10-06 17:23:06",
              "updated_at": "2023-10-06 17:23:07"
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('sub_menu')->insert([
                'sub_menu' => $Data['sub_menu'],
                'identifier' => $Data['identifier'],
                'menu' => $Data['menu'],
                'level' => $Data['level'],
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
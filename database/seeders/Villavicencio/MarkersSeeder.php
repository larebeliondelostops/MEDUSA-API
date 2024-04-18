<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkersSeeder extends Seeder
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
              "marker_type": 1,
              "name": "Alarmas",
              "icon": "notifications_active",
              "color": "yellow",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 2,
              "marker_type": 1,
              "name": "Cais",
              "icon": "local_police",
              "color": "green",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 3,
              "marker_type": 1,
              "name": "Salud",
              "icon": "health_and_safety",
              "color": "red",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 4,
              "marker_type": 1,
              "name": "Puestos de votación",
              "icon": "how_to_vote",
              "color": "purple",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 5,
              "marker_type": 4,
              "name": "Fibra Óptica",
              "icon": "cable",
              "color": "cyan",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 50,
              "marker_type": 1,
              "name": "Camaras",
              "icon": "videocam",
              "color": "blue",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 51,
              "marker_type": 4,
              "name": "Modelo Probabilistico",
              "icon": "data_usage",
              "color": "cyan",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 52,
              "marker_type": 4,
              "name": "Mapa de Calor",
              "icon": "local_fire_department",
              "color": "lightgreen",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 54,
              "marker_type": 1,
              "name": "Unidades móviles",
              "icon": "radar",
              "color": "orange",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 55,
              "marker_type": 3,
              "name": "Eventos",
              "icon": "event",
              "color": "pink",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 7,
              "marker_type": 1,
              "name": "Ipats",
              "icon": "local_hospital",
              "color": "pink",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 6,
              "marker_type": 4,
              "name": "Incidentes",
              "icon": "radar",
              "color": "orange",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 56,
              "marker_type": 4,
              "name": "Modelo Probabilistico IPATS",
              "icon": "bolt",
              "color": "cyan",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 57,
              "marker_type": 4,
              "name": "Modelo Probabilistico IPATS",
              "icon": "bolt",
              "color": "cyan",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 8,
              "marker_type": 1,
              "name": "Semaforos",
              "icon": "traffic",
              "color": "bluegreen",
              "created_at": null,
              "updated_at": null
            },
            {
              "id": 53,
              "marker_type": 4,
              "name": "Tráfico",
              "icon": "directions_car",
              "color": "bluegreen",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('marker')->insert([
                'id' => $Data['id'],
                'marker_type' => $Data['marker_type'],
                'name' => $Data['name'],
                'icon' => $Data['icon'],
                'color' => $Data['color'],
                'slug' => 1,
                'namespace' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
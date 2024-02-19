<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class FiberCamerasPointsSeeder extends Seeder
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
                    "type": "Feature",
                    "markerType": 21,
                    "id": "ef64fbba-0af1-49ba-98c9-d9baad463124",
                    "title": "NODO MARTIRES",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930548150942041,
                            -75.29458298762499
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "559d5ea4-7c71-4d61-bace-def36f0d245b",
                    "title": "NODO CAIMI",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.961752347386833,
                            -75.28849943262797
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "b36e4afc-2fa8-4a9d-ba18-decc0104317c",
                    "title": "NODO CANAIMA",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.904741136932218,
                            -75.27690523498616
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "705d897f-f091-479a-a63b-9d3baa523fc8",
                    "title": "Mufla Ceibas",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938542986578823,
                            -75.29444638021612
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "c41983a7-d155-4dc3-9a04-64fa69a3761d",
                    "title": "Mufla Eduardo Santos 1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.971680517991033,
                            -75.28569414133173
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "1600d95f-9464-4d73-81cf-19328841b773",
                    "title": "Mufla Eduardo Santos 2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.974007378943426,
                            -75.28510233961858
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "78221be2-592b-458d-bbbc-1a81cd87d512",
                    "title": "Mufla Camara 106",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932034347038261,
                            -75.29076498769183
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "e8ec347f-9904-47ad-ba62-ab3913f025f3",
                    "title": "Mufla Sena Comercial",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934413769339239,
                            -75.29162874674341
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "a2358c92-5ca6-4e99-955d-a53ff3073ba3",
                    "title": "Mufla I.E. tecnico Superior",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935035161202884,
                            -75.29306709776276
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "7bfb7720-a0af-4b49-9275-6031c71c8f03",
                    "title": "Mufla Rojas Trujillo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93753385679008,
                            -75.29709791138792
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "11f146f1-72c3-4393-9b03-7188dd18aa03",
                    "title": "Mufla SurOrientales 1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.920028439556232,
                            -75.27290052203537
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "b7d03f91-83cb-4a49-85e3-d861063169b8",
                    "title": "Mufla Santa Isabel",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.915176533712595,
                            -75.27480047132131
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "c68b3cae-b0e5-4d5b-b1cc-9067278f4efe",
                    "title": "Mufla Barrio Bogota",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.917916001981651,
                            -75.27492477484381
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "7e0b16f8-1e3a-431e-a3f3-6824cf9ca26d",
                    "title": "Mufla Barrio Bogota 2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.91677923656706,
                            -75.27118757281153
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "28149d7c-3499-404f-9b37-7d603acfbb63",
                    "title": "Mufla Max Duque",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.908111430539256,
                            -75.27235925308517
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "0f791712-b9e3-4a7a-bf1a-f8d81e64ccdf",
                    "title": "Mufla San Jorge II",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.90418351645741,
                            -75.27384064004923
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "f47902a9-3ee1-453e-b174-d3da58219646",
                    "title": "Mufla Quirinal",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934664944222722,
                            -75.28874918396875
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "b9aaf598-d3df-449d-baf5-adae8f4c90fc",
                    "title": "Mufla Andaquies",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940179295150545,
                            -75.26236874073803
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "4c56e242-8bf7-4dcd-913a-0b84eeb6f885",
                    "title": "NODO PALMAS",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941041206783624,
                            -75.24513300323957
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "93c8da22-85aa-4807-aa1b-886b722004db",
                    "title": "Mufa La Rioja",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940082417338965,
                            -75.2538421518304
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 21,
                    "id": "bf1b0cdd-1974-4b13-bfea-c4621f76e54e",
                    "title": "Mufla La Rioja 2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94674612751673,
                            -75.25340605242761
                        ]
                    }
                }
            ]   
        }';
        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('fiber_cameras_points')->insert([
                'name' => $Data['title'],
                'uuid'=> Str::uuid(),
                'position' => json_encode($Data['geometry']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } 
    }
}

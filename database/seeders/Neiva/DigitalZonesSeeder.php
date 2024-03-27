<?php

namespace Database\Seeders\Neiva;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DigitalZonesSeeder extends Seeder
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
            "array": [
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "d16dc35d-6e12-4ab6-8474-5781677f80a7",
                    "title": "Parque biblioteca Mirador del Sur",
                    "properties": {
                        "Tipo": "Zona WIFI"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.911299049430734,
                            -75.27012546202756
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "8577a50b-9ea9-4d2d-a050-54befd92f946",
                    "title": "Parque Biblioteca Pe\u00f1on Redondo",
                    "properties": {
                        "Tipo": "Zona WIFI"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918434584604948,
                            -75.26833749144369
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "8c67bc64-485c-49cc-8a7a-e2b9e0795a5a",
                    "title": "Parque Biblioteca Metropolitano",
                    "properties": {
                        "Tipo": "Zona WIFI"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940141189030914,
                            -75.24977663569179
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "3ce20ade-7744-4717-9007-5442a4230f99",
                    "title": "Parque Biblioteca Alberto Galiondo",
                    "properties": {
                        "Tipo": "Zona WIFI"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.976843775006248,
                            -75.28390220915871
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "6221e141-337a-49b0-80a2-40b821dbc751",
                    "title": "Correginiento San Luis",
                    "properties": {
                        "Tipo": "Zona WIFI"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.081493,
                            -75.484525
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "a8a99dbc-9b18-4f4c-b42e-628ff81e1a64",
                    "title": "Corregimiento Guacirco",
                    "properties": {
                        "Tipo": "Zona WIFI"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.100547483818196,
                            -75.27584934997043
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "29498af4-fa90-48d5-bf34-daa6b81baa8b",
                    "title": "Corregimineto Vegalarga",
                    "properties": {
                        "Tipo": "Zona WIFI"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945600391958885,
                            -75.03940451204605
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "0e41421c-00ed-4cbd-9e1e-f94a354684af",
                    "title": "Vive Digital Parque Biblioteca Alberto Galindo",
                    "properties": {
                        "Tipo": "Puntos Vive Digital y Acceso Comunitario"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.976979809819488,
                            -75.28400894860272
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "362bcdcd-1f42-42e0-8069-8faa84096dee",
                    "title": "Vive Digital Parque Biblioteca Metropolitano",
                    "properties": {
                        "Tipo": "Puntos Vive Digital y Acceso Comunitario"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.939746024094303,
                            -75.2494129935276
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "0256d289-726d-492d-b965-5328a5d31a8b",
                    "title": "Vive Digital Parque Biblioteca Pe\u00f1oRedondo",
                    "properties": {
                        "Tipo": "Puntos Vive Digital y Acceso Comunitario"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9184827796649,
                            -75.26850923320474
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "a185020b-b844-4c2b-9fe6-7c2e49f40a9e",
                    "title": "Vive Digital Granjas",
                    "properties": {
                        "Tipo": "Puntos Vive Digital y Acceso Comunitario"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.947138335786715,
                            -75.28930547466122
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "9b74bd52-5923-4cac-921d-1555953a0373",
                    "title": "Vive Digital Comuneros",
                    "properties": {
                        "Tipo": "Puntos Vive Digital y Acceso Comunitario"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926412400270694,
                            -75.29227189745166
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "2964c05c-6d7b-4473-b19b-49aeea8db683",
                    "title": "Vive Digital Parque Biblioteca Mirado del Sur",
                    "properties": {
                        "Tipo": "Puntos Vive Digital y Acceso Comunitario"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.911568659590942,
                            -75.27031534466889
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "375881a6-4c2c-4a8a-94e0-046d719b78e5",
                    "title": "Vive Digital IPC Plus",
                    "properties": {
                        "Tipo": "Puntos Vive Digital y Acceso Comunitario"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922869880249473,
                            -75.2683313084568
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "4b58ee82-e3c5-44b1-a322-8a0c7a4eb19b",
                    "title": "Vive Digital Enrique Olaya Herrera Plus",
                    "properties": {
                        "Tipo": "Puntos Vive Digital y Acceso Comunitario"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949332603708247,
                            -75.25237496487162
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "f571aac5-5d25-4341-bb5f-66d9172ff639",
                    "title": "Biblioteca Huellas",
                    "properties": {
                        "Tipo": "Puntos Vive Digital y Acceso Comunitario"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92696818403183,
                            -75.28496646353157
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "63a88113-0474-4e80-8cfe-39e2376327ff",
                    "title": "Punto Acceso Comunitario Jose Eustacio Rivera",
                    "properties": {
                        "Tipo": "Puntos Vive Digital y Acceso Comunitario"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938203764283031,
                            -75.26689371106039
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "861132b0-c347-47db-9b58-2faa88cdc4f3",
                    "title": "Punto Acceso Comunitario Casa Empoderadora de la Mujer",
                    "properties": {
                        "Tipo": "Puntos Vive Digital y Acceso Comunitario"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935145663012064,
                            -75.29706140515708
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "a9e8749c-a901-45f0-9a27-3e2dd3f011e2",
                    "title": "Punto Acceso Comunitario Guacirco",
                    "properties": {
                        "Tipo": "Puntos Vive Digital y Acceso Comunitario"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.100866670461042,
                            -75.27736784240183
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 30,
                    "id": "7494e260-e7fd-4b3d-96c1-98466a6420b0",
                    "title": "Punto Acceso Comunitario Fortalecillas",
                    "properties": {
                        "Tipo": "Puntos Vive Digital y Acceso Comunitario"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.035799182176093,
                            -75.2519835230034
                        ]
                    }
                }
            ]
        }';
        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('digital_zones')->insert([
                'name' => $Data['title'],
                'uuid'=> Str::uuid(),
                'type'=> $Data['properties']['Tipo'],
                'latitude' => $Data['geometry']['coordinates'][0],
                'longitude' => $Data['geometry']['coordinates'][1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } 
    }
}

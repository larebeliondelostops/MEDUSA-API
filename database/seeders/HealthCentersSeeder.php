<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class HealthCentersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::setDefaultConnection('neiva');

        $data = '        
        {
            "array": [
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "57f29fc6-7a79-4b1f-8d32-059918d31d35",
                    "title": "EL TRIUNFO",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.865554832297407,
                            -75.2087680258512
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "bf84bbd1-230f-452f-ac85-c70e4227aef0",
                    "title": "CAGUAN",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.863271762216311,
                            -75.23364413132863
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "a15f387d-d5a5-497e-ade2-29c505a791e9",
                    "title": "SAN ANTONIO",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924971743190036,
                            -75.10083370515773
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "d5223967-89dd-4413-b5f6-1e4aa609d6d7",
                    "title": "VEGALARGA",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948565516918401,
                            -75.04155274066859
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "ac2fb73a-9f62-4dd1-b49a-aa27e23c9cf1",
                    "title": "CEDRAL",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.006811724512334,
                            -75.04525737466345
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "33780d46-f533-4c39-a9fd-e75bf6e5ddc9",
                    "title": "FORTALECILLAS",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.035314486970039,
                            -75.25120747997903
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "2b35874d-d474-4ca6-8e0c-69f48bd4bf1e",
                    "title": "SAN FRANCISCO",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.06915944358875,
                            -75.38942732832912
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "efe8f151-6799-4b9b-afbf-fd78eaa86f79",
                    "title": "CHAPINERO",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.187742813573258,
                            -75.51340313030869
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "6c46684e-143d-44ff-9107-7bb8410259d5",
                    "title": "SAN LUIS",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.081426076939954,
                            -75.48455958893356
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "7d09df17-905c-4222-8b9f-04d707a7c61e",
                    "title": "AIPECITO",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.125149553263046,
                            -75.55783491432429
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "a8c37415-9fb7-498e-b7d7-f64e663a44bc",
                    "title": "GRANJAS",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9467831074,
                            -75.2894718872
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "bac191ce-2005-40f6-8531-e746c02090d3",
                    "title": "CANAIMA INTERNET",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9049407553,
                            -75.2767950004
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "a061a505-2baa-48db-be08-3dac4e3c2368",
                    "title": "LAS PALMAS",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9411493312,
                            -75.2455103878
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "a5a7debd-eaa5-4047-96bc-521d7ad96949",
                    "title": "IPC",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9234707841,
                            -75.2674351314
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "da826e59-049e-4d66-9f32-438716d6557f",
                    "title": "Bodega",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.904861077625339,
                            -75.28059774075606
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "7b7e5705-198c-4169-8fb6-ac7068539aca",
                    "title": "CANAIMA RURAL",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9049177006,
                            -75.2767975427
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "97eb733f-c585-428a-9768-710ead55aaee",
                    "title": "EDUARDO SANTOS",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9743043277,
                            -75.2860126142
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "ba6b066e-5d16-4fdd-b8a0-21b0e6c525ab",
                    "title": "7 DE AGOSTO",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933840919,
                            -75.2720712977
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "4e8a990c-6b73-4eca-a3c3-cdb775e9918b",
                    "title": "SANTA ISABEL",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9149267988,
                            -75.2756925815
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "75091b41-881f-4e3c-b221-fe77f99f0f61",
                    "title": "Santa Helena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.874855380566126,
                            -75.14227524869946
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "16a022f8-2b98-4bc8-a20f-228cab65b9d2",
                    "title": "El Colegio",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.897842706983894,
                            -75.00509795805236
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "55b61fdf-468c-4454-b194-4d30c1007e80",
                    "title": "Piedra Marcada",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930564691513332,
                            -74.97908002092389
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "e25f1378-6704-4f96-a24b-1dfaf677314d",
                    "title": "Palestina",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.880407353173521,
                            -75.09851002440563
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "c34c418e-2004-468d-b726-181ca905090d",
                    "title": "Palacios",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941981829905663,
                            -75.06407837942132
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "33c1bad0-58b2-4e80-ae3d-86314611cfd3",
                    "title": "Guacirco",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.10112104460913,
                            -75.27440637540849
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "fbedd90d-b6a4-463d-912e-9e0cc364c620",
                    "title": "San Jorge",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.056921697889704,
                            -75.2642421905137
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "68b1874f-8816-420f-aa9b-fd19287b7fb9",
                    "title": "Pe\u00f1as Blancas",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.07530545300749,
                            -75.35009241924074
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 27,
                    "id": "a6897e7f-4405-4b03-94bf-12d1e02ce845",
                    "title": "CAIMI",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.961577615048453,
                            -75.28871106274075
                        ]
                    }
                }
            ]
        }';
        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('health_centers')->insert([
                'name' => $Data['title'],
                'uuid'=> Str::uuid(),
                'position' => json_encode($Data['geometry'])
            ]);
        } 
    }

}

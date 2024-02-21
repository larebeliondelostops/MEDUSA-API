<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SportsVenuesSeeder extends Seeder
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
                    "markerType": 24,
                    "id": "149c01e3-8177-47da-a9fc-9d164484d414",
                    "title": "F\u00fatbol Arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94789580867544,
                            -75.30132010674589
                        ]
                    },
                    "properties": {
                        "BARRIO": "Santa In\u00e9s",
                        "ESCENARIO": "F\u00fatbol Arena",
                        "DIRECCI\u00d3N": "Cra 4 W Calle 34 - 33",
                        "LATUTUD": "2.9479",
                        "LONGITUD": "-75.3013"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "b89b27af-52b6-43b2-a066-5c85d76ee6a1",
                    "title": "Baloncesto",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94618769182144,
                            -75.300427754355
                        ]
                    },
                    "properties": {
                        "BARRIO": "Santa In\u00e9s",
                        "ESCENARIO": "Baloncesto",
                        "DIRECCI\u00d3N": "Cra 4 W Calle 30",
                        "LATUTUD": "2.94619",
                        "LONGITUD": "-75.3004"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "cb9f49d7-7934-4ac1-8a56-b594bcf1a7a5",
                    "title": "Microf\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945940525243476,
                            -75.30009901157061
                        ]
                    },
                    "properties": {
                        "BARRIO": "Santa In\u00e9s",
                        "ESCENARIO": "Microf\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 4 W Calle 30",
                        "LATUTUD": "2.94594",
                        "LONGITUD": "-75.3001"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "24fcd957-9dcb-4446-8a64-0d738830b0e4",
                    "title": "Cancha Sint\u00e9tica de F\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944095043879509,
                            -75.2975168292926
                        ]
                    },
                    "properties": {
                        "BARRIO": "C\u00e1ndido",
                        "ESCENARIO": "Cancha Sint\u00e9tica de F\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 2 Calle 28",
                        "LATUTUD": "2.9441",
                        "LONGITUD": "-75.2975"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "80834559-9791-4b0d-a5cc-5285e6c403dc",
                    "title": "Baloncesto",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948717418974116,
                            -75.29730805759539
                        ]
                    },
                    "properties": {
                        "BARRIO": "C\u00e1ndido 1 Etapa",
                        "ESCENARIO": "Baloncesto",
                        "DIRECCI\u00d3N": "Cl. 36 #1a-2 a 1a-72",
                        "LATUTUD": "2.94872",
                        "LONGITUD": "-75.2973"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "06181b79-b66c-469f-b1cf-68845a7e2a52",
                    "title": "Voleibol Arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.95123236632437,
                            -75.29629700674592
                        ]
                    },
                    "properties": {
                        "BARRIO": "C\u00e1ndido 1 Etapa",
                        "ESCENARIO": "Voleibol Arena",
                        "DIRECCI\u00d3N": "Cra 1 C Calle 41",
                        "LATUTUD": "2.95123",
                        "LONGITUD": "-75.2963"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "1e8c4ec1-2c09-4824-95e2-0068a8ea54ad",
                    "title": "Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.951192158427958,
                            -75.2959254932528
                        ]
                    },
                    "properties": {
                        "BARRIO": "C\u00e1ndido 1 Etapa",
                        "ESCENARIO": "Minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 1 C Calle 41",
                        "LATUTUD": "2.95119",
                        "LONGITUD": "-75.2959"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "3f01b5f0-cf4a-4674-8139-3b07c9b95443",
                    "title": "Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.953583948987966,
                            -75.296520564418
                        ]
                    },
                    "properties": {
                        "BARRIO": "C\u00e1ndido 1- 2 - 3 - 4 Etapa",
                        "ESCENARIO": "Minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 1 C Calle 45",
                        "LATUTUD": "2.95358",
                        "LONGITUD": "-75.2965"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "189fff02-076b-4073-a84f-32cce2e1021c",
                    "title": "Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.956596948391739,
                            -75.29572344907379
                        ]
                    },
                    "properties": {
                        "BARRIO": "C\u00e1ndido 1- 2 - 3 -4 Etapa",
                        "ESCENARIO": "Minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 1 C Calle 51",
                        "LATUTUD": "2.9566",
                        "LONGITUD": "-75.2957"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "0e9f4b29-3a27-4f4b-ae17-39f21c0920b6",
                    "title": "Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.957479877313594,
                            -75.2954390490738
                        ]
                    },
                    "properties": {
                        "BARRIO": "C\u00e1ndido 5 Etapa",
                        "ESCENARIO": "Minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 1 D Calle 53",
                        "LATUTUD": "2.95748",
                        "LONGITUD": "-75.2954"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "29e88e14-e033-40d8-b328-c2ef4dc6ca1a",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948438064640411,
                            -75.29757243743431
                        ]
                    },
                    "properties": {
                        "BARRIO": "C\u00e1ndido 1 Etapa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 1 C Calle 36",
                        "LATUTUD": "2.94844",
                        "LONGITUD": "-75.2976"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "21bd2846-3711-40f0-8896-65a7b28884c4",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.951416134809919,
                            -75.2961472625656
                        ]
                    },
                    "properties": {
                        "BARRIO": "C\u00e1ndido 1 Etapa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 1 C Calle 41",
                        "LATUTUD": "2.95142",
                        "LONGITUD": "-75.2961"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "15f856f3-660b-4640-80b6-0d1203005691",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.953993234325187,
                            -75.296530764418
                        ]
                    },
                    "properties": {
                        "BARRIO": "C\u00e1ndido 2 - 3 -4 Etapa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 1 C Calle 45",
                        "LATUTUD": "2.95399",
                        "LONGITUD": "-75.2965"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "5bf2f3b5-41f0-46df-b45a-070956814e13",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.957584246368472,
                            -75.2958548702247
                        ]
                    },
                    "properties": {
                        "BARRIO": "C\u00e1ndido 5 Etapa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 1 D Calle 53",
                        "LATUTUD": "2.95758",
                        "LONGITUD": "-75.2959"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "2dd4ad56-ef99-4d88-bd83-9379387f01bf",
                    "title": "Baloncesto",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.961566060356602,
                            -75.2990352067459
                        ]
                    },
                    "properties": {
                        "BARRIO": "Ciudadela Comfamiliar",
                        "ESCENARIO": "Baloncesto",
                        "DIRECCI\u00d3N": "Cra. 3 Oe. #56-106 a 56-172",
                        "LATUTUD": "2.96157",
                        "LONGITUD": "-75.299"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "1d8d52b9-6282-408a-89f7-7afbfb5ef682",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.961458176705509,
                            -75.2989091380287
                        ]
                    },
                    "properties": {
                        "BARRIO": "Ciudadela Comfamiliar",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra. 3 Oe. #56-106 a 56-172",
                        "LATUTUD": "2.96146",
                        "LONGITUD": "-75.2989"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "f2f4619c-46b2-49b8-be22-6768e87ec834",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.959573304218659,
                            -75.2943737951064
                        ]
                    },
                    "properties": {
                        "BARRIO": "Las Mercedes",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 1 D Calle 56 D",
                        "LATUTUD": "2.95957",
                        "LONGITUD": "-75.2944"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "c85b40b2-b643-4f77-a058-ea5644a6101d",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.956994391972265,
                            -75.3007977392866
                        ]
                    },
                    "properties": {
                        "BARRIO": "Mansiones del Norte",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 4 W Calle 50",
                        "LATUTUD": "2.95699",
                        "LONGITUD": "-75.3008"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "faeaaa41-a663-4dd4-a2f8-cd47d7f446bb",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.968985317060322,
                            -75.29338215092609
                        ]
                    },
                    "properties": {
                        "BARRIO": "Minuto de Dios 4 Etapa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 1 D Calle 72 A",
                        "LATUTUD": "2.96899",
                        "LONGITUD": "-75.2934"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "41ac5923-57b8-405b-9d63-6ba69139ce4a",
                    "title": "Voleibol Arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.968950503690375,
                            -75.2930415337296
                        ]
                    },
                    "properties": {
                        "BARRIO": "Minuto de Dios 4 Etapa",
                        "ESCENARIO": "Voleibol Arena",
                        "DIRECCI\u00d3N": "Cra 1 D Calle 72 A",
                        "LATUTUD": "2.96895",
                        "LONGITUD": "-75.293"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "e67ef6ec-0016-4c32-924b-386ecaa46c77",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.971523516604706,
                            -75.2957514355819
                        ]
                    },
                    "properties": {
                        "BARRIO": "Calamar\u00ed",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 2 W Calle 75",
                        "LATUTUD": "2.97152",
                        "LONGITUD": "-75.2958"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "cee3a26f-ba9a-4c5b-a399-c152ef5b72be",
                    "title": "Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.971622973354142,
                            -75.2962025067459
                        ]
                    },
                    "properties": {
                        "BARRIO": "Calamar\u00ed",
                        "ESCENARIO": "Minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 2 W Calle 76",
                        "LATUTUD": "2.97162",
                        "LONGITUD": "-75.2962"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "c532980c-878b-4dec-94fa-12232c3b3ee1",
                    "title": "Cancha Sint\u00e9tica de F\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.969676374656909,
                            -75.2971458067459
                        ]
                    },
                    "properties": {
                        "BARRIO": "La Vor\u00e1gine",
                        "ESCENARIO": "Cancha Sint\u00e9tica de F\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 2 W Calle 72",
                        "LATUTUD": "2.96968",
                        "LONGITUD": "-75.2971"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "13bbc40a-193e-4290-9511-c814fc2adf9a",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.964240677226382,
                            -75.2986609625657
                        ]
                    },
                    "properties": {
                        "BARRIO": "Chicala",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 3 Calle 65",
                        "LATUTUD": "2.96424",
                        "LONGITUD": "-75.2987"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "06e5c5b1-5b59-45da-9565-89c15d073c67",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.96412300483651,
                            -75.2985541490738
                        ]
                    },
                    "properties": {
                        "BARRIO": "Chicala",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 3 Calle 66",
                        "LATUTUD": "2.96412",
                        "LONGITUD": "-75.2986"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "4157db78-ce05-4dfe-b4d1-bb78ef05963f",
                    "title": "Cancha de minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.964355104781453,
                            -75.2990752085982
                        ]
                    },
                    "properties": {
                        "BARRIO": "Chicala",
                        "ESCENARIO": "Cancha de minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 3 Calle 67",
                        "LATUTUD": "2.96436",
                        "LONGITUD": "-75.2991"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "450c50c2-5e6b-4fb1-ab68-4b7c08ccf690",
                    "title": "Cancha Microfutbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945725097161063,
                            -75.2871873355819
                        ]
                    },
                    "properties": {
                        "BARRIO": "C\u00e1mbulos",
                        "ESCENARIO": "Cancha Microfutbol",
                        "DIRECCI\u00d3N": "Cra8 F Calle 33",
                        "LATUTUD": "2.94573",
                        "LONGITUD": "-75.2872"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "a5a62465-4c75-4110-912f-12d45f1734a4",
                    "title": "Cancha Baloncesto",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945696850546096,
                            -75.2871713779098
                        ]
                    },
                    "properties": {
                        "BARRIO": "C\u00e1mbulos",
                        "ESCENARIO": "Cancha Baloncesto",
                        "DIRECCI\u00d3N": "Cra 8 F calle 33",
                        "LATUTUD": "2.9457",
                        "LONGITUD": "-75.2872"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "4b8077ab-320d-4f10-9b5f-f8baa41fa2cb",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943128409799289,
                            -75.2877825085982
                        ]
                    },
                    "properties": {
                        "BARRIO": "Santa Lucia",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cr 8 B # 26 - 60",
                        "LATUTUD": "2.94313",
                        "LONGITUD": "-75.2878"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "25ad13a0-521b-4aae-b94d-c3c1bd770fef",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.955471577749944,
                            -75.291228093254
                        ]
                    },
                    "properties": {
                        "BARRIO": "Santa Monica",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 5 calle 52",
                        "LATUTUD": "2.95547",
                        "LONGITUD": "-75.2912"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "a64619ca-ac9b-4d04-a9ab-8e7754f4ce8f",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945237921304127,
                            -75.2909166951064
                        ]
                    },
                    "properties": {
                        "BARRIO": "Las Granjas",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 7 Calle 29",
                        "LATUTUD": "2.94524",
                        "LONGITUD": "-75.2909"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "8bba9a15-77e0-4774-8358-99b0e9af28f0",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945696609194117,
                            -75.2905510797622
                        ]
                    },
                    "properties": {
                        "BARRIO": "Las Granjas",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 7 Calle 30",
                        "LATUTUD": "2.9457",
                        "LONGITUD": "-75.2906"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "de5ded66-de84-405e-885d-5a35f69e0305",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949417145262188,
                            -75.2891061674937
                        ]
                    },
                    "properties": {
                        "BARRIO": "Las Granjas",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Av. 26 calle 38",
                        "LATUTUD": "2.94942",
                        "LONGITUD": "-75.2891"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "0b6fb047-07cb-46ad-9a0e-ec5b77ca4dc3",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.951666955229153,
                            -75.29086524159551
                        ]
                    },
                    "properties": {
                        "BARRIO": "Las Granjas",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Av. 26 calle 43",
                        "LATUTUD": "2.95167",
                        "LONGITUD": "-75.2909"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "31ca48f7-8083-41c0-a3e2-2b898a3a7555",
                    "title": "Cancha de f\u00fatbol arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.947004662394233,
                            -75.29115296256569
                        ]
                    },
                    "properties": {
                        "BARRIO": "Las Granjas",
                        "ESCENARIO": "Cancha de f\u00fatbol arena",
                        "DIRECCI\u00d3N": "Cra 6 calle 33",
                        "LATUTUD": "2.947",
                        "LONGITUD": "-75.2912"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "fefc82a2-dd6b-4321-9e45-50d43c4ccca1",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94874503774103,
                            -75.287344064418
                        ]
                    },
                    "properties": {
                        "BARRIO": "Los Molinos",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 8 D calle 37",
                        "LATUTUD": "2.94875",
                        "LONGITUD": "-75.2873"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "e4393502-2c91-4508-8579-a1a7482aed02",
                    "title": "Voleibol Arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949043920626271,
                            -75.28690287976221
                        ]
                    },
                    "properties": {
                        "BARRIO": "Los Molinos",
                        "ESCENARIO": "Voleibol Arena",
                        "DIRECCI\u00d3N": "Cra 8 D calle 37",
                        "LATUTUD": "2.94904",
                        "LONGITUD": "-75.2869"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "1035d498-3b18-4be2-8ebc-fa872fbde2a8",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946319166587834,
                            -75.28409164966828
                        ]
                    },
                    "properties": {
                        "BARRIO": "Los Andes",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cr 17 # 29 - 03",
                        "LATUTUD": "2.94632",
                        "LONGITUD": "-75.2841"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "e2555957-d31a-4737-bdf8-21a39d1b76d8",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960260189581407,
                            -75.283339164418
                        ]
                    },
                    "properties": {
                        "BARRIO": "Villa Urbe",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 19 Calle 60 A",
                        "LATUTUD": "2.96026",
                        "LONGITUD": "-75.2833"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "d2ac8622-baa4-4d79-be4e-02344c025134",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960360076687194,
                            -75.2821994509261
                        ]
                    },
                    "properties": {
                        "BARRIO": "Brisas del Sena",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 20 B Calle 62",
                        "LATUTUD": "2.96036",
                        "LONGITUD": "-75.2822"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "39502427-d058-414e-ab88-f5ef1b102cd9",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.956296712108744,
                            -75.2844153944774
                        ]
                    },
                    "properties": {
                        "BARRIO": "Alamos Norte",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cll 50 # 18 C \u2013 23",
                        "LATUTUD": "2.9563",
                        "LONGITUD": "-75.2844"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "01884490-4579-48bf-97d4-8605d57bc19c",
                    "title": "Voleibol Arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.956630948385039,
                            -75.2846709374343
                        ]
                    },
                    "properties": {
                        "BARRIO": "Alamos Norte",
                        "ESCENARIO": "Voleibol Arena",
                        "DIRECCI\u00d3N": "Cll 50 # 18 C \u2013 23",
                        "LATUTUD": "2.95663",
                        "LONGITUD": "-75.2847"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "0ed202fd-51b8-4547-8524-6612ba2dbae8",
                    "title": "Cancha de Minifutbol arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.956809490721595,
                            -75.28410371656751
                        ]
                    },
                    "properties": {
                        "BARRIO": "Alamos Norte",
                        "ESCENARIO": "Cancha de Minifutbol arena",
                        "DIRECCI\u00d3N": "Cll 50 Bis # 19 \u2013 04",
                        "LATUTUD": "2.95681",
                        "LONGITUD": "-75.2841"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "969a11c0-493f-416d-9afc-303617a49b84",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.955475934046108,
                            -75.2830071355819
                        ]
                    },
                    "properties": {
                        "BARRIO": "Prado Norte",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 18 D Calle 47 B",
                        "LATUTUD": "2.95548",
                        "LONGITUD": "-75.283"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "b645d1c8-8428-4f05-9000-2abbe382612d",
                    "title": "Voleibol Arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.956738093922882,
                            -75.28460656441801
                        ]
                    },
                    "properties": {
                        "BARRIO": "Prado Norte",
                        "ESCENARIO": "Voleibol Arena",
                        "DIRECCI\u00d3N": "Cra 18 D Calle 47 B",
                        "LATUTUD": "2.95674",
                        "LONGITUD": "-75.2846"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "6cd00f13-b4ee-45d5-bb1d-f6bb578f7a89",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.956732604699006,
                            -75.280246493254
                        ]
                    },
                    "properties": {
                        "BARRIO": "Los Pinos",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 23 Calle 46",
                        "LATUTUD": "2.95673",
                        "LONGITUD": "-75.2802"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "787abf6f-eed4-4813-9b48-520c895082cf",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960238526433532,
                            -75.2759953300594
                        ]
                    },
                    "properties": {
                        "BARRIO": "Ca\u00f1a Brava",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra. 28 52 - 03",
                        "LATUTUD": "2.96024",
                        "LONGITUD": "-75.276"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "e46224fa-886b-4c83-8f9f-96f40d72048c",
                    "title": "Cancha de Minif\u00fatbol Arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            0,
                            0
                        ]
                    },
                    "properties": {
                        "BARRIO": "Ca\u00f1a Brava",
                        "ESCENARIO": "Cancha de Minif\u00fatbol Arena",
                        "DIRECCI\u00d3N": "Cra. 28 52 - 04",
                        "LATUTUD": "0",
                        "LONGITUD": "0"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "af88c84a-7272-4c91-968a-8d9880bcdf41",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945252045057973,
                            -75.29179282380451
                        ]
                    },
                    "properties": {
                        "BARRIO": "Aeropuerto",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cl 25B 6b2",
                        "LATUTUD": "2.94525",
                        "LONGITUD": "-75.2918"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "57683f67-0b42-498e-baf7-3b5eee67626d",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934266726660075,
                            -75.3004658662707
                        ]
                    },
                    "properties": {
                        "BARRIO": "El Lago",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cll 22 No. 1 B - 25",
                        "LATUTUD": "2.93427",
                        "LONGITUD": "-75.3005"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "06bda103-e0ba-40a3-865b-3cd3391087a0",
                    "title": "Voleibol Arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933962623307136,
                            0
                        ]
                    },
                    "properties": {
                        "BARRIO": "El Lago",
                        "ESCENARIO": "Voleibol Arena",
                        "DIRECCI\u00d3N": "Cr 1C No. 21 \u2013 51",
                        "LATUTUD": "2.93396",
                        "LONGITUD": "0"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "4e4b08f5-7ef4-41c3-87e4-f54ae02c0acc",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932069223642761,
                            -75.30033186441801
                        ]
                    },
                    "properties": {
                        "BARRIO": "Caracol\u00ed",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 1 Calle 16",
                        "LATUTUD": "2.93207",
                        "LONGITUD": "-75.3003"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "525bd8b1-3237-4a34-9d73-00021042cd65",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936928222781048,
                            -75.2863337220901
                        ]
                    },
                    "properties": {
                        "BARRIO": "Campo N\u00fa\u00f1ez",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Calle 18 # 8A-27",
                        "LATUTUD": "2.93693",
                        "LONGITUD": "-75.2863"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "131482c5-fbfa-4fef-bc30-9df221b9a268",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933744923345758,
                            -75.2842193490738
                        ]
                    },
                    "properties": {
                        "BARRIO": "Chapinero",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cll 14 No, 10 - 22",
                        "LATUTUD": "2.93374",
                        "LONGITUD": "-75.2842"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "a7a4355c-21ad-4b56-b193-74f4cd7fbbd8",
                    "title": "Cancha Microf\u00fatbol (Externa)",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923152265710325,
                            -75.2846142355819
                        ]
                    },
                    "properties": {
                        "BARRIO": "Estadio Urdaneta",
                        "ESCENARIO": "Cancha Microf\u00fatbol (Externa)",
                        "DIRECCI\u00d3N": "Cra 8 Calle 2",
                        "LATUTUD": "2.92315",
                        "LONGITUD": "-75.2846"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "40eb5cab-3c87-4237-9efb-b2ad407e5862",
                    "title": "Cancha Baloncesto (Externa)",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923057229390111,
                            -75.28506347976221
                        ]
                    },
                    "properties": {
                        "BARRIO": "Estadio Urdaneta",
                        "ESCENARIO": "Cancha Baloncesto (Externa)",
                        "DIRECCI\u00d3N": "Cra 8 Calle 2",
                        "LATUTUD": "2.92306",
                        "LONGITUD": "-75.2851"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "27054534-8961-48be-af4b-c99136b1c27c",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929740500000002,
                            -75.2956192
                        ]
                    },
                    "properties": {
                        "BARRIO": "Los M\u00e1rtirez",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 2 Calle 12",
                        "LATUTUD": "2.92974",
                        "LONGITUD": "-75.2956"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "93d0eb54-4ef9-4d76-b74f-598cbe50aaab",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929434083381004,
                            -75.29643067790978
                        ]
                    },
                    "properties": {
                        "BARRIO": "Los Artesanos",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Av. Circunvalar calle 13",
                        "LATUTUD": "2.92943",
                        "LONGITUD": "-75.2964"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "ed886044-4c13-4e51-af96-451adbec49b2",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.920215881022076,
                            -75.28952222222222
                        ]
                    },
                    "properties": {
                        "BARRIO": "El Puerto",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Av. Circunvalar Cra 2",
                        "LATUTUD": "2.92022",
                        "LONGITUD": "-75"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "6db33924-9bc0-49e8-b43c-e1e5c88c4de3",
                    "title": "Cancha F\u00fatbol de Arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940409498513694,
                            -75.26887401150161
                        ]
                    },
                    "properties": {
                        "BARRIO": "El Jardin",
                        "ESCENARIO": "Cancha F\u00fatbol de Arena",
                        "DIRECCI\u00d3N": "Calle 19 Cra 29",
                        "LATUTUD": "2.94041",
                        "LONGITUD": "-75.2689"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "536ebd1c-775f-4c13-8396-f3dcf8b414f5",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938869366618637,
                            -75.2652811355819
                        ]
                    },
                    "properties": {
                        "BARRIO": "La Orqu\u00eddea",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 34 A Calle 18",
                        "LATUTUD": "2.93887",
                        "LONGITUD": "-75.2653"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "9b882332-8ef7-49af-a26c-4a1c41b23fe3",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938239522548298,
                            -75.25239516441802
                        ]
                    },
                    "properties": {
                        "BARRIO": "Villa Caf\u00e9",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 47 A Calle 17",
                        "LATUTUD": "2.93824",
                        "LONGITUD": "-75.2524"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "554a4626-6e3c-4059-afd6-3d0eeab63f02",
                    "title": "Cancha Baloncesto",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938431293051535,
                            -75.251984664418
                        ]
                    },
                    "properties": {
                        "BARRIO": "Villa Caf\u00e9",
                        "ESCENARIO": "Cancha Baloncesto",
                        "DIRECCI\u00d3N": "Cra 47 A Calle 17",
                        "LATUTUD": "2.93843",
                        "LONGITUD": "-75.252"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "4562deeb-0305-4caa-893e-d93e7eb23744",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941830157104381,
                            -75.2598240797622
                        ]
                    },
                    "properties": {
                        "BARRIO": "Los Guaduales",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Calle 20 No. 40 - 18",
                        "LATUTUD": "2.94183",
                        "LONGITUD": "-75.2598"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "ee3be7dc-4053-4469-82b1-a6def3228843",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934302182331994,
                            -75.27249306441799
                        ]
                    },
                    "properties": {
                        "BARRIO": "7 de Agosto",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Calle 11 # 25",
                        "LATUTUD": "2.9343",
                        "LONGITUD": "-75.2725"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "9964ed99-a4dc-428d-ab55-8abe12da0cf4",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936690311314081,
                            -75.25959289165148
                        ]
                    },
                    "properties": {
                        "BARRIO": "El Vergel",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Calle 16 No. 40 \u2013 85",
                        "LATUTUD": "2.93669",
                        "LONGITUD": "-75.2596"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "2513e8e1-3d6b-41a2-b9d5-5ff5455b9fe3",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936109478665903,
                            -75.2651018969588
                        ]
                    },
                    "properties": {
                        "BARRIO": "Las Catleyas",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 34 Calle13",
                        "LATUTUD": "2.93611",
                        "LONGITUD": "-75.2651"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "785a99a4-d612-4f63-b2ed-f65768a861ad",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.915193256531929,
                            -75.2811918374342
                        ]
                    },
                    "properties": {
                        "BARRIO": "Timanco 4 etapa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 12 Calle 5 sur",
                        "LATUTUD": "2.91519",
                        "LONGITUD": "-75.2812"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "b371d2e2-dc8e-4927-a5b7-828e4fa3f5b5",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.914560401535482,
                            -75.2795463797622
                        ]
                    },
                    "properties": {
                        "BARRIO": "San Francisco",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Diag.7 sur Cra 14 A",
                        "LATUTUD": "2.91456",
                        "LONGITUD": "-75.2795"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "3b9752b0-ae88-4f8f-aa38-4cb44be35d33",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.915862426506561,
                            -75.2792136490738
                        ]
                    },
                    "properties": {
                        "BARRIO": "San Francisco",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Diag. 11 A Cra 12 Sur",
                        "LATUTUD": "2.91586",
                        "LONGITUD": "-75.2792"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "36e2a949-992c-4176-86c1-fd0610a0349b",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918082255967649,
                            -75.27970932209011
                        ]
                    },
                    "properties": {
                        "BARRIO": "Minuto de Dios",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 12 A # 3-02 sur",
                        "LATUTUD": "2.91808",
                        "LONGITUD": "-75.2797"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "099c93de-010b-4d71-a7ab-ccbafa19dde8",
                    "title": "Cancha de Minif\u00fatbol arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92007313516415,
                            -75.28330434110451
                        ]
                    },
                    "properties": {
                        "BARRIO": "El Bosque",
                        "ESCENARIO": "Cancha de Minif\u00fatbol arena",
                        "DIRECCI\u00d3N": "Calle 2 sur car 7 A",
                        "LATUTUD": "2.92007",
                        "LONGITUD": "-75.2833"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "4acc35f0-16d8-4cd5-a67b-6c3c9a5cee3a",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.911128112347896,
                            -75.26985389140174
                        ]
                    },
                    "properties": {
                        "BARRIO": "Bella vista",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 28 Calle 18 C Sur",
                        "LATUTUD": "2.91113",
                        "LONGITUD": "-75.2699"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "b1e9a03c-ec33-4d50-8e1e-e611eb5d1cfe",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.911783387169979,
                            -75.2730320914017
                        ]
                    },
                    "properties": {
                        "BARRIO": "Timanco 1 etapa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 25A Calle 18 A sur",
                        "LATUTUD": "2.91178",
                        "LONGITUD": "-75.273"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "b67dae61-83b8-4f6b-973b-b49f8e158c8c",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.913422992540893,
                            -75.2764542975532
                        ]
                    },
                    "properties": {
                        "BARRIO": "La Esperanza",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 19 Calle 14 sur",
                        "LATUTUD": "2.91342",
                        "LONGITUD": "-75.2765"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "40bacaaf-c7c9-4894-bfce-1a92b865f60f",
                    "title": "Cancha de Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.913538916733898,
                            -75.2760260914017
                        ]
                    },
                    "properties": {
                        "BARRIO": "La Esperanza",
                        "ESCENARIO": "Cancha de Minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 19 Calle 14 sur",
                        "LATUTUD": "2.91354",
                        "LONGITUD": "-75.276"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "73ff03e7-3ec4-44e4-b97b-ccc558e45f09",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.898185174957928,
                            -75.26400933558192
                        ]
                    },
                    "properties": {
                        "BARRIO": "San Luis de La Paz",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cll 30 Sur Cra 31 A y 31 B",
                        "LATUTUD": "2.89819",
                        "LONGITUD": "-75.264"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "012cd1f3-a168-413f-8dd7-88aa551ff1ac",
                    "title": "Cancha de Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.915607241501474,
                            -75.2698884779098
                        ]
                    },
                    "properties": {
                        "BARRIO": "Jose Antonio Galan 1, 2, 3",
                        "ESCENARIO": "Cancha de Minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 28 calle 11 Sur",
                        "LATUTUD": "2.91561",
                        "LONGITUD": "-75.2699"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "f21d7e55-d28a-4256-ae04-dd5f4561c51f",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.916025886261573,
                            -75.26991074907379
                        ]
                    },
                    "properties": {
                        "BARRIO": "Jose Antonio Galan 1, 2, 3",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 28 calle 11 Sur",
                        "LATUTUD": "2.91603",
                        "LONGITUD": "-75.2699"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "a343f494-cfbb-4d67-b578-32dc1a26cd87",
                    "title": "Cancha de Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.903914134035981,
                            -75.26540074907379
                        ]
                    },
                    "properties": {
                        "BARRIO": "Manzanares",
                        "ESCENARIO": "Cancha de Minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cll 20 Sur Con Cra. 29 y 29 A",
                        "LATUTUD": "2.90391",
                        "LONGITUD": "-75.2654"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "4ecb400e-000b-4ff5-bcc9-856694ecfde5",
                    "title": "Cancha de F\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.907648018106155,
                            -75.26640546441804
                        ]
                    },
                    "properties": {
                        "BARRIO": "Manzanares",
                        "ESCENARIO": "Cancha de F\u00fatbol",
                        "DIRECCI\u00d3N": "Cll 20 Sur Con Cra. 33",
                        "LATUTUD": "2.90765",
                        "LONGITUD": "-75.2664"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "e3df53a6-6cf5-4903-8722-659b8c61636b",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.905814133576241,
                            -75.2661350527785
                        ]
                    },
                    "properties": {
                        "BARRIO": "Manzanares 5 Etapa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 35 Calle 23 Sur",
                        "LATUTUD": "2.90581",
                        "LONGITUD": "-75.2661"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "2619c547-4719-4198-9a87-2646a439b6f6",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.906494718374479,
                            -75.2628937067459
                        ]
                    },
                    "properties": {
                        "BARRIO": "Limonar Parte Alta",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 37 y 38 Calle 23 A sur",
                        "LATUTUD": "2.90649",
                        "LONGITUD": "-75.2629"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "87341c9f-61db-4bb4-8c4b-b10fb7430c9a",
                    "title": "Cancha de Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.90733457309265,
                            -75.26228940859819
                        ]
                    },
                    "properties": {
                        "BARRIO": "Limonar Parte Alta",
                        "ESCENARIO": "Cancha de Minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 38 calle 23 sur",
                        "LATUTUD": "2.90733",
                        "LONGITUD": "-75.2623"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "b90939cd-00bf-4598-9f62-81ab1fad627b",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910597687423673,
                            -75.26463564219
                        ]
                    },
                    "properties": {
                        "BARRIO": "Limonar Parte Baja",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cll 20 Con Cra. 37 Sur",
                        "LATUTUD": "2.9106",
                        "LONGITUD": "-75.2646"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "6d0c818d-74dd-49f6-8afe-38436c5c6366",
                    "title": "Cancha de Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.903914134035981,
                            -75.26545439325399
                        ]
                    },
                    "properties": {
                        "BARRIO": "Limonar Parte Baja",
                        "ESCENARIO": "Cancha de Minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cll 20 y 22 Sur Cra. 37 y 38",
                        "LATUTUD": "2.90391",
                        "LONGITUD": "-75.2655"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "4242888f-6bff-4856-9979-d1b66bc2329f",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912025432071141,
                            -75.2629026067459
                        ]
                    },
                    "properties": {
                        "BARRIO": "Limonar Parte Baja",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 39 Cll 16 D Sur",
                        "LATUTUD": "2.91203",
                        "LONGITUD": "-75.2629"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "6180c7ba-4660-4456-bbb5-7b5e41ef4f90",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912004002107178,
                            -75.2628596914017
                        ]
                    },
                    "properties": {
                        "BARRIO": "Limonar Parte Baja",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 39 Cll 16 D Sur",
                        "LATUTUD": "2.912",
                        "LONGITUD": "-75.2629"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "64079d61-9d53-4235-a3a0-6a3705909100",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.907499067871848,
                            -75.2647205355819
                        ]
                    },
                    "properties": {
                        "BARRIO": "Altos del Limonar",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 36 calle 20 Bis Sur",
                        "LATUTUD": "2.9075",
                        "LONGITUD": "-75.2647"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "71f4e0cf-b760-4010-b980-bf3fccf7c927",
                    "title": "F\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.908376547285538,
                            -75.2755917136297
                        ]
                    },
                    "properties": {
                        "BARRIO": "Canaima",
                        "ESCENARIO": "F\u00fatbol",
                        "DIRECCI\u00d3N": "Carrera 22 calle 22 sur",
                        "LATUTUD": "2.90838",
                        "LONGITUD": "-75.2756"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "0085f968-6e38-4894-8be1-45891c27220e",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.906603873242024,
                            -75.2740947220901
                        ]
                    },
                    "properties": {
                        "BARRIO": "Canaima",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 24 Calle 23 A Sur",
                        "LATUTUD": "2.9066",
                        "LONGITUD": "-75.2741"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "8e339fce-cc9c-4e2c-ba35-00dfec4d1b79",
                    "title": "Cancha de Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.90471200373521,
                            -75.2722375951064
                        ]
                    },
                    "properties": {
                        "BARRIO": "San Jorge 1 etapa",
                        "ESCENARIO": "Cancha de Minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cra. 29 con Cll 25 sur",
                        "LATUTUD": "2.90471",
                        "LONGITUD": "-75.2722"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "4922508b-f35e-4358-b368-22bafbee5a15",
                    "title": "Cancha de F\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.903323573911099,
                            -75.2753399779098
                        ]
                    },
                    "properties": {
                        "BARRIO": "San Jorge 2 etapa",
                        "ESCENARIO": "Cancha de F\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 23 calle 32 sur",
                        "LATUTUD": "2.90332",
                        "LONGITUD": "-75.2753"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "4f60bb5d-2cbb-4e92-a777-24bb57002680",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.900363959419536,
                            -75.2756036490738
                        ]
                    },
                    "properties": {
                        "BARRIO": "San Jorge 2 etapa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Calle 39 Sur Cra 23 y Cra 25",
                        "LATUTUD": "2.90036",
                        "LONGITUD": "-75.2756"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "4a2767c7-41df-47c6-9399-2a0ffa3f96d4",
                    "title": "Voleibol arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.900554129197062,
                            -75.27639760674592
                        ]
                    },
                    "properties": {
                        "BARRIO": "San Jorge 2 etapa",
                        "ESCENARIO": "Voleibol arena",
                        "DIRECCI\u00d3N": "Calle 39 Sur Cra 23 y Cra 25",
                        "LATUTUD": "2.90055",
                        "LONGITUD": "-75.2764"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "ca7a92d8-3840-47c9-87bf-21d10b162b95",
                    "title": "Cancha de Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.900677359358657,
                            -75.2766845374343
                        ]
                    },
                    "properties": {
                        "BARRIO": "San Jorge 2 etapa",
                        "ESCENARIO": "Cancha de Minif\u00fatbol",
                        "DIRECCI\u00d3N": "Calle 39 Sur Cra 23 y Cra 25",
                        "LATUTUD": "2.90068",
                        "LONGITUD": "-75.2767"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "ead38f55-affb-4f4b-a42a-d7c93890eea8",
                    "title": "Cancha de Voleibol Arena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.899485404899602,
                            -75.26516735092616
                        ]
                    },
                    "properties": {
                        "BARRIO": "Puertas del sol",
                        "ESCENARIO": "Cancha de Voleibol Arena",
                        "DIRECCI\u00d3N": "Calle 28 A SUR Cra 33",
                        "LATUTUD": "2.89949",
                        "LONGITUD": "-75.2652"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "a31ce024-f21b-4431-9b4a-1a03884c2961",
                    "title": "Cancha Sinteticas de Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.899760022380717,
                            -75.2653954068148
                        ]
                    },
                    "properties": {
                        "BARRIO": "Puertas del sol",
                        "ESCENARIO": "Cancha Sinteticas de Minif\u00fatbol",
                        "DIRECCI\u00d3N": "Calle 28 A SUR Cra 33",
                        "LATUTUD": "2.89976",
                        "LONGITUD": "-75.2654"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "c4a37acb-4992-4169-a0be-05c5bb6b2145",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.901510374280738,
                            -75.26886822023772
                        ]
                    },
                    "properties": {
                        "BARRIO": "Puerta del Sol 2 etapa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 30 calle 24 Sur",
                        "LATUTUD": "2.90151",
                        "LONGITUD": "-75.2689"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "fc3b1e7e-349c-428a-ad11-f6241ee91680",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.901722704401424,
                            -75.26556266256559
                        ]
                    },
                    "properties": {
                        "BARRIO": "Tejares del Sur",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 33 Calle 27 Sur",
                        "LATUTUD": "2.90172",
                        "LONGITUD": "-75.2656"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "5e519eb8-cad6-48d1-ba35-57ff744a5c26",
                    "title": "Cancha de minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.904710458574691,
                            -75.2639245914017
                        ]
                    },
                    "properties": {
                        "BARRIO": "Oasis 1 etapa",
                        "ESCENARIO": "Cancha de minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cll 24 Sur Cra. 36 A",
                        "LATUTUD": "2.90471",
                        "LONGITUD": "-75.2639"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "19bf5b76-543a-4ade-ade6-58f317866b4a",
                    "title": "Cancha de minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.903806983441504,
                            -75.2654758509261
                        ]
                    },
                    "properties": {
                        "BARRIO": "Oasis 2 etapa",
                        "ESCENARIO": "Cancha de minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cll 24 Sur Cra. 35",
                        "LATUTUD": "2.90381",
                        "LONGITUD": "-75.2655"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "c999608c-fe0a-4339-908a-507b8994ba95",
                    "title": "Cancha de minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.900362834894463,
                            -75.263507993254
                        ]
                    },
                    "properties": {
                        "BARRIO": "Oasis 3 etapa",
                        "ESCENARIO": "Cancha de minif\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 35 calle 28 A sur",
                        "LATUTUD": "2.90036",
                        "LONGITUD": "-75.2635"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "241c2a22-b1df-4eb3-9dee-c03ca951e7e7",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.899400796934608,
                            -75.2589561116395
                        ]
                    },
                    "properties": {
                        "BARRIO": "Cuarto Centenario",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "TORRES",
                        "LATUTUD": "2.8994",
                        "LONGITUD": "-75.259"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "ef596069-10df-4b34-87cf-27e88a51142c",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.901436399999997,
                            -75.2584404
                        ]
                    },
                    "properties": {
                        "BARRIO": "Cuarto Centenario",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Parque Principal",
                        "LATUTUD": "2.90144",
                        "LONGITUD": "-75.2584"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "182460a0-5ec9-41f7-aa1f-14bbbbeeeca9",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.901139199999987,
                            -75.25832229999999
                        ]
                    },
                    "properties": {
                        "BARRIO": "Cuarto Centenario",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Sector Maria Paula",
                        "LATUTUD": "2.90114",
                        "LONGITUD": "-75.2583"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "40e64eae-33f1-43a0-932a-a80236c72d13",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.900843099999988,
                            -75.2582354
                        ]
                    },
                    "properties": {
                        "BARRIO": "IV centenario",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Agrupaci\u00f3n D",
                        "LATUTUD": "2.90084",
                        "LONGITUD": "-75.2582"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "2e3b3416-df74-4c69-a4cb-7aeda6640f51",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.89561249999998,
                            -75.2643738
                        ]
                    },
                    "properties": {
                        "BARRIO": "IV centenario",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Agrupaci\u00f3n F",
                        "LATUTUD": "2.89561",
                        "LONGITUD": "-75.2644"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "dc835a01-4da1-4182-b965-4ef41d13d934",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.891097991581244,
                            -75.256627264418
                        ]
                    },
                    "properties": {
                        "BARRIO": "Las Margaritas",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Calle 45 A Bis Sur Cra 35",
                        "LATUTUD": "2.8911",
                        "LONGITUD": "-75.2566"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "b843dbc3-b4db-4a60-824e-fe879fcbb245",
                    "title": "Cancha de minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.890934621984274,
                            -75.25695449140171
                        ]
                    },
                    "properties": {
                        "BARRIO": "Las Margaritas",
                        "ESCENARIO": "Cancha de minif\u00fatbol",
                        "DIRECCI\u00d3N": "Calle 45 A Bis Sur Cra 34",
                        "LATUTUD": "2.89093",
                        "LONGITUD": "-75.257"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "ab741141-8270-42ef-b44d-3a073d22f550",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.915337835940375,
                            -75.2821729527785
                        ]
                    },
                    "properties": {
                        "BARRIO": "Andaluc\u00eda 1 Etapa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 11 Diag. 3 Sur",
                        "LATUTUD": "2.91534",
                        "LONGITUD": "-75.2822"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "dae39064-8f59-4257-97bb-da1557c936a0",
                    "title": "Cancha Sinteticas de Minif\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            0,
                            0
                        ]
                    },
                    "properties": {
                        "BARRIO": "fronteras de milenio",
                        "ESCENARIO": "Cancha Sinteticas de Minif\u00fatbol",
                        "DIRECCI\u00d3N": "comuna 6",
                        "LATUTUD": "0",
                        "LONGITUD": "0"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "0c660a4d-b765-439c-9566-12b5e3987ec0",
                    "title": "Sinteticas de Minifutbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930961728159001,
                            -75.27036555889549
                        ]
                    },
                    "properties": {
                        "BARRIO": "LAS BRISAS",
                        "ESCENARIO": "Sinteticas de Minifutbol",
                        "DIRECCI\u00d3N": "Calle 8 Carrera 28",
                        "LATUTUD": "2.93096",
                        "LONGITUD": "-75.2704"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "828a6686-09c0-43a7-90c0-96f3b3e69884",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928607453907173,
                            -75.27757124907379
                        ]
                    },
                    "properties": {
                        "BARRIO": "Calixto Leyva",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 16 Calle 6",
                        "LATUTUD": "2.92861",
                        "LONGITUD": "-75.2776"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "a3e4ede0-e1a5-43a8-ab0d-61582368735e",
                    "title": "Cancha Baloncesto (Peque\u00f1o)",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92875025387922,
                            -75.27782104907384
                        ]
                    },
                    "properties": {
                        "BARRIO": "Calixto Leyva",
                        "ESCENARIO": "Cancha Baloncesto (Peque\u00f1o)",
                        "DIRECCI\u00d3N": "Cra 16 Calle 6",
                        "LATUTUD": "2.92875",
                        "LONGITUD": "-75.2778"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "bdf23004-c460-407f-a448-346fb199c8d5",
                    "title": "Polideportivo (Mercado)",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928747894582662,
                            -75.2756962337296
                        ]
                    },
                    "properties": {
                        "BARRIO": "Calixto Leyva",
                        "ESCENARIO": "Polideportivo (Mercado)",
                        "DIRECCI\u00d3N": "Cra 19 Calle 5 A",
                        "LATUTUD": "2.92875",
                        "LONGITUD": "-75.2757"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "a46bd947-150e-400c-be7d-c8a62981e4ff",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926563956837294,
                            -75.27757671104501
                        ]
                    },
                    "properties": {
                        "BARRIO": "El Obrero",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Calle 4 b Carrera 16",
                        "LATUTUD": "2.92656",
                        "LONGITUD": "-75.2776"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "8cb8fb90-b958-4fd5-9e4f-b7419818b7ec",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93208976447092,
                            -75.26039616441798
                        ]
                    },
                    "properties": {
                        "BARRIO": "Ipanema",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 38 Calle 8 C",
                        "LATUTUD": "2.93209",
                        "LONGITUD": "-75.2604"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "b626911c-b931-4e0c-9420-87aa341ee886",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.917124671090217,
                            -75.266203893254
                        ]
                    },
                    "properties": {
                        "BARRIO": "Acacias 3 etapa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 30 B Calle 1 B",
                        "LATUTUD": "2.91712",
                        "LONGITUD": "-75.2662"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "dd848f75-1846-4373-b53f-32819f291063",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922960218697233,
                            -75.271018364418
                        ]
                    },
                    "properties": {
                        "BARRIO": "Alfonso Lopez",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cll 2A Entre Cra 26",
                        "LATUTUD": "2.92296",
                        "LONGITUD": "-75.271"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "704cbce1-0a99-42aa-8a0e-80005dc1d8a3",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925601354496417,
                            -75.26346036441801
                        ]
                    },
                    "properties": {
                        "BARRIO": "San Carlos",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 33 B Calle 3",
                        "LATUTUD": "2.9256",
                        "LONGITUD": "-75.2635"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "e5176709-fdc9-421c-9069-1a5880430b99",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918669096171,
                            -75.2635707374342
                        ]
                    },
                    "properties": {
                        "BARRIO": "Panorama",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra. 30f #1-70",
                        "LATUTUD": "2.91867",
                        "LONGITUD": "-75.2636"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "f094471e-0707-4de0-a423-de95af434cdc",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923539354900266,
                            -75.261287264418
                        ]
                    },
                    "properties": {
                        "BARRIO": "Los Alpes",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Detr\u00e1s del CAI",
                        "LATUTUD": "2.92354",
                        "LONGITUD": "-75.2613"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "04d52407-4056-428c-b26a-c5618eef47c4",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925823284158025,
                            -75.2699126797622
                        ]
                    },
                    "properties": {
                        "BARRIO": "Las Americas",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 27 Calle 2",
                        "LATUTUD": "2.92582",
                        "LONGITUD": "-75.2699"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "dba8acc5-da33-4c50-9020-c76392ef2a21",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.927317483836571,
                            -75.26599546441801
                        ]
                    },
                    "properties": {
                        "BARRIO": "Los Parques",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 32 Calle 3",
                        "LATUTUD": "2.92732",
                        "LONGITUD": "-75.266"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "ed24138b-6baa-4e69-bd37-7e75e22bb6fb",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922297255143418,
                            -75.2677452067459
                        ]
                    },
                    "properties": {
                        "BARRIO": "La Florida",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 30 B Calle 2 C",
                        "LATUTUD": "2.9223",
                        "LONGITUD": "-75.2677"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "a186dc70-6da1-459a-8650-0d2f4943b7a5",
                    "title": "Cancha MicroF\u00fatbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.968179068039856,
                            -75.2889764515206
                        ]
                    },
                    "properties": {
                        "BARRIO": "Tercer Milenio",
                        "ESCENARIO": "Cancha MicroF\u00fatbol",
                        "DIRECCI\u00d3N": "Cra 3a Calle 73b",
                        "LATUTUD": "2.96818",
                        "LONGITUD": "-75.289"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "c950fa98-d930-4b42-a068-7200652373ec",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.969598602519579,
                            -75.287299664418
                        ]
                    },
                    "properties": {
                        "BARRIO": "Virgilio Barco",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 4 y 5 Calle 74 D",
                        "LATUTUD": "2.9696",
                        "LONGITUD": "-75.2873"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "8ef9e862-6cea-42c4-8780-1225111d044a",
                    "title": "Cancha de minifutbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.969840189049999,
                            -75.287591693254
                        ]
                    },
                    "properties": {
                        "BARRIO": "Virgilio Barco",
                        "ESCENARIO": "Cancha de minifutbol",
                        "DIRECCI\u00d3N": "Cra 4 y 5 Calle 74 D",
                        "LATUTUD": "2.96984",
                        "LONGITUD": "-75.2876"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "deeb4bb5-5253-483e-af9d-28ef6a103c75",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.971067459936436,
                            -75.2905262085982
                        ]
                    },
                    "properties": {
                        "BARRIO": "El progreso",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cll 76 B # 1 D - 03",
                        "LATUTUD": "2.97107",
                        "LONGITUD": "-75.2905"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "eb23a70c-1db3-4dd2-95de-6933eee1c7c9",
                    "title": "Cancha de minifutbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.972599945214753,
                            -75.2900427220901
                        ]
                    },
                    "properties": {
                        "BARRIO": "Luis Eduardo Vanegas",
                        "ESCENARIO": "Cancha de minifutbol",
                        "DIRECCI\u00d3N": "Cra 1 F Calle 78",
                        "LATUTUD": "2.9726",
                        "LONGITUD": "-75.29"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "4acc222e-51f7-49d5-8dfc-0bd4b4213626",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.972576031633438,
                            -75.28907362579481
                        ]
                    },
                    "properties": {
                        "BARRIO": "Luis Eduardo Vanegas",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 1 H Calle 78",
                        "LATUTUD": "2.97258",
                        "LONGITUD": "-75.2891"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "a712be19-b0cf-4bfd-b3e3-12f88964bd0a",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.973687458652736,
                            -75.2894263490738
                        ]
                    },
                    "properties": {
                        "BARRIO": "Minuto de Dios 5 etapa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 1 G Calle 79",
                        "LATUTUD": "2.97369",
                        "LONGITUD": "-75.2894"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "2e2635b8-33ee-4165-8394-1407acf399bf",
                    "title": "Voley Playa",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.973659530612296,
                            -75.2897420490738
                        ]
                    },
                    "properties": {
                        "BARRIO": "Minuto de Dios 5 etapa",
                        "ESCENARIO": "Voley Playa",
                        "DIRECCI\u00d3N": "Cra 1 G Calle 79",
                        "LATUTUD": "2.97366",
                        "LONGITUD": "-75.2897"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "369a57d5-9a4f-43c4-9462-6ad5367f8075",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.971395803109127,
                            -75.288149664418
                        ]
                    },
                    "properties": {
                        "BARRIO": "Luis Carlos Galan",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 3 Calle 77",
                        "LATUTUD": "2.9714",
                        "LONGITUD": "-75.2881"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "ef39835f-ad68-4b67-acb3-dd27c85c03b4",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.97345567383152,
                            -75.2872653797622
                        ]
                    },
                    "properties": {
                        "BARRIO": "Luis Carlos Galan",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 3 Calle 79",
                        "LATUTUD": "2.97346",
                        "LONGITUD": "-75.2873"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "3e6c9aa9-f039-4988-8a66-69bda2f3b128",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.97532668717134,
                            -75.2879598202377
                        ]
                    },
                    "properties": {
                        "BARRIO": "Santa Rosa",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cll 82 # 2 - 67",
                        "LATUTUD": "2.97533",
                        "LONGITUD": "-75.288"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "fd30172b-dbeb-4bc1-9139-56b8ed809967",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.979862658098487,
                            -75.286896564418
                        ]
                    },
                    "properties": {
                        "BARRIO": "Dario Echand\u00eda",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 2 B Calle 87",
                        "LATUTUD": "2.97986",
                        "LONGITUD": "-75.2869"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "87b07033-7496-49f5-8a78-a2723ed21c94",
                    "title": "Cancha de futbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.974899129724613,
                            -75.28949837182732
                        ]
                    },
                    "properties": {
                        "BARRIO": "Vicente Araujo",
                        "ESCENARIO": "Cancha de futbol",
                        "DIRECCI\u00d3N": "Cra 1 H # 80 C - 05",
                        "LATUTUD": "2.9749",
                        "LONGITUD": "-75.2895"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "e8b74996-03ae-4c37-8050-8fef087ad59c",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.981743529079011,
                            -75.28710656441801
                        ]
                    },
                    "properties": {
                        "BARRIO": "Villa Magdalena",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 1 Calle 91",
                        "LATUTUD": "2.98174",
                        "LONGITUD": "-75.2871"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "3e8397ec-fbda-476e-a3c8-bf141cd88528",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945377533292937,
                            -75.2518979509261
                        ]
                    },
                    "properties": {
                        "BARRIO": "Pablo VI",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 50 Calle 24",
                        "LATUTUD": "2.94538",
                        "LONGITUD": "-75.2519"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "f72b32c6-2e10-4b99-aebb-ac5a54aeb002",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946327450421493,
                            -75.2506248202377
                        ]
                    },
                    "properties": {
                        "BARRIO": "Antonio Baraya",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cll 24 # 51 A \u2013 16",
                        "LATUTUD": "2.94633",
                        "LONGITUD": "-75.2506"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "01f9bea4-f149-484d-bb28-b3e9a2a8150f",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945951853113757,
                            -75.2513199220901
                        ]
                    },
                    "properties": {
                        "BARRIO": "Los Rosales",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 51 Calle 23 C",
                        "LATUTUD": "2.94595",
                        "LONGITUD": "-75.2513"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "4af88476-7215-4207-be0c-ae144b0fcf61",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944816853350583,
                            -75.249974082209
                        ]
                    },
                    "properties": {
                        "BARRIO": "Ciudad Salitre",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cr 51 B # 22",
                        "LATUTUD": "2.94482",
                        "LONGITUD": "-75.25"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "c79332d3-3542-4cfd-9aff-69037a82aebe",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943121580427062,
                            -75.256249164418
                        ]
                    },
                    "properties": {
                        "BARRIO": "Los Colores",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cra 43 calle 21 B",
                        "LATUTUD": "2.94312",
                        "LONGITUD": "-75.2562"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "23eb3538-8532-4c61-b53d-85d726f363ee",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942509965866704,
                            -75.2544133355819
                        ]
                    },
                    "properties": {
                        "BARRIO": "La Rioja",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cr 45 B # 21",
                        "LATUTUD": "2.94251",
                        "LONGITUD": "-75.2544"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "222a4357-ca90-4c26-89fc-e6b7821a3dc7",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.951434933697885,
                            -75.25006760552252
                        ]
                    },
                    "properties": {
                        "BARRIO": "San Bernardo",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cr 52 B",
                        "LATUTUD": "2.95143",
                        "LONGITUD": "-75.2501"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "d3280d44-efa1-413c-adc5-8993593ad0ce",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945463250591955,
                            -75.251865764418
                        ]
                    },
                    "properties": {
                        "BARRIO": "Santander",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cll 24 B # 45 \u2013 59",
                        "LATUTUD": "2.94546",
                        "LONGITUD": "-75.2519"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "8705c194-c744-401c-91e3-1e19496ff077",
                    "title": "Polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949919820470126,
                            -75.25179880859818
                        ]
                    },
                    "properties": {
                        "BARRIO": "Olaya Herrera",
                        "ESCENARIO": "Polideportivo",
                        "DIRECCI\u00d3N": "Cr 51 B # 27 A",
                        "LATUTUD": "2.94992",
                        "LONGITUD": "-75.2518"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "763cb574-da9f-4b4e-9e49-32a2bb143dde",
                    "title": "Cancha de Minifutbol",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941195195549047,
                            -75.2481124797622
                        ]
                    },
                    "properties": {
                        "BARRIO": "Victor Felix",
                        "ESCENARIO": "Cancha de Minifutbol",
                        "DIRECCI\u00d3N": "Cll 19 A # 51 A",
                        "LATUTUD": "2.9412",
                        "LONGITUD": "-75.2481"
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 24,
                    "id": "b28d6bfb-e385-4bec-97fe-ee47503eb889",
                    "title": "polideportivo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949554179034077,
                            -75.251511064418
                        ]
                    },
                    "properties": {
                        "BARRIO": "Las camelias",
                        "ESCENARIO": "polideportivo",
                        "DIRECCI\u00d3N": "Cra. 51b 27 a 2",
                        "LATUTUD": "2.94955",
                        "LONGITUD": "-75.2515"
                    }
                }
            ]
        }';
        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('sports_venues')->insert([
                'name' => $Data['title'],
                'uuid'=> Str::uuid(),
                'neighborhood'=> $Data['properties']['BARRIO'],
                'address'=> $Data['properties']['DIRECCIÓN'],
                'scenery'=> $Data['properties']['ESCENARIO'],
                'position' => json_encode($Data['geometry']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } 
    }
}

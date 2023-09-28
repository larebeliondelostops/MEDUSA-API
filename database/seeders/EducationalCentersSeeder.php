<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EducationalCentersSeeder extends Seeder
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
                    "markerType": 31,
                    "id": "ef9e3e27-efd7-4cad-8545-8f24edb75460",
                    "title": "I.E. Agustin Codazzi",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.913923665249001,
                            -75.27752995666528
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "3631ad07-dd08-4375-8692-c4d95d6b58ec",
                    "title": "Emaya",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.915879166666666,
                            -75.27694555555556
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "775a2832-86a1-4eee-9e1f-1b5485d092a0",
                    "title": "El Rosario",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918771535566616,
                            -75.27975991152898
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "39ef165d-1586-493b-8780-3a1996050725",
                    "title": "I.E. Aipecito",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.125213888888889,
                            -75.55774444444444
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "864e217e-fe2a-4fe7-be3e-8be57f448926",
                    "title": "Florida",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.154683333333333,
                            -75.53954999999999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "279692a4-217a-4297-a61d-570d6173696e",
                    "title": "La Union",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.115752777777778,
                            -75.54665833333333
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "edef19fb-9595-4618-b6a8-1b498275d84b",
                    "title": "Cristalina",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.121880555555557,
                            -75.53585666666666
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "5058de3b-85fe-4739-896c-4236337e3e86",
                    "title": "La Primavera",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.098608333333333,
                            -75.58855833333332
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "62e7448e-b12d-426d-99ac-dc7538eba033",
                    "title": "I.E. Tecnico Superior",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934115,
                            -75.29373611111112
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "990c2548-2afc-4646-94b9-af3bf485e173",
                    "title": "Los Martires",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.927774444444444,
                            -75.29329249999999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "240cb13a-5236-42c0-80c6-3b01a0ec921a",
                    "title": "Elena Lara",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938529444444445,
                            -75.28912638888889
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "fe26654a-8695-488f-97f3-4d26f4d87938",
                    "title": "Floresmiro Azuero",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.939111111111111,
                            -75.28983333333333
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "4e301d13-a68d-40d5-9327-b8833e461c80",
                    "title": "I.E. Angel Maria Paredes",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930705,
                            -75.2810575
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "2bf3853a-cb22-4421-a546-761f6ac17047",
                    "title": "Luis Calixto Leiva",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9291225,
                            -75.27774194444444
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "c764ca63-c3ac-46bf-8a10-ad9a18121297",
                    "title": "I.E. Atanasio Girardot",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.939444722222222,
                            -75.2671511111111
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "77c8189f-7a1d-4d76-a9aa-fd3e7a934db8",
                    "title": "Guillermo Montenegro",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933872222222222,
                            -75.27812777777778
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "34888c41-dbf4-41d7-93bc-53f326f6ec5a",
                    "title": "Loma de la cruz",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933681231035289,
                            -75.27646588471501
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "dae0b988-ed89-451b-88de-b673e4fba31a",
                    "title": "I.E. Ceinar",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930476666666666,
                            -75.29643861111111
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "78fee25c-ccd4-431c-90cd-f50c153594c5",
                    "title": "Renaciendo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938863888888889,
                            -75.28304444444444
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "b2c0d02e-184f-47c9-9c62-6f457e5146fa",
                    "title": "Diamante (I.E. Chapinero)",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.175801388888889,
                            -75.56825833333333
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "730ab47f-8ea4-4113-bdf8-c1818611c0b7",
                    "title": "San Jose",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.919047222222222,
                            -75.06554166666666
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "fc82cc7b-4197-4412-b2bc-9945a8efbcfc",
                    "title": "Altamira",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.176558333333333,
                            -75.53051944444444
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "58c7d489-bc03-46ea-b8ee-0b314bf4c83a",
                    "title": "La Caba\u00f1a",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.211566666666667,
                            -75.50661111111111
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "78315295-becc-4cb0-94fa-dce0662b1588",
                    "title": "I.E. Eduardo Santos",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9741925,
                            -75.285955
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "50936ecb-9b2e-492d-a82f-4b0916105f7f",
                    "title": "Alberto Rosero Concha",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.980214166666667,
                            -75.28630222222222
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "2a01909a-557f-4c9f-aa8c-0b4e98c55412",
                    "title": "Luis Carlos Gal\u00e1n",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.970611388888889,
                            -75.28865555555555
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "fcdb30f6-de21-4e5d-8ebc-8cdb59ad0030",
                    "title": "I.E. El Caguan",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.862641666666667,
                            -75.23406111111112
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "a519bb2b-654f-4618-aab6-7c9af1ae3b2b",
                    "title": "Barro Negro",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.867343300971787,
                            -75.19774004394313
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "5841b49b-92c9-400a-b2e4-61fe835d32d1",
                    "title": "La Gabriela",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.873527777777778,
                            -75.23536666666666
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "7e9b4562-fe32-435f-bb36-717ee8af49c2",
                    "title": "I.E. El Limonar",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910341388888888,
                            -75.26476972222223
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "f26a94e8-9717-47d2-a08b-580ccc045855",
                    "title": "Buenos Aires",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.915666944444444,
                            -75.27291694444445
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "04d822a1-bfd2-4535-83a6-58201b24e8e3",
                    "title": "Garabaticos",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.913784999999999,
                            -75.27003277777777
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "d6e3d711-a512-4563-b26f-d9475593536c",
                    "title": "Lomalinda",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.914133888888889,
                            -75.27006694444444
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "37f3d1db-e4ad-48f0-b129-13dd610931f7",
                    "title": "I.E. Enrique Olaya Herrera",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948951944444445,
                            -75.25266388888889
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "36ab1f63-bf76-463d-b60b-9a7b7b39ffa0",
                    "title": "Las Camelias",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.950503055555556,
                            -75.24744194444445
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "2b41d593-9221-4493-8fd0-0892c2d6576e",
                    "title": "San Bernardo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.953998475344449,
                            -75.25061499199705
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "778d6625-2acd-4024-8902-75eb11338b51",
                    "title": "I.E. Escuela Normal Superior",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930469444444444,
                            -75.26109805555555
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "c42c40bb-68a4-4d18-92a8-efc335ce9cf0",
                    "title": "Escuela Popular Claretiana",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922638055555555,
                            -75.26192333333333
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "ab9076a2-c545-461f-a9d4-0bf9c5e7f55a",
                    "title": "Santa Helena",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.851383440579067,
                            -75.10947054744152
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "336af2ca-b0ff-4d2b-936f-893fd893f5e6",
                    "title": "Las Brisas",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931081388888889,
                            -75.2711375
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "e160afc8-d441-4325-abe1-8826ad36bf37",
                    "title": "I.E. Gabriel Garcia Marquez",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.977552222222222,
                            -75.2840175
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "c1ccf2d7-07b9-4e6b-86b5-d3b85d3e5c49",
                    "title": "Alberto Galindo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.980358611111111,
                            -75.28263638888889
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "6ad7637b-1781-4331-9b4c-8625d0e53235",
                    "title": "Humberto Tafur Charry",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.977681388888889,
                            -75.28466583333334
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "eff380b1-d883-4bac-878e-8873a5e9fea2",
                    "title": "Jose Maria Carbonel",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.977905277777778,
                            -75.28190694444444
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "2f9f9574-3452-4ac5-953a-2068bdda8b59",
                    "title": "El Venado",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.985281405330475,
                            -75.27544598061267
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "e7333ecf-3ff8-4e33-bead-6970d3336ed8",
                    "title": "I.E. Humberto Tafur Charry",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940130833333333,
                            -75.24899055555555
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "06bfba6c-9b6a-418d-98fe-d9b9809c983b",
                    "title": "Las Palmas",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9444225,
                            -75.24522666666667
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "679fc697-2969-4649-a349-70d0e5d5d891",
                    "title": "Palmitas",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946579722222222,
                            -75.23752361111111
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "6761d0e9-3665-4eec-8df0-052e1c6ae058",
                    "title": "I.E. Claretiano Gustavo Torres Parra",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.961853739889343,
                            -75.2720636500825
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "57005722-f29e-49d8-867a-de779ea24d41",
                    "title": "I.E. Santa Teresa",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926975555555555,
                            -75.27295777777778
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "216cd864-c61b-4d4c-ae6c-22d021f6796f",
                    "title": "I.E. Departamental Tierra De Promision",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934098333333333,
                            -75.2968311111111
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "179d01af-2026-4e61-af1a-e9246a40bf78",
                    "title": "Efrain Rojas Trujillo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936456613461677,
                            -75.29661871272182
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "c829e6ee-b99f-4e6c-b2fa-fc74be6308e8",
                    "title": "El Lago",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933909403060536,
                            -75.29985855322893
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "2b04d8af-ff6d-4c9b-b2a1-cd1bd9538353",
                    "title": "Enriqueta Solano Duran",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934894444444444,
                            -75.28786111111111
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "de792332-6526-4ca9-b952-3f3f0a66f488",
                    "title": "I.E. Inem Juliam Motta Salas",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942946111111111,
                            -75.2980011111111
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "39708db7-a6f0-46c0-8bb8-8b9f4b1179e8",
                    "title": "Candido Leguizamo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948149077497219,
                            -75.29666849470334
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "b4bb6350-d5cf-46c9-b48c-1ab156ca34ca",
                    "title": "Mauricio Sanchez Garcia",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.947644444444445,
                            -75.30006916666666
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "eefeaeb3-86b3-443f-926f-8e32d0d609d5",
                    "title": "I.E. Jairo Morera Lizcano",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.91849111111111,
                            -75.26952
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "ef331afe-a3d8-4285-a7d4-8a133071cdbb",
                    "title": "Panorama Fundacion Vida y Paz",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918617222222222,
                            -75.26492527777778
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "ea83096b-91af-4792-945d-ec805fb04762",
                    "title": "I.E. Jairo Mosquera Moreno Guacirco (Primaria)",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.100813888888889,
                            -75.27741388888889
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "64c9a991-fd91-4b65-8079-9b8d6ee96d54",
                    "title": "I.E. Jairo Mosquera Moreno Guacirco (Secundaria)",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.100376516307137,
                            -75.2757358132045
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "8a504bc3-bf92-4d50-bf4d-8cfc781d1931",
                    "title": "Nina Andrade de Lievano (Altares)",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.002313888888889,
                            -75.30301666666666
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "395c6334-a8a4-4985-9e74-030648957ad6",
                    "title": "San Francisco",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.071833841967124,
                            -75.39104511779257
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "56fd3ef4-4f5d-4c7d-a289-5977d9666a78",
                    "title": "San Jorge",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.056777777777778,
                            -75.26405833333334
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "85f94776-1a9a-4373-bbcc-c5f328d393db",
                    "title": "I.E. Jose Eustasio Rivera",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938440833333333,
                            -75.26711194444444
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "6e1e9e5c-4ab9-4370-b4cc-ffa3a9e04f9a",
                    "title": "Monserrate",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935349139602537,
                            -75.27198563089809
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "c2352384-2f1c-4251-b7d1-d3d913c47777",
                    "title": "Eliseo Cabrera",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937478333333333,
                            -75.27899333333333
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "64d91916-5287-48ac-ace6-e7b21c46a071",
                    "title": "I.E. Juan De Cabrera",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.920961388888889,
                            -75.27428833333333
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "4d84a71c-a84d-4029-a2ca-46f1e4269dce",
                    "title": "Alfonso Lopez",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921885,
                            -75.27111972222222
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "43f21bd4-e1cb-44c3-95e7-1dd8e2486fd4",
                    "title": "Sur Orientales",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922695210721563,
                            -75.2639877983117
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "a254205c-2864-41ee-a069-826f42934e93",
                    "title": "Ventilador",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923666411729648,
                            -75.27448121712828
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "9dd2ffea-8e96-458b-bc95-9def6ce46b8d",
                    "title": "I.E. Liceo De Santa Librada",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943985277777778,
                            -75.2980063888889
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "3ee59a8f-7a0d-4fd8-8a59-d916c241a550",
                    "title": "El Triangulo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944941388888889,
                            -75.30764888888889
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "7edf9734-ce65-44f2-b89d-935aca77181f",
                    "title": "I.E. Luis Ignacio Andrade",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.947517777777778,
                            -75.29143888888889
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "4dae3a1f-c5ba-44c4-8fb1-43df54c01cac",
                    "title": "Eugenio Salas",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.947515000000001,
                            -75.29143916666666
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "cbd75ff5-8520-41fb-9b9d-3b9737f98f3e",
                    "title": "La Jagua (I.E Maria Auxiladora Fortalecillas)",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.984444444444445,
                            -75.21826944444445
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "fc2a0093-dbf4-4f3a-8bb1-466b4ea3ede8",
                    "title": "I.E. Maria Cristina Arango",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946854265467184,
                            -75.28908188572694
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "0e3d843e-7b7a-4fcc-875f-4edec3dbfb7b",
                    "title": "Mi Peque\u00f1o Mundo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948111111111111,
                            -75.28953888888888
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "eb7a0bb3-31a3-4e35-9ea6-7515efc2067d",
                    "title": "Los Pinos",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.956269444444445,
                            -75.28064888888889
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "dca21fff-a1bd-4296-8ad5-3113e6f9ad7f",
                    "title": "I.E. Misael Pastrana Borrero",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942146388888889,
                            -75.25118111111111
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "a19481b4-3b5c-4aad-8f82-9688d64ef97e",
                    "title": "La Rioja",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94193700810553,
                            -75.25451597860392
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "de00f594-3984-41cb-9942-12e97932e4cb",
                    "title": "I.E. Oliverio Lara Borrero",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912602222222222,
                            -75.27499583333334
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "464914f9-08e8-405c-bf51-a96a26214a70",
                    "title": "Manuela Beltran",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.916652777777777,
                            -75.27150277777778
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "c41da10b-6047-421c-b136-0027b9407774",
                    "title": "Santa Isabel",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.914623055555555,
                            -75.27481972222222
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "036c5472-ab7b-44df-a6d6-f2e250a741df",
                    "title": "Timanco",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.91133861111111,
                            -75.27425444444444
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "9b768504-a2af-40db-8a48-46a1c10cae07",
                    "title": "I. E. Promocion Social",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.955203333333334,
                            -75.29579194444445
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "ff375da8-9e54-4ff4-94dd-cd44038c1ccb",
                    "title": "Colombo Andino",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.956862777777778,
                            -75.29576861111111
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "c04ba2bd-eef6-45a8-8546-5146dcbae1d1",
                    "title": "Contralor\u00eda General",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.95575388888889,
                            -75.29595888888889
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "cf4e0268-9105-406a-abc1-94864564c79b",
                    "title": "Las Mercedes",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.959517335130188,
                            -75.29465473763415
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "4ae97e52-5886-4ec5-a18d-bfb63cfc2e7f",
                    "title": "I.E. Ricardo Borrero Alvarez",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9248125,
                            -75.28710444444444
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "764c8804-a1e7-4ad3-9c27-7a96d20403d7",
                    "title": "Jard\u00edn Infantil Nacional",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.920761337141732,
                            -75.28957789974908
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "5c194570-e2f8-42e9-a1a1-f8564bf47c71",
                    "title": "Oriente",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922603611111112,
                            -75.28478111111112
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "d7348a69-94eb-4907-a14f-30081db8c736",
                    "title": "Ahuyamales (I.E Roberto Duran Alvira)",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936891666666666,
                            -75.02453888888888
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "ac7f6e3b-2e30-4778-9396-cb86ed34f838",
                    "title": "I.E. Rodrigo Lara Bonilla Megacolegio",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.899237799193513,
                            -75.26415680764732
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "d4276c00-c371-4411-8278-fdfa54c4f680",
                    "title": "Blanca Motta Salas",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924703368888213,
                            -75.28085149056413
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "2c52956c-b19e-41c1-a3bd-e8a62f04c88f",
                    "title": "Francisca Borrero de Perdomo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921690497952702,
                            -75.28052468252139
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "e66c42cc-52cb-4a20-bd84-64f12dd115e8",
                    "title": "Jorge Villamil Cordovez",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92186267472932,
                            -75.27916530263093
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "b3b956b3-81f7-4ee9-8856-1aedff232586",
                    "title": "Oliverio Lara Borrero (i.E. Rodrigo Lara)",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.919933755245974,
                            -75.27785094720318
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "78813aad-3882-4710-8d07-54d5426d30c1",
                    "title": "I.E. San Antonio de Anaconia",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925469444444444,
                            -75.10053055555555
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "47c29ca0-7f02-45b0-98e2-7ff02d876dc9",
                    "title": "Canoas",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.866901077039399,
                            -75.09634600327985
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "637058a8-84b1-47bc-95ab-3598e27f1ff6",
                    "title": "La Espiga",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92621113939212,
                            -75.04612837124313
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "015fe1e0-739b-4c63-bc0c-1f649dc5b4c5",
                    "title": "Roblal",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.903925,
                            -75.06869444444445
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "1cf38a5e-85f3-41e1-9c17-a66d1dd78072",
                    "title": "Santa Lucia",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922124390845243,
                            -75.11232051380964
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "dd51964f-79eb-4136-bcbd-a250abbdaf12",
                    "title": "Santa Librada",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.90064,
                            -75.07765638888888
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "e61f9b6d-d849-4ad4-9b84-ebc30e00a16d",
                    "title": "I.E. San Luis Beltran",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.081913888888889,
                            -75.48468333333334
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "41f4c26e-5244-4b93-9ef5-a31a6387b775",
                    "title": "La Libertad",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.051638888888889,
                            -75.49414722222222
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "c4a9188a-3796-4f4d-b862-982a68c5200a",
                    "title": "Palmar",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.080631666666667,
                            -75.4674625
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "726f2ff9-f60e-444a-a3a5-1823114ed020",
                    "title": "Pi\u00f1uelo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.028291666666667,
                            -75.47961944444445
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "04b1bb0e-f005-410c-ac4e-25a76535bb32",
                    "title": "I.E. Nacional Santa Librada",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935320833333334,
                            -75.28365861111111
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "5be6d101-4d42-4d44-a570-23bf0154d0ff",
                    "title": "Gabino Charry",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933715833333333,
                            -75.28369222222221
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "2cf8329c-13b7-4b17-903c-080a02b0e83e",
                    "title": "Martha Tello",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941216666666667,
                            -75.28380555555556
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "f96479d3-19ed-4d7d-8c13-d49497d8ee67",
                    "title": "I.E. Instituto Tecnico I.P.C. Andres Rosa",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922913333333332,
                            -75.26808777777778
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "1d36b6f9-907c-4c68-93e7-e9cdd6fc1faa",
                    "title": "Jardin Picardias",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925771876754789,
                            -75.26717527981836
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "7b395359-a887-40d7-bb03-80b9b634b327",
                    "title": "La Gaitana",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925797166270398,
                            -75.26907619227434
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "3240ccbe-a283-4365-8ec0-249cbefbeb77",
                    "title": "La Paz",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925055928935737,
                            -75.25841044252367
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "3accc691-a22b-47cb-90ef-16fc515b931b",
                    "title": "Picardias Primaria",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925792338621991,
                            -75.26683656702693
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "e3905bad-2012-4edf-8f24-81abedca2462",
                    "title": "Rafael Azuero",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925006111111111,
                            -75.26017583333334
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 31,
                    "id": "a7df61b0-830b-4e42-8438-960e29ee695b",
                    "title": "Alta Libertad",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.043374,
                            -75.516549
                        ]
                    }
                }
            ]
        }';
        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('educational_centers')->insert([
                'name' => $Data['title'],
                'uuid'=> Str::uuid(),
                'position' => json_encode($Data['geometry']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } 
    }
}

<?php

namespace Database\Seeders\villavicencio;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlarmsTableSeeder extends Seeder
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
              "name": "Barzal Alto",
              "address": "Calle 37 Carrera 40",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.1464485,
                        -73.641353
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Barzal Bajo",
              "address": "Calle 37 Nº 34-42",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.149519,
                        -73.639435
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "San Benito",
              "address": "Calle 23 Nº 36-40",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.13666,
                        -73.632661
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Bochica II",
              "address": "Calle 11a Nº19c-05",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.132329,
                        -73.621957
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Estero",
              "address": "Calle 7a Nº 10B-35",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.1306919,
                        -73.6125492
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Bello Horizonte",
              "address": "Calle 15a Nº 14B-22",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.13399,
                        -73.961237
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Carulu",
              "address": "Calle 3D Nº 29a-03",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.119868,
                        -73.628243
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cantarrana II",
              "address": "Carrera 19 Nº 12-39",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.133272,
                        -73.622254
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Antonio Pinilla",
              "address": "Calle 22 Nº 18-09",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.13829,
                        -73.62332
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Industrial",
              "address": "Carrera 22 Nº 37b-86",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.15318,
                        -73.627621
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Maranatha",
              "address": "Calle 18b Nº 43a-04",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.106553,
                        -73.649732
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Santa Helena II",
              "address": "Carrera 17a Nº 35b-10",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.148217,
                        -73.617402
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "La Primavera",
              "address": "Carrera 20c Nº 8-41",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.12976,
                        -73.62112
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Jordan",
              "address": "Carrera 20c Nº 39a-08",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.152531,
                        -73.622716
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Porvenir",
              "address": "Calle 26B Nº 25-52",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.144355,
                        -73.628235
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Santa Josefa",
              "address": "Calle 49a Nº 45-79",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.161848,
                        -73.652394
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Hacaritama",
              "address": "Carrera 18 Nº 3B-03",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.126027,
                        -73.61509
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Villa Julia",
              "address": "Calle 37 Nº 25-52",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.15055,
                        -73.631766
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Santa Ines",
              "address": "Carrera 23 Nº 37-77(Fábrica de Colchones)",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.15088,
                        -73.62842
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Villas del Palmar",
              "address": "Calle 3a Nº28b-41",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.119644,
                        -73.624423
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Estero Alto",
              "address": "Calle 11 Nº 15c-17",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.132485,
                        -73.617925
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Estero Bajo",
              "address": "Calle 10 Nº 12-58",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.132146,
                        -73.612379
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Camelias",
              "address": "Carrera 8 Nº 20-23",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.137651,
                        -73.60878
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Hierba Buena",
              "address": "Calle 40b Nº 14-44",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.151437,
                        -73.613767
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Los Maracos",
              "address": "Calle 24 Este Nº 15-24",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.139302,
                        -73.616205
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Vencedores",
              "address": "Calle 47 carrera 18 Mz A Casa 55",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.15157,
                        -73.601206
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Vereda del Carmen",
              "address": "Vereda el Carmen",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.137311,
                        -73.675282
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Industrial",
              "address": "Carrera 21a Nº 37b-08",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153104,
                        -73.626257
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Barzal",
              "address": "Calle 35 Nº 35-49",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147692,
                        -73.638332
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Villa Bolivar",
              "address": "Calle 7 Nº 37-33",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.123198,
                        -73.633203
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "El Triunfo",
              "address": "Calle 46 Nº 33-46",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.160009,
                        -73.641154
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "La Campina",
              "address": "Calle 49 Nº 46-66 Barrio La Campiña",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.161131,
                        -73.653123
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Porvenir",
              "address": "Calle 31 Nº 29-100 Alkosto  Distri Camperos",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14497,
                        -73.63301
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Barzal",
              "address": "Barrio Barzal",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.148302,
                        -73.637917
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Manatial",
              "address": "Calle 39 N°6C-53B ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147722,
                        -73.605867
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "SEIS DE ABRIL",
              "address": "Carrera 8° N° 32-07",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.145019,
                        -73.608205
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "EL RECREO III",
              "address": "Calle 29A N° 10A-07 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14228,
                        -73.61095
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "URBANIZACION CASTILLA",
              "address": "Carrera 13 Con 13A ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.133913,
                        -73.615634
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "GUATAPE I",
              "address": "Diagonal 30 Sur N° 40-55",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.09859,
                        -73.65071
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ALTOS DE GUATAPE",
              "address": "Calle 26 Sur N° 38C-03 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14229,
                        -73.61095
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "VILLA DEL RIO I",
              "address": "Calle 24 A Sur",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.10382,
                        -73.65305
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "VILLA DEL RIO II",
              "address": "Calle 23b Sur",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.10405,
                        -73.65236
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "GAVIOTAS",
              "address": "Carrera 11 Este N° 23-04 Sur",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.1154,
                        -73.597224
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "El Recreo",
              "address": "Calle 31g N° 11b-27 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.145617,
                        -73.610783
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CANTARRANA II",
              "address": "Carrera 19a N° 12-08",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.133067,
                        -73.622097
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "MENEGUA",
              "address": "Calle 25 N°6-21",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.1392829,
                        -73.6078793
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "GUADALAJARA",
              "address": "calle 17C N° 11-70",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.136259,
                        -73.612083
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CARULU",
              "address": "Calle 3D N° 29a-03",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.12033,
                        -73.62634
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "MADRIGAL",
              "address": "Carrera 17 N° 41-02",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.152711,
                        -73.615647
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "LA ESPERANZA SEPTIMA ETAPA",
              "address": "Calle 11a N° 31B-03",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.12944,
                        -73.635606
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "VILLA ORTIZ ETAPA I",
              "address": "calle 19 N° 12C-32",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.1374,
                        -73.61404
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "JUAN PABLO II",
              "address": "Carrera 31 N° 16-03",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.103963,
                        -73.6226156
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "GUATAPE II",
              "address": "Calle 28a Sur N° 35-46",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.10077,
                        -73.65408
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BRISAS DE LA ESPERANZA",
              "address": "Calle 12B N° 39-111",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.12996,
                        -73.6334
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Barzal Bajo",
              "address": "Calle 36 N° 33-28 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.149033,
                        -73.638214
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "la Alborada",
              "address": "Calle 4D N° 24-135 Esquina",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.123082,
                        -73.622319
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Bello Horizonte",
              "address": "Calle 15a N° 8-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.133167,
                        -73.609594
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Gaviotas",
              "address": " Carrera 12A Este N° 22A - 06 Sur",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.115914,
                        -73.596344
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Catumare",
              "address": "Carrera 45a N° 21a-33 Sur ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.10501,
                        -73.65336
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "los Comuneros",
              "address": "Calle 10 N° 29-32 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.125336,
                        -73.627919
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "el Delirio",
              "address": "Calle 40a N° 19-25 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.142531,
                        -73.583705
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Popular",
              "address": "Carrera 12 N° 26-40",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.141625,
                        -73.612317
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "la Serrania",
              "address": "Carrera 26 N° 5C-15",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.124238,
                        -73.6246
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "La Vega",
              "address": "Calle 5 N° 30-34",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.12113,
                        -73.6313
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Prados de Siberia",
              "address": "Calle 38 N° 16-16 Este",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.138907,
                        -73.587982
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Valles de Aragon",
              "address": "Manzana G Casa 14",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.116755,
                        -73.603832
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cantarrana 4",
              "address": "Calle 14 N° 18E 12",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.1346,
                        -73.621106
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "las Americas",
              "address": "Carrera 60 N° 6B-29 Sur",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.125,
                        -73.65303
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "La Vega",
              "address": "Calle 5B N° 33b-52",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.121891,
                        -73.631045
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Kirpas",
              "address": "Carrera 19a N° 22a-25 Sur",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.11613,
                        -73.584876
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Madrigal",
              "address": "Calle 41 N° 15-72",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14963,
                        -73.615044
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "San Antonio Sector I",
              "address": "Calle 13a N° 40a-50",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.119928,
                        -73.563605
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Nuevo Horizonte",
              "address": "Calle 20a Sur N° 38-46 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.104293,
                        -73.646719
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Villa Claudia",
              "address": "Calle 10a 31-57 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.125601,
                        -73.629046
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "La Esperanza 5 Etapa",
              "address": "Calle 8 N° 41-35 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.125254,
                        -73.634204
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "la Bastilla",
              "address": "Calle 36a N° 14b-64 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.148134,
                        -73.615325
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Dona Luz",
              "address": "Carrera 21 N° 9 -93 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.115857,
                        -73.608037
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "El Emporio",
              "address": "Calle 40A N° 25 -03 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.157435,
                        -73.634341
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Panorama",
              "address": "Calle 47a N° 41-37",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.160872,
                        -73.649679
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "la Esperanza I Etapa",
              "address": "Calle 12B N° 46-43",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.130769,
                        -73.635489
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Madrigal",
              "address": "Calle 41a N° 16-51",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14963,
                        -73.615044
                      ]
                    }
                  }
                ]
              }
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('alarms')->insert([
                'name' => $Data['name'],
                'uuid'=> Str::uuid(),
                'address' => $Data['address'],
                'pointCoordinates' => json_encode($Data['pointCoordinates']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

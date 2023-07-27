<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
          "array":[
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
                        -73.641353,
                        4.1464485
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Barzal Bajo",
              "address": "Calle 37 N\u00ba 34-42",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.639435,
                        4.149519
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "San Benito",
              "address": "Calle 23 N\u00ba 36-40",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.632661,
                        4.13666
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Bochica II",
              "address": "Calle 11a N\u00ba19c-05",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.621957,
                        4.132329
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Estero",
              "address": "Calle 7a N\u00ba 10B-35",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6125492,
                        4.1306919
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Bello Horizonte",
              "address": "Calle 15a N\u00ba 14B-22",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.961237,
                        4.13399
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Carulu",
              "address": "Calle 3D N\u00ba 29a-03",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.628243,
                        4.119868
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cantarrana II",
              "address": "Carrera 19 N\u00ba 12-39",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.622254,
                        4.133272
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Antonio Pinilla",
              "address": "Calle 22 N\u00ba 18-09",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.62332,
                        4.13829
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Industrial",
              "address": "Carrera 22 N\u00ba 37b-86",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.627621,
                        4.15318
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Maranatha",
              "address": "Calle 18b N\u00ba 43a-04",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.649732,
                        4.106553
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Santa Helena II",
              "address": "Carrera 17a N\u00ba 35b-10",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.617402,
                        4.148217
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "La Primavera",
              "address": "Carrera 20c N\u00ba 8-41",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.62112,
                        4.12976
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Jordan",
              "address": "Carrera 20c N\u00ba 39a-08",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.622716,
                        4.152531
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Porvenir",
              "address": "Calle 26B N\u00ba 25-52",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.628235,
                        4.144355
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Santa Josefa",
              "address": "Calle 49a N\u00ba 45-79",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.652394,
                        4.161848
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Hacaritama",
              "address": "Carrera 18 N\u00ba 3B-03",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.61509,
                        4.126027
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Villa Julia",
              "address": "Calle 37 N\u00ba 25-52",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.631766,
                        4.15055
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Santa Ines",
              "address": "Carrera 23 N\u00ba 37-77(F\u00e1brica de Colchones)",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.62842,
                        4.15088
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Villas del Palmar",
              "address": "Calle 3a N\u00ba28b-41",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.624423,
                        4.119644
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Estero Alto",
              "address": "Calle 11 N\u00ba 15c-17",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.617925,
                        4.132485
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Estero Bajo",
              "address": "Calle 10 N\u00ba 12-58",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.612379,
                        4.132146
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Camelias",
              "address": "Carrera 8 N\u00ba 20-23",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.60878,
                        4.137651
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Hierba Buena",
              "address": "Calle 40b N\u00ba 14-44",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.613767,
                        4.151437
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Los Maracos",
              "address": "Calle 24 Este N\u00ba 15-24",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.616205,
                        4.139302
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
                        -73.601206,
                        4.15157
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
                        -73.675282,
                        4.137311
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Industrial",
              "address": "Carrera 21a N\u00ba 37b-08",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.626257,
                        4.153104
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Barzal",
              "address": "Calle 35 N\u00ba 35-49",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.638332,
                        4.147692
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Villa Bolivar",
              "address": "Calle 7 N\u00ba 37-33",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.633203,
                        4.123198
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "El Triunfo",
              "address": "Calle 46 N\u00ba 33-46",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.641154,
                        4.160009
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "La Campina",
              "address": "Calle 49 N\u00ba 46-66 Barrio La Campi\u00f1a",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.653123,
                        4.161131
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Porvenir",
              "address": "Calle 31 N\u00ba 29-100 Alkosto  Distri Camperos",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.63301,
                        4.14497
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
                        -73.637917,
                        4.148302
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Manatial",
              "address": "Calle 39 N\u00b06C-53B ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.605867,
                        4.147722
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "SEIS DE ABRIL",
              "address": "Carrera 8\u00b0 N\u00b0 32-07",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.608205,
                        4.145019
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "EL RECREO III",
              "address": "Calle 29A N\u00b0 10A-07 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.61095,
                        4.14228
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
                        -73.615634,
                        4.133913
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "GUATAPE I",
              "address": "Diagonal 30 Sur N\u00b0 40-55",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.65071,
                        4.09859
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ALTOS DE GUATAPE",
              "address": "Calle 26 Sur N\u00b0 38C-03 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.61095,
                        4.14229
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
                        -73.65305,
                        4.10382
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
                        -73.65236,
                        4.10405
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "GAVIOTAS",
              "address": "Carrera 11 Este N\u00b0 23-04 Sur",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.597224,
                        4.1154
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "El Recreo",
              "address": "Calle 31g N\u00b0 11b-27 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.610783,
                        4.145617
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CANTARRANA II",
              "address": "Carrera 19a N\u00b0 12-08",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.622097,
                        4.133067
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "MENEGUA",
              "address": "Calle 25 N\u00b06-21",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6078793,
                        4.1392829
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "GUADALAJARA",
              "address": "calle 17C N\u00b0 11-70",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.612083,
                        4.136259
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CARULU",
              "address": "Calle 3D N\u00b0 29a-03",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.62634,
                        4.12033
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "MADRIGAL",
              "address": "Carrera 17 N\u00b0 41-02",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.615647,
                        4.152711
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "LA ESPERANZA SEPTIMA ETAPA",
              "address": "Calle 11a N\u00b0 31B-03",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.635606,
                        4.12944
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "VILLA ORTIZ ETAPA I",
              "address": "calle 19 N\u00b0 12C-32",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.61404,
                        4.1374
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "JUAN PABLO II",
              "address": "Carrera 31 N\u00b0 16-03",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6226156,
                        4.103963
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "GUATAPE II",
              "address": "Calle 28a Sur N\u00b0 35-46",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.65408,
                        4.10077
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BRISAS DE LA ESPERANZA",
              "address": "Calle 12B N\u00b0 39-111",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6334,
                        4.12996
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Barzal Bajo",
              "address": "Calle 36 N\u00b0 33-28 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.638214,
                        4.149033
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "la Alborada",
              "address": "Calle 4D N\u00b0 24-135 Esquina",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.622319,
                        4.123082
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Bello Horizonte",
              "address": "Calle 15a N\u00b0 8-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.609594,
                        4.133167
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Gaviotas",
              "address": " Carrera 12A Este N\u00b0 22A - 06 Sur",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.596344,
                        4.115914
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Catumare",
              "address": "Carrera 45a N\u00b0 21a-33 Sur ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.65336,
                        4.10501
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "los Comuneros",
              "address": "Calle 10 N\u00b0 29-32 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.627919,
                        4.125336
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "el Delirio",
              "address": "Calle 40a N\u00b0 19-25 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.583705,
                        4.142531
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Popular",
              "address": "Carrera 12 N\u00b0 26-40",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.612317,
                        4.141625
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "la Serrania",
              "address": "Carrera 26 N\u00b0 5C-15",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6246,
                        4.124238
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "La Vega",
              "address": "Calle 5 N\u00b0 30-34",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6313,
                        4.12113
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Prados de Siberia",
              "address": "Calle 38 N\u00b0 16-16 Este",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.587982,
                        4.138907
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
                        -73.603832,
                        4.116755
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cantarrana 4",
              "address": "Calle 14 N\u00b0 18E 12",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.621106,
                        4.1346
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "las Americas",
              "address": "Carrera 60 N\u00b0 6B-29 Sur",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.65303,
                        4.125
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "La Vega",
              "address": "Calle 5B N\u00b0 33b-52",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.631045,
                        4.121891
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Kirpas",
              "address": "Carrera 19a N\u00b0 22a-25 Sur",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.584876,
                        4.11613
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Madrigal",
              "address": "Calle 41 N\u00b0 15-72",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.615044,
                        4.14963
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "San Antonio Sector I",
              "address": "Calle 13a N\u00b0 40a-50",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.563605,
                        4.119928
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Nuevo Horizonte",
              "address": "Calle 20a Sur N\u00b0 38-46 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.646719,
                        4.104293
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
                        -73.629046,
                        4.125601
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "La Esperanza 5 Etapa",
              "address": "Calle 8 N\u00b0 41-35 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.634204,
                        4.125254
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "la Bastilla",
              "address": "Calle 36a N\u00b0 14b-64 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.615325,
                        4.148134
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Dona Luz",
              "address": "Carrera 21 N\u00b0 9 -93 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.608037,
                        4.115857
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "El Emporio",
              "address": "Calle 40A N\u00b0 25 -03 ",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.634341,
                        4.157435
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Panorama",
              "address": "Calle 47a N\u00b0 41-37",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.649679,
                        4.160872
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "la Esperanza I Etapa",
              "address": "Calle 12B N\u00b0 46-43",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.635489,
                        4.130769
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Madrigal",
              "address": "Calle 41a N\u00b0 16-51",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.615044,
                        4.14963
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
                'address' => $Data['address'],
                'pointCoordinates' => json_encode($Data['pointCoordinates'])
            ]);
        }
    }
}

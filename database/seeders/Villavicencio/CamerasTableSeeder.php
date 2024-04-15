<?php

namespace Database\Seeders\Villavicencio;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CamerasTableSeeder extends Seeder
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
          "array":  [
            {
              "name": "IGLESIA PORFIA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.082492168,
                        -73.6694145
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BARRIO MONTECARLO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.104435675,
                        -73.6564804
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "PUENTE UNION RECREO Y POPULAR",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.142513528,
                        -73.6124916
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ENTRADA M CENTAUROS",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.115452504,
                        -73.6343266
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ENTRADA LA SALLE",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.150838507,
                        -73.6408079
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CC VILLLA JULIA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.154000353,
                        -73.6353551
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "TRANSITO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.150313337,
                        -73.6206604
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CHANTILLY VIZCAYA - HACARITAMA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.12653531,
                        -73.6160647
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ESTADIO BOMBONERA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.139742765,
                        -73.6141847
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "PUENTE ESPERANZA ENTRE 6 Y 7",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.128946092,
                        -73.6314078
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "COLEGIO COFREM",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147111003,
                        -73.6198352
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BOMBA LA SABANA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.148066504,
                        -73.6246818
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BOMBA ESSO VIA MARACOS",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.135400999,
                        -73.6180555
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "COLEGIO ABRAHAM LINCOLN",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.143106706,
                        -73.6263363
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ENTRADA ALBORADA BOMBA TEXACO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.125115756,
                        -73.6193326
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BARRIO INDUSTRIAL",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153469819,
                        -73.6274772
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "LAVAUTOS LOS TIGRES",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147876665,
                        -73.6292444
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "COLEGIO FEMENINO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.135838412,
                        -73.6279773
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "MEGA COLEGIO LA RELIQUIA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.123763189,
                        -73.5424442
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "RELIQUIA CENTRO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.127308594,
                        -73.547041
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CALLE DE LAS FERRETERIAS",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.150179234,
                        -73.6343508
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ENTRADA RECREO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.146161609,
                        -73.611611
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "PORFIA BARRIO PLAYITA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.07908049,
                        -73.6742013
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BARRIO SANTA FE",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.149752104,
                        -73.6254501
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "PORFIA GAVIONES",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.083909619,
                        -73.6715228
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "RESPALDO CLINICA META",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.144027455,
                        -73.6367259
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "HATO GRANDE",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147121965,
                        -73.6176239
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "PORFIA BANCO CONGENTE",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.078543968,
                        -73.6694246
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CAMELIAS PLANCHON",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.137103722,
                        -73.6105586
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "PLAZOLETA LOS CENTAUROS",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.151005058,
                        -73.6361089
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "IGLESIA BUQUE",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.137608398,
                        -73.6476916
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "LLANO ABASTOS",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.123176586,
                        -73.6117336
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "SEPTIMA BRIGADA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.119375462,
                        -73.6153347
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ETELL",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.13113547,
                        -73.6285029
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "GAITAN MOTELES",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.143131182,
                        -73.6285841
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "MEGA COLEGIO CALDAS",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.148978012,
                        -73.6317051
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BARRIO VILLA JULIA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153025932,
                        -73.6322248
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "EL NOGAL",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.139431758,
                        -73.625789
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "VILLA SUAREZ",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.154188794,
                        -73.615248
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BARRIO CALAMAR",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153491165,
                        -73.6132963
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BARRIO PLAYA RICA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.107297738,
                        -73.660721
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BARRIO ANTONIO PINILLA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.133186653,
                        -73.5885898
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BOMBEROS",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153995923,
                        -73.6344848
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ENTRADA POPULAR CEIBA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.141934227,
                        -73.6170945
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ENTRADA COVISAN",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.137229625,
                        -73.5867173
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "7 DE AGOSTO PLAZA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14146709,
                        -73.6376209
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "IGLESIA JORDAN",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.152681062,
                        -73.6219415
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "P SALUD BARRIO COMUNEROS",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.12396548,
                        -73.6264263
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "VILLA SUAREZ",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.133919409,
                        -73.6376273
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BARRIO CALAMAR",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153491165,
                        -73.6132963
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "PARQUE FUNDADORES",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.123398069,
                        -73.6427047
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "VILLA DEL SOL",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.139693475,
                        -73.6084591
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "SAN JOSE ENTRADA PRINCIPAL",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147040476,
                        -73.6406753
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CAUDAL ALTO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.159507285,
                        -73.6390251
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CAI GALAN",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.155571492,
                        -73.6565583
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BARRIO EL RETIRO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.141626625,
                        -73.6243205
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "REGISTRADURIA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.150503866,
                        -73.639455
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "SAN JOSE, (via BARZAL Bajo)",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147608061,
                        -73.6400788
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ENTRADA MONTECARLO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.098903735,
                        -73.6551367
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "HOTEL BAHIA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.133879219,
                        -73.613117
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ENTRADA BRISAS DE GUATIQUIA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153925884,
                        -73.6273276
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CHANTILLY VILLA BOLIVAR",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.123404207,
                        -73.6336132
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BARRIO ESTERO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.129288068,
                        -73.6129116
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "POLIDEPORTIVO BRISAS GUATIQUIA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.155344425,
                        -73.6286006
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "BARRIO 7 DE AGOSTO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14128166,
                        -73.6389936
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "PUENTE LA CRUZ",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.150079161,
                        -73.6395551
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "PIEL CANELA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.141316296,
                        -73.6318753
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ENTRADA CANTA RANA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.134614751,
                        -73.6221623
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "DIAN",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.150873462,
                        -73.6374085
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "COLEGIO BARRIO SAN JOSE",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14791563,
                        -73.6432183
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "PLAZA DE MERCADO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.151647192,
                        -73.6330589
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "EXITO VECINO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.151963462,
                        -73.6351372
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CLINICA MARTHA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.146931616,
                        -73.6389157
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "GLORIETA DAS",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14454629,
                        -73.6433724
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "EXITO DE LA SABANA",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.126589895,
                        -73.6378572
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "MANANTIAL",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.145280801,
                        -73.6063572
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CALLE 36 DIVINO NIÑO",
              "address": "PU",
              "estado": "funcionando",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.151220681,
                        -73.6348115
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
        //constante de usrl
        $url = 'https://villavicencio.medusaapi.online/api/v1/ver-video1';
        foreach ($dataArray['array'] as $Data) {

            DB::table('cameras')->insert([
                'name' => $Data['name'],    
                'uuid'=> Str::uuid(),
                'address' => $Data['address'],
                'url' => $url,
                'state' => $Data['estado'],
                'latitude' => $Data['pointCoordinates']['features'][0]['geometry']['coordinates'][0],
                'longitude' => $Data['pointCoordinates']['features'][0]['geometry']['coordinates'][1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

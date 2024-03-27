<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PollingPlaceTableSeeder extends Seeder
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
              "name": "Col. Nstr Sra de la Sabiduria",
              "address": "Cl 40 N° 31-42",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153038,
                        -73.638124
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Terminal de Transportes",
              "address": "Cr 1 N° 15-05",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.132268,
                        -73.604002
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Gilberto Alzate Avendano",
              "address": "Cr 30a Cl 5a",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.122657,
                        -73.628154
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Carcel",
              "address": "Transversal 26c N° 22a-14",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.144447,
                        -73.625371
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Santa Ines",
              "address": "Cl 37a N° 24-04",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.151709,
                        -73.62917
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Colegio Catumare",
              "address": "Cr 46 Cl 18 Sur",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.108823,
                        -73.652665
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Universidad de los Llanos",
              "address": "Cl 37 N° 41-02",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.145918,
                        -73.642395
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Isaac Tacha",
              "address": "Km 8 Vía Catama",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.132658,
                        -73.552276
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Departamental de la Esperanza",
              "address": "Cr 45 N° 13b-25",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.131653,
                        -73.634207
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Luis Carlos Galan",
              "address": "Cr 40 N° 51-10",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.083761,
                        -73.667807
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Villa Olimpica",
              "address": "Cr 19",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.1395,
                        -73.617888
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Antonio Narino",
              "address": "Cl 45 N° 39-40",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.160147,
                        -73.647829
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Eduardo Carranza",
              "address": "Cl 25 N° 12a-17",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.140174,
                        -73.614353
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Pipiral",
              "address": "Pipiral",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.201293,
                        -73.726229
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Narciso Matus Torres",
              "address": "Cr 14 N° 40b-02",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.15123,
                        -73.613088
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Antony Phiipps",
              "address": "Cr 37 Cl 22a",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.135918,
                        -73.632755
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Colegio Juan B. Caballero M.",
              "address": "Km 1 Nueva Via Bogota",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.123555,
                        -73.649341
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Alberto Lleras Camargo",
              "address": "Cl 5a N° 10a-21",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.129961,
                        -73.611703
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. San Francisco De Asis",
              "address": "Cl 11 N°25-15",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.126569,
                        -73.626665
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Colegio Cofrem",
              "address": "Av.circunvalar19-55 Via Catama",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147486,
                        -73.620789
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Escuela Las Gaviotas",
              "address": "Cl 23 Sur N°10- 76",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.115589,
                        -73.597561
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Rincon De Pompeya",
              "address": "Rincon De Pompeya",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.040722,
                        -73.635167
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Escuela Francisco Miranda",
              "address": "Cl 35 N° 29-09",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.149307,
                        -73.635694
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Megacolegio La Reliquia",
              "address": "Br. La Reliquia",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.122942,
                        -73.541575
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. German Arciniegas",
              "address": "Cr 47b N° 7b-20",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.127089,
                        -73.636221
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col De Bachillerato Femenino",
              "address": "Cr 33 N° 18 A-43",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.136457,
                        -73.627768
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Aca.mil.jose Antonio Paez",
              "address": "Calle 24a No. 40b - 27",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.101207,
                        -73.650353
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Alto De Pompeya",
              "address": "Alto De Pompeya",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.062244,
                        -73.427489
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Colegio La Salle",
              "address": "Cl 39 N° 34-56",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.150678,
                        -73.640991
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Jorge Eliecer Gaitan",
              "address": "Cl 36a N° 17-0",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.138281,
                        -73.585991
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "I.e. La Alborada",
              "address": "Cr 25 Cl 48",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.12182,
                        -73.621418
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Megacol.porfia-pinares Del Or",
              "address": "Cl 67 Sur Cr 47",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.076993,
                        -73.673211
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Colegio Don Bosco",
              "address": "Cl 14 N° 42-70",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.1349,
                        -73.6425
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Escuela Las Camelias",
              "address": "Cl 19 N° 8-62",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.137172,
                        -73.609218
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Unidad Basica 6 De Abril",
              "address": "Cl 32 Cr 6",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14222,
                        -73.607504
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Abrahan Lincoln",
              "address": "Cl 25 N° 23-150",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.142068,
                        -73.626523
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "I.e. Francisco Arango",
              "address": "Cl 33 B N° 39-55",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.143803,
                        -73.639866
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Manuela Beltran",
              "address": "Cl 25 N° 6-115",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.139661,
                        -73.612114
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Esc. Jhon F. Kennedy",
              "address": "Cr 46 N° 11- 28",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.128951,
                        -73.634593
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Buenavista",
              "address": "Buenavista",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.166323,
                        -73.68301
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Inst. Educativo 12 De Octubr",
              "address": "Cl 46 N°50",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.158698,
                        -73.6516
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Escuela La Ceiba",
              "address": "Cl 30 Cr 15",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.143826,
                        -73.616314
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Esc. Nva Arnulfo Briceno",
              "address": "Ciudadela San Antonio",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.123189,
                        -73.563194
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col.General Santander",
              "address": "Transversal 25 N° 39d-46",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.156926,
                        -73.633715
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Polideportivo Villa Florez",
              "address": "La Azotea",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.149667,
                        -73.656516
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Esc. Antonio Ricaurte",
              "address": "Cr 24c N°26c-09",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.137142,
                        -73.626019
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Hogar Infantil 20 de Julio",
              "address": "Cl 27 N° 22C-39",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.146734,
                        -73.62661
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Esc. San Carlos",
              "address": "Mz 1 Casa 1",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.1451533,
                        -73.5833524
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col.Miguel Angel Martin",
              "address": "Cr 25 N° 15-60",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.131983,
                        -73.627598
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Esc. Los Centauros",
              "address": "Cl 9 Cr 27-28",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.113525,
                        -73.6130435
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Multifamiliares Centauros",
              "address": "Cl 4 Sur N° 35-94",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.112424,
                        -73.631458
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Apiay",
              "address": "Vereda Apiay",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.090467,
                        -73.559629
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Esc. Policarpa Salavarrieta",
              "address": "Cl 25 N° 42-22",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.158439,
                        -73.637835
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Bemposta",
              "address": "Vía Acacias",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.079224,
                        -73.695751
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "La Concepción",
              "address": "La Cuncia",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.051694,
                        -73.741269
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Servita",
              "address": "Servita",
              "potencialWomen": 850,
              "potencialMen": 950,
              "totalVotes": 1800,
              "tables": 20,
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.186423,
                        -73.697844
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
            DB::table('polling_places')->insert([
                'name' => $Data['name'],
                'uuid'=> Str::uuid(),
                'address' => $Data['address'],
                "potential_women" => $Data['potencialWomen'],
                "potential_men" => $Data['potencialMen'],
                "total_votes" => $Data['totalVotes'],
                "tables" => $Data['tables'],
                'latitude' => $Data['pointCoordinates']['features'][0]['geometry']['coordinates'][0],
                'longitude' => $Data['pointCoordinates']['features'][0]['geometry']['coordinates'][1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

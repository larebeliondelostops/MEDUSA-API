<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            "array":[
            {
              "name": "Col. Nstr Sra de la Sabiduria",
              "address": "Cl 40 N\u00b0 31-42",
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
                        -73.638124,
                        4.153038
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Terminal de Transportes",
              "address": "Cr 1 N\u00b0 15-05",
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
                        -73.604002,
                        4.132268
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
                        -73.628154,
                        4.122657
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Carcel",
              "address": "Transversal 26c N\u00b0 22a-14",
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
                        -73.625371,
                        4.144447
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Santa Ines",
              "address": "Cl 37a N\u00b0 24-04",
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
                        -73.62917,
                        4.151709
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
                        -73.652665,
                        4.108823
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Universidad de los Llanos",
              "address": "Cl 37 N\u00b0 41-02",
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
                        -73.642395,
                        4.145918
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Isaac Tacha",
              "address": "Km 8 V\u00eda Catama",
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
                        -73.552276,
                        4.132658
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Departamental de la Esperanza",
              "address": "Cr 45 N\u00b0 13b-25",
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
                        -73.634207,
                        4.131653
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Luis Carlos Galan",
              "address": "Cr 40 N\u00b0 51-10",
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
                        -73.667807,
                        4.083761
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
                        -73.617888,
                        4.1395
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Antonio Narino",
              "address": "Cl 45 N\u00b0 39-40",
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
                        -73.647829,
                        4.160147
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Eduardo Carranza",
              "address": "Cl 25 N\u00b0 12a-17",
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
                        -73.614353,
                        4.140174
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
                        -73.726229,
                        4.201293
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Narciso Matus Torres",
              "address": "Cr 14 N\u00b0 40b-02",
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
                        -73.613088,
                        4.15123
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
                        -73.632755,
                        4.135918
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
                        -73.649341,
                        4.123555
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Alberto Lleras Camargo",
              "address": "Cl 5a N\u00b0 10a-21",
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
                        -73.611703,
                        4.129961
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. San Francisco De Asis",
              "address": "Cl 11 N\u00b025-15",
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
                        -73.626665,
                        4.126569
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
                        -73.620789,
                        4.147486
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Escuela Las Gaviotas",
              "address": "Cl 23 Sur N\u00b010- 76",
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
                        -73.597561,
                        4.115589
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
                        -73.635167,
                        4.040722
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Escuela Francisco Miranda",
              "address": "Cl 35 N\u00b0 29-09",
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
                        -73.635694,
                        4.149307
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
                        -73.541575,
                        4.122942
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. German Arciniegas",
              "address": "Cr 47b N\u00b0 7b-20",
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
                        -73.636221,
                        4.127089
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col De Bachillerato Femenino",
              "address": "Cr 33 N\u00b0 18 A-43",
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
                        -73.627768,
                        4.136457
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
                        -73.650353,
                        4.101207
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
                        -73.427489,
                        4.062244
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Colegio La Salle",
              "address": "Cl 39 N\u00b0 34-56",
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
                        -73.640991,
                        4.150678
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Jorge Eliecer Gaitan",
              "address": "Cl 36a N\u00b0 17-0",
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
                        -73.585991,
                        4.138281
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
                        -73.621418,
                        4.12182
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
                        -73.673211,
                        4.076993
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Colegio Don Bosco",
              "address": "Cl 14 N\u00b0 42-70",
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
                        -73.6425,
                        4.1349
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Escuela Las Camelias",
              "address": "Cl 19 N\u00b0 8-62",
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
                        -73.609218,
                        4.137172
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
                        -73.607504,
                        4.14222
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Abrahan Lincoln",
              "address": "Cl 25 N\u00b0 23-150",
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
                        -73.626523,
                        4.142068
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "I.e. Francisco Arango",
              "address": "Cl 33 B N\u00b0 39-55",
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
                        -73.639866,
                        4.143803
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col. Manuela Beltran",
              "address": "Cl 25 N\u00b0 6-115",
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
                        -73.612114,
                        4.139661
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Esc. Jhon F. Kennedy",
              "address": "Cr 46 N\u00b0 11- 28",
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
                        -73.634593,
                        4.128951
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
                        -73.68301,
                        4.166323
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Inst. Educativo 12 De Octubr",
              "address": "Cl 46 N\u00b050",
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
                        -73.6516,
                        4.158698
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
                        -73.616314,
                        4.143826
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
                        -73.563194,
                        4.123189
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col.General Santander",
              "address": "Transversal 25 N\u00b0 39d-46",
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
                        -73.633715,
                        4.156926
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
                        -73.656516,
                        4.149667
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Esc. Antonio Ricaurte",
              "address": "Cr 24c N\u00b026c-09",
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
                        -73.626019,
                        4.137142
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Hogar Infantil 20 de Julio",
              "address": "Cl 27 N\u00b0 22C-39",
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
                        -73.62661,
                        4.146734
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
                        -73.5833524,
                        4.1451533
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Col.Miguel Angel Martin",
              "address": "Cr 25 N\u00b0 15-60",
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
                        -73.627598,
                        4.131983
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
                        -73.6130435,
                        4.113525
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Multifamiliares Centauros",
              "address": "Cl 4 Sur N\u00b0 35-94",
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
                        -73.631458,
                        4.112424
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
                        -73.559629,
                        4.090467
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Esc. Policarpa Salavarrieta",
              "address": "Cl 25 N\u00b0 42-22",
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
                        -73.637835,
                        4.158439
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Bemposta",
              "address": "V\u00eda Acacias",
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
                        -73.695751,
                        4.079224
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "La Concepci\u00f3n",
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
                        -73.741269,
                        4.051694
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
                        -73.697844,
                        4.186423
                      ]
                    }
                  }
                ]
              }
            }
          ]
          
          
          }';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('pollingPlace')->insert([
                'name' => $Data['name'],
                'address' => $Data['address'],
                "potencialWomen" => $Data['potencialWomen'], 
                "potencialMen" => $Data['potencialMen'], 
                "totalVotes" => $Data['totalVotes'],
                "tables" => $Data['tables'],
                'pointCoordinates' => json_encode($Data['pointCoordinates'])
            ]);
        }
    }
}

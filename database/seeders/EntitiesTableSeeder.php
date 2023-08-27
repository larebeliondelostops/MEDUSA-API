<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EntitiesTableSeeder extends Seeder
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
              "name": "INST. EDUCATIVO 12 DE OCTUBR",
              "address": "CALLE 12 # 19-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.15138,
                        -73.6377
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "COLEGIO GENERAL SANTANDER",
              "address": "CALLE 15 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.15558,
                        -73.6406
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "ESCUELA POLICARPA SALAVARRIET",
              "address": "CALLE 16 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.15756,
                        -73.6386
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "COLEGIO ANTONIO NARIÑO",
              "address": "CALLE 17 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.13881,
                        -73.6516
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "COL NTRA SRA DE LA SABIDURIA",
              "address": "CALLE 18 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.15306,
                        -73.6381
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Sede Administrativa",
              "address": "CALLE 19 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14475,
                        -73.6379
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud La Esperanza",
              "address": "CALLE 20 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.13032,
                        -73.6375
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud Porfia",
              "address": "CALLE 21 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.08172,
                        -73.6693
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud Comuneros",
              "address": "CALLE 22 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.12397,
                        -73.6269
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud Recreo",
              "address": "CALLE 23 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14544,
                        -73.6106
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Hospital departamental",
              "address": "CALLE 24 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14372,
                        -73.6446
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Clínica Martha",
              "address": "CALLE 25 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14695,
                        -73.639
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Clínica Meta",
              "address": "CALLE 26 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.1446,
                        -73.6369
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Clínica Universidad Cooperativa",
              "address": "CALLE 27 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14819,
                        -73.6393
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud Alto Pompeya",
              "address": "CALLE 28 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.060567,
                        -73.428942
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud La Esperanza",
              "address": "CALLE 29 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.130914,
                        -73.63769
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud Morichal",
              "address": "CALLE 30 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.137375,
                        -73.584502
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud Porfia",
              "address": "CALLE 31 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.081542,
                        -73.670571
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud Recreo",
              "address": "CALLE 32 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.143518,
                        -73.611165
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud 12 de Octubre",
              "address": "CALLE 33 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.159317,
                        -73.651609
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud Comuneros",
              "address": "CALLE 34 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.123946,
                        -73.626665
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud Kirpas",
              "address": "CALLE 35 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.118907,
                        -73.585906
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud La Nohora",
              "address": "CALLE 36 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.07967,
                        -73.696636
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud Popular",
              "address": "CALLE 37 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.140197,
                        -73.614652
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Centro de Salud Barzal",
              "address": "CALLE 38 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.146666,
                        -73.638309
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Puesto de Salud Buenavista",
              "address": "CALLE 39 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.168947,
                        -73.680838
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Sede Administrativa",
              "address": "CALLE 40 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.142582,
                        -73.641758
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Puesto de Salud Rincon Pompeya",
              "address": "CALLE 12 # 19-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.038493,
                        -73.366101
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Hospital Departamental",
              "address": "CALLE 13 # 19-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.144622,
                        -73.643612
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Clinica Martha",
              "address": "CALLE 14 # 19-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147147,
                        -73.638913
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Clinica Cooperativa",
              "address": "CALLE 15 # 19-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.148295,
                        -73.639143
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Clinica Meta",
              "address": "CALLE 16 # 19-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.143877,
                        -73.637407
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Clinica Servimedicos",
              "address": "CALLE 17 # 19-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.142172,
                        -73.64085
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
            DB::table('entities')->insert([
                'name' => $Data['name'],
                'uuid'=> Str::uuid(),
                'address' => $Data['address'],
                'pointCoordinates' => json_encode($Data['pointCoordinates'])
            ]);
        }
    }
}

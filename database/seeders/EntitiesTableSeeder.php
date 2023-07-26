<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            "array":[
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
                        -73.6377,
                        4.15138
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
                        -73.6406,
                        4.15558
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
                        -73.6386,
                        4.15756
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "COLEGIO ANTONIO NARI\u00d1O",
              "address": "CALLE 17 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6516,
                        4.13881
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
                        -73.6381,
                        4.15306
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
                        -73.6379,
                        4.14475
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
                        -73.6375,
                        4.13032
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
                        -73.6693,
                        4.08172
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
                        -73.6269,
                        4.12397
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
                        -73.6106,
                        4.14544
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
                        -73.6446,
                        4.14372
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cl\u00ednica Martha",
              "address": "CALLE 25 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.639,
                        4.14695
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cl\u00ednica Meta",
              "address": "CALLE 26 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6369,
                        4.1446
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cl\u00ednica Universidad Cooperativa",
              "address": "CALLE 27 # 20-20",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6393,
                        4.14819
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
                        -73.428942,
                        4.060567
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
                        -73.63769,
                        4.130914
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
                        -73.584502,
                        4.137375
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
                        -73.670571,
                        4.081542
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
                        -73.611165,
                        4.143518
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
                        -73.651609,
                        4.159317
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
                        -73.626665,
                        4.123946
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
                        -73.585906,
                        4.118907
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
                        -73.696636,
                        4.07967
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
                        -73.614652,
                        4.140197
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
                        -73.638309,
                        4.146666
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
                        -73.680838,
                        4.168947
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
                        -73.641758,
                        4.142582
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
                        -73.366101,
                        4.038493
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
                        -73.643612,
                        4.144622
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
                        -73.638913,
                        4.147147
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
                        -73.639143,
                        4.148295
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
                        -73.637407,
                        4.143877
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
                        -73.64085,
                        4.142172
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
                'address' => $Data['address'],
                'pointCoordinates' => json_encode($Data['pointCoordinates'])
            ]);
        }
    }
}

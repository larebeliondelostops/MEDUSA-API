<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaiTableSeeder extends Seeder
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
              "name": "Cai. Buque",
              "address": "1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.645871,
                        4.136891
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cai. Catama",
              "address": "2",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.601354,
                        4.142744
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cai. Caudal",
              "address": "3",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.641032,
                        4.165108
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cai. Galan",
              "address": "4",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.656584,
                        4.1557
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cai. Ganadero",
              "address": "5",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.565435,
                        4.132944
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cai. Guatiquia",
              "address": "6",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.631119,
                        4.156319
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cai. La Esperanza",
              "address": "8",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6425,
                        4.12099
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cai. Maizaro",
              "address": "7",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.633103,
                        4.142716
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "Cai. Vanguardia",
              "address": "9",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.623553,
                        4.167184
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
            DB::table('cai')->insert([
                'name' => $Data['name'],
                'address' => $Data['address'],
                'pointCoordinates' => json_encode($Data['pointCoordinates'])
            ]);
        }
    }
}

<?php

namespace Database\Seeders\public_seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                        4.136891,
                        -73.645871
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
                        4.142744,
                        -73.601354
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
                        4.165108,
                        -73.641032
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
                        4.1557,
                        -73.656584
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
                        4.132944,
                        -73.565435
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
                        4.156319,
                        -73.631119
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
                        4.12099,
                        -73.6425
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
                        4.142716,
                        -73.633103
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
                        4.167184,
                        -73.623553
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
            DB::table('cai')->insert([
                'name' => $Data['name'],
                'uuid'=> Str::uuid(),
                'address' => $Data['address'],
                'pointCoordinates' => json_encode($Data['pointCoordinates'])
            ]);
        }
    }
}

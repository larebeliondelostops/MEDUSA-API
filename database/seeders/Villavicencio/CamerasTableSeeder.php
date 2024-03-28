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
          "array": [
            {
              "Latitud": 4.7087482,
              "Longitud": -74.0538622,
              "UBICACION": "Autopista norte calle 127a",
              "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.7602914,
                "Longitud": -74.02632129999999,
                "UBICACION": "Carrera 7 con Calle 183",
                "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.7627932,
                "Longitud": -74.0273232,
                "UBICACION": "Carrera 7 con Calle 186",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.8203639,
                "Longitud": -74.0347874,
                "UBICACION": "Carrera 7 con Calle 245",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.7152789,
                "Longitud": -74.0520977,
                "UBICACION": "Carrera 45 con Calle 183",
                "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.7152789,
                "Longitud": -74.0520977,
                "UBICACION": "Carrera 45 con Calle 224",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.8012227,
                "Longitud": -74.0351481,
                "UBICACION": "Carrera 7 con Calle 224",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.769724099999999,
                "Longitud": -74.04305130000002,
                "UBICACION": "Autopista Norte Calle 192",
                "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.7647547,
                "Longitud": -74.0445408,
                "UBICACION": "Autopista Norte Calle 187",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.6962964,
                "Longitud": -73.9631426,
                "UBICACION": "Via la Calera ",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.528659,
                "Longitud": -73.922968,
                "UBICACION": "Via Bogota a Choachi km 11",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.528659,
                "Longitud": -73.922968,
                "UBICACION": "Via Bogota a Choachi km 12",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.528659,
                "Longitud": -73.922968,
                "UBICACION": "Via Bogota a Choachi km 13",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.528659,
                "Longitud": -73.922968,
                "UBICACION": "Via Bogota a Choachi km 02",
                "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.5100381,
                "Longitud": -74.1178322,
                "UBICACION": "Calle 78 bis sur Carrera 14C bis",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.1491688,
                "Longitud": -73.6285475,
                "UBICACION": "Via Bogota a Villavicencio",
                "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.710988599999999,
                "Longitud": -74.072092,
                "UBICACION": "Via Villavicencio a Bogota ",
                "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.6050245,
                "Longitud": -74.1855748,
                "UBICACION": "Calle 65C sur con  Carrera 77G",
                "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.6051252,
                "Longitud": -74.1852619,
                "UBICACION": "Carrera 77G con Calle 65B sur",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.5852206,
                "Longitud": -74.1004512,
                "UBICACION": "Calle 17 con Carrera 137A",
                "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.5852206,
                "Longitud": -74.1004512,
                "UBICACION": "Calle 17 con Carrera 137A",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.5852206,
                "Longitud": -74.1004512,
                "UBICACION": "Calle 17 con Carrera 137A",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.7243042,
                "Longitud": -74.1231511,
                "UBICACION": "Calle 80 con Carrera 116B",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.6947594,
                "Longitud": -74.0878288,
                "UBICACION": "Calle 80 con Carrera 116C",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.7590374,
                "Longitud": -74.0773454,
                "UBICACION": "Calle 170 con Carrera 92",
                "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.7635019,
                "Longitud": -74.0447435,
                "UBICACION": "Autopista Norte con Calle 185",
                "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.7793983,
                "Longitud": -74.0415879,
                "UBICACION": "Autopista Norte con Calle 200 ",
                "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.676980,
                "Longitud": -74.034548,
                "UBICACION": "km 2 Via la Calera",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.487534,
                "Longitud": -74.106138,
                "UBICACION": "Carrera 6B Este con Calle 115 sur",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.492640,
                "Longitud": -74.104323,
                "UBICACION": "Carrera 1 Diagonal 98G sur",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.649271,
                "Longitud": -74.172145,
                "UBICACION": "Carrera 1 con Calle 97C sur",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.5165359,
                "Longitud": -74.0892955,
                "UBICACION": "Calle 81 bis sur con Carrera 15 bis Este",
                "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.505192699999999,
                "Longitud": -74.1127954,
                "UBICACION": "Carrera 1F con Calle 91 sur",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.514613499999999,
                "Longitud": -74.1212365,
                "UBICACION": "Calle 74b bis sur con Carrera 14U",
                "NOVEDAD": "sin senal"
            },
            {
                "Latitud": 4.7996605,
                "Longitud": -74.0462491,
                "UBICACION": "Calle 222 con Carrera 45 ",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.7797892,
                "Longitud": -74.0494239,
                "UBICACION": "Carrera 7 con Calle 201",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.7734381,
                "Longitud": -74.0484667,
                "UBICACION": "Calle 195 con Carrera45 ",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.7603315,
                "Longitud": -74.0403642,
                "UBICACION": "Carrera 45 con Diagonal 183A",
                "NOVEDAD": "funcionando"
            },
            {
                "Latitud": 4.7152789,
                "Longitud": -74.0520977,
                "UBICACION": "Carrera 45 con Calle 198",
                "NOVEDAD": "funcionando"
            }
          ]
        }

          ';

        $dataArray = json_decode($data, true);
        //constante de usrl
        $url = 'https://villavicencio.medusaapi.online/api/v1/ver-video1';
        $i = 0;
        foreach ($dataArray['array'] as $Data) {
          //nombre "camara 1", camara 2, etc
            $nombre = "Camara " . ($i + 1);
            DB::table('cameras')->insert([
                'name' => $nombre,
                'uuid'=> Str::uuid(),
                'address' => $Data['UBICACION'],
                'state' => $Data['NOVEDAD'],
                'url' => $url,
                'latitude' => $Data['Latitud'],
                'longitude' => $Data['Longitud'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

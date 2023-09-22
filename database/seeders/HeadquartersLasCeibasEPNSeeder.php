<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HeadquartersLasCeibasEPNSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::setDefaultConnection('neiva');

        $data = '        
        {
            "array": [
                {
                    "type": "Feature",
                    "markerType": 28,
                    "id": "46902545-a586-4590-a46c-352712de6eeb",
                    "title": "Sede Oficina Principal",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925579489799222,
                            -75.28698480413023
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 28,
                    "id": "f57fc786-5e90-43f8-9243-da74725f06bd",
                    "title": "Sede Kenedy",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937398488516358,
                            -75.27404439696546
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 28,
                    "id": "708f0467-9d94-4d71-931d-ee7e96547e14",
                    "title": "Sede Jardin",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940272512574209,
                            -75.27304227906777
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 28,
                    "id": "b1f246fa-dd6b-46d9-bb6e-a3ad2b9d5029",
                    "title": "Sede Recreo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935437485763309,
                            -75.21631299289288
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 28,
                    "id": "832ae0eb-7aef-4568-b28e-d630c807fb7b",
                    "title": "Reservorio El Recreo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931459803926304,
                            -75.17606579441777
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 28,
                    "id": "e65e27ca-0f05-44a8-b8da-cd2dcd068ec7",
                    "title": "Sede BocaToma El Guayabo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921052589804102,
                            -75.14933964075503
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 28,
                    "id": "8d062ac8-28a2-43c0-8e7c-d18081f036e8",
                    "title": "Sede Bocatoma El Tomo",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94642927491062,
                            -75.22024008105312
                        ]
                    }
                }
            ]
        }';
        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('headquarters_las_ceibas_e_p_n')->insert([
                'name' => $Data['title'],
                'uuid'=> Str::uuid(),
                'position' => json_encode($Data['geometry'])
            ]);
        } 
    }

}

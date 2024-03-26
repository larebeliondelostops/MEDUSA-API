<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class TrafficLightSeeder extends Seeder
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
                    "markerType": 25,
                    "id": "b45b49f5-4c95-4d89-8fa9-1f8e3e07182b",
                    "title": "CRA 33 CLL 24 SUR",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.902778847867167,
                            -75.2668046665373
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c28154d8-2edf-40eb-a596-6d9af404f222",
                    "title": "sem Inter CR 1  CLL 34",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.947455016398592,
                            -75.29810585114653
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "da38d8c9-99e1-474c-b2fd-39f9ced736dc",
                    "title": "Sem Inter CR 1 CLL 28",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944803619745869,
                            -75.29801562673097
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ef522873-df0b-4b94-bcd2-2846daf9700b",
                    "title": "sem Inter CR 2  Cll 64",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.962261657426409,
                            -75.29253360960378
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4fc9d8e5-6e1a-428d-9506-08578120526b",
                    "title": "Sem Inter CR7  CLL 64",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.961099522674047,
                            -75.28811705407647
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "047758ea-ce0c-4905-9352-6f48521e1ccf",
                    "title": "SEm Inter CR 52 CLL 19",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941437354784025,
                            -75.24800498073738
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "442d4999-a337-4e46-9169-2f662572be46",
                    "title": "SEm Inter CR 42 CLL 19",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940290341352192,
                            -75.25791475948988
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d889207a-1c00-4ec4-9dc5-380089fc6c30",
                    "title": "SEm Inter CR 52 CLL 8",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933964652937129,
                            -75.24599609513344
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d33d205f-7017-4af2-beec-562b05f222e8",
                    "title": "SEm Inter CR 29 CLL 20",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94071394851083,
                            -75.26935115245657
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "55a29612-47e1-406c-b9ed-81fefc94cb9e",
                    "title": "SEm Inter CR 16 CLL 18",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936794533450337,
                            -75.28166779813165
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8e7b81c6-2cf7-4b51-a555-4543926cce01",
                    "title": "sem Inter CR 2  Cll 70",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.965646285495543,
                            -75.29152533295812
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "21c8ee33-9806-4aab-8bc6-88f75dd43c8b",
                    "title": "Sem Inter CR 16 CLL 21",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940376120500105,
                            -75.28221141775391
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "241d13f6-6c02-4cc0-972d-19c0ba31594b",
                    "title": "SEm Inter CR 16 CLL 18",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936794533450337,
                            -75.28166779813165
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "521ebd86-c75c-4e53-9f7d-f7c1ef8cf337",
                    "title": "Sem inter CR 16 CLL 41",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.950968637711176,
                            -75.28695052746589
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "01b1cdea-ab5d-4521-ac0d-ddb0e9fe48c6",
                    "title": "SEm Inter CR 36 A CLL 20",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941018926459805,
                            -75.26366978222558
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a52a9f39-3ff2-4254-bb7a-4378843f03aa",
                    "title": "Sem Inter CR 16 CLL 50",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.953725306843757,
                            -75.28802319393205
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "30a724cb-a6a1-4ee0-a735-b5bafc468cbd",
                    "title": "Sem Inter  CR 16 AV 26",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.956901304856956,
                            -75.2893404140895
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8bfc9f10-5ed8-47aa-9222-12e06db24bdf",
                    "title": "sem Inter CR 1 CLL 64",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.963278259428824,
                            -75.29622812676263
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "10c310bf-45c4-4922-9881-9a6e338aab2f",
                    "title": "Sem Inter AV 26 CLL 37",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948293047027641,
                            -75.28848322499846
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b4492fa0-74cd-4aa0-8508-65992a93eb59",
                    "title": "Sem Inter CR 7 CLL 21",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93768130276774,
                            -75.2892405255977
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8d31baa6-415b-417e-83c6-fd483d1d8196",
                    "title": "Sem Inter CR 4 CLL 21",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935889585701117,
                            -75.29337668800959
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "75cbeb52-1151-486a-926e-1b6c0dd7e7f9",
                    "title": "Sem Inter Cr5 C21",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936411930878005,
                            -75.29238514419013
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "cc48783e-4db5-45b5-a34f-9c4c0deb4a53",
                    "title": "Sem Inter CR 2 CLL 21",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935348639342912,
                            -75.2947839622374
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "43126956-6141-474b-9259-7790dfa782e5",
                    "title": "Sem Inter  Av26 CRA 7",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943294327999278,
                            -75.29007031200841
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "eda21d6c-e764-4c6d-9ffa-63d58834a63e",
                    "title": "Sem CR 2 CLL 8",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925905594532253,
                            -75.2916021801474
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "43051147-0827-4d10-a294-caeb52d13465",
                    "title": "CR 22 CLL 50",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.957269328274604,
                            -75.28119732556317
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9fbf3649-8964-4abf-a6da-34c249fa3620",
                    "title": "SEm Inter CR 2 CLL 10",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928135706787281,
                            -75.29242092203621
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "aa2522b6-7cbe-4341-bed2-7aee7c71b859",
                    "title": "Sem Inter Cr 2 Av circunv",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.920229014054701,
                            -75.28926347481926
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d4544dbe-5b50-41e6-a7ef-09b3720c66af",
                    "title": "Sem Inter CR 3 CLL 6",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924690418249643,
                            -75.29004257449994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d475eb15-77d6-4006-96ad-8d8d028a7920",
                    "title": "Sem Inter CR 2 Av la toma",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933758373151497,
                            -75.29412448818
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b8946d5b-d696-4ce5-b580-1e53307355cd",
                    "title": "SEm Inter CR 3 CLL 10",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928423729109059,
                            -75.29153115158005
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6adac9fd-519e-49ca-827d-694d8a045c95",
                    "title": "Sem Inter CR 4 CLL 5",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924131225121013,
                            -75.28882192977873
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "83133530-f21a-4847-924d-1df81da51992",
                    "title": "Sem Inter CR 4 CLL 12",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930147550959124,
                            -75.29115073187417
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ecb87814-235e-4edf-9fb4-e33e598124e8",
                    "title": "Sem Inter CR 4 CLL 4",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923272358040963,
                            -75.28850091102929
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f2833e46-2ba4-4ec8-90d6-16a69e87e6c6",
                    "title": "Sem Inter CR 4 CLL 6",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92497363254667,
                            -75.28912852255277
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7b60404e-a5b3-43f8-9287-c734b6d0602d",
                    "title": "Sem Inter CR 4 CLL 8",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926571039426824,
                            -75.28977029986832
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d1a2ebad-3daf-4769-931b-2dec3107bd33",
                    "title": "Sm Inter CR 5 CLL 4",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923590478326302,
                            -75.28763328085837
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "970d5e24-69ad-4384-99dc-476954fa464f",
                    "title": "Sem Inter CR 6 CLL 7",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926437760892196,
                            -75.28753133436125
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d96b70c4-6522-4b3b-a9d0-d70aa5de13b6",
                    "title": "Sem Inter CR 4 Av la toma",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933957035739673,
                            -75.29262848077738
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f8a96786-7ecd-4c68-a7d9-ec67e0d140f4",
                    "title": "SEm Inter CR 5 CLL 7",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926048680221222,
                            -75.28854959692282
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4d1addf8-ed08-4c40-bfb9-8034d1d84825",
                    "title": "Sem Inter CR 5 CLL 10",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928948335606084,
                            -75.28968188812543
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b7bcb044-66f1-4517-b550-8ea1ebf2a856",
                    "title": "Sem Inter CR 5 Av la toma",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933888018794312,
                            -75.29152085081829
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "aa7736d6-18f2-4764-9c2d-391b97e0c8ee",
                    "title": "Sem Inter CR 6 CLL 8",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.927333377204548,
                            -75.28788914304127
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fd93de91-681f-4b3d-ac33-25ee0bf6e26f",
                    "title": "Sem Inter CR 5 TRANSVERSAL 5",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.917084691248309,
                            -75.28557674274215
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8dda4253-c6af-468d-9b8f-097dae16f89c",
                    "title": "Sem Inter Cr7 Av circunvalar",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921059738043671,
                            -75.2846192803466
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d61a61d2-7025-436e-983a-49b7e92370fc",
                    "title": "Sem Inter CR 7 CLL 6",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925964444732791,
                            -75.28627277643398
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3ef5e15f-4b25-4b36-b3c4-4af1a656e666",
                    "title": "Sem Inter Cr6 Av 26",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942277364983607,
                            -75.2919108046603
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b804b98a-6f75-4096-a55b-6b719a008929",
                    "title": "Sem Inter CR 7 CLL 2",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922551927614885,
                            -75.28510932129402
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "21ef7ba1-cbd0-4eb3-9c18-be8ce8218155",
                    "title": "Sem Inter CR 7 CLL 7",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926877149840295,
                            -75.28652579908268
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3aed66fd-3d97-43ba-a24c-87522236b8eb",
                    "title": "Sem Inter CR 7 CLL 8",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.927833973482609,
                            -75.28679746605246
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "23e855f2-fbdf-4ccd-94e6-ddc1f4206a03",
                    "title": "SEm Inter CR 3 CLL 7",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925354391870267,
                            -75.29029563388738
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bd367ef0-a188-4316-82be-310943fd876f",
                    "title": "Sem Inter CR 7 CLL 9",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928650671158,
                            -75.2870412685228
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2309e8a6-1c2f-4450-a62c-1543c578b4f9",
                    "title": "Sem Inter CR 7 Av la Toma",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932013522566981,
                            -75.28809256299455
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7cb31fa5-1f8d-414b-b304-bf6ccb0bd91e",
                    "title": "Sem Inter CR 7 CLL 49",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.95350339456832,
                            -75.29040569179148
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "828ef2b7-fc26-4a52-8b61-cca647380c47",
                    "title": "Sem Inter CR 6 CLL 6",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925679959293883,
                            -75.28717703581019
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "255cbcc2-d3d0-4b1c-8beb-e120825a4030",
                    "title": "Sem Inter CR 7 CLL 11",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930411555439898,
                            -75.28763777983472
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2c5167ca-cd3f-4bd4-b9c6-5c60781cd19f",
                    "title": "Sem Inter CR 7 CLL 10",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929355923062595,
                            -75.28726256505765
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "dfbdec66-afd6-4349-a0c8-5aa33e103ef0",
                    "title": "Sem Inter CR 6 CLL 9",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928308788323559,
                            -75.2881347753875
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "708553bd-3e3c-44d5-9f03-1de276b0fa42",
                    "title": "Sem Inter CR 5 CLL 2 sur",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.919621923428917,
                            -75.28614048321012
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "49db7f60-ef8e-4a96-a6dd-5dfba292e117",
                    "title": "Sem Inter CR 4 CLL 9",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.927675336179547,
                            -75.29022711639227
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b5ae9fa8-4cd7-49a8-8be4-e2f6c41295b8",
                    "title": "Sem Inter CR 4 CLL 10",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928643910606242,
                            -75.29056666412872
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8ba1171f-3267-4107-a803-05e631db8420",
                    "title": "Sem Inter CR 8 CLL 7",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.927270415209692,
                            -75.28563563985975
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "40e4234c-2a4f-4591-81ee-15a44ace0095",
                    "title": "Sem Inter CR 8 CLL 8",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92821590690805,
                            -75.28589826220792
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "cf8070e2-5aec-4342-804c-2aa079ad254b",
                    "title": "AV 26 CLL 30",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944761278941794,
                            -75.28884725281245
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6bdf3381-8baa-4f05-87aa-57628b263428",
                    "title": "Sem Inter CR 9 Av la toma",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930218780899681,
                            -75.28533780096765
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b6bb1459-524a-4d23-a8bf-0ce48684388e",
                    "title": "Sem Inter Cr 12 con Av la Toma",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932687505971658,
                            -75.28318405429158
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b1a51b4e-b8f3-4dad-911b-e818be5b2760",
                    "title": "Sem Inter CR 12 CLL 16",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934831287068843,
                            -75.28369121982173
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "08e4476e-2b67-4f8d-bd29-16c4d63dbbea",
                    "title": "Sem Inter CR 15 CLL 2",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922972848645815,
                            -75.27939921715803
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "eaca9bd3-2ba4-46b7-bb80-04c3b91666b1",
                    "title": "Sem Inter CR 15 CLL 5",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926907190501344,
                            -75.27911952239073
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3c666621-077e-40ff-aafa-b24609412db3",
                    "title": "Sem Inter CR 16 CLL 7",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929806421979608,
                            -75.27903677976127
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1edb9055-4c7a-4171-b10f-c4013ecfa247",
                    "title": "Sem Inter CR 16 CLL 8",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930624687294264,
                            -75.27935796186122
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e13eaba0-592b-4702-853b-d98992be7ca7",
                    "title": "Sem Inter CR 16 CLL 9",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9316645882905,
                            -75.27976989182947
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3344053a-5620-467f-b138-356ce6137e3b",
                    "title": "Sem Inter CR 22 CLL 16 sur",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912678202443628,
                            -75.27447139826269
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "211c0e19-a533-4636-bcf9-3203f9e440d4",
                    "title": "Sem Inter Av Circunvalar CLL 21",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93320510026203,
                            -75.29903993534478
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "362591bf-1543-4c33-b3f8-d32b8053332e",
                    "title": "Sem Inter CR 22  CLL 21 sur",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.909140385281527,
                            -75.27484097413834
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "cdb673c8-e02b-44ee-9b33-48d774e59cc7",
                    "title": "Sem Inter Cr18 C8",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93127049061427,
                            -75.27766388608799
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "babc1d87-1b8f-4269-a821-b78d302ccc2b",
                    "title": "sem Inter CR 1  Cll 48",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.954707611087479,
                            -75.29785812882398
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "98b63f70-396a-4bf5-8998-f261fed174b8",
                    "title": "Sem Inter CR 19 CLL 12",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933980504492565,
                            -75.27798049749802
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e3fd2fb3-ce10-48f4-80d6-0cb3bc76eb81",
                    "title": "Sem Inter CR 12 CLL 8",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929582390033523,
                            -75.28275068324915
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8f410cc0-d0f6-49a1-9e5e-42198342adb3",
                    "title": "Sem Inter CR 12 CLL 9",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930077201506736,
                            -75.28287871247414
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a94c9017-687f-40ff-9898-b9d06545e3f4",
                    "title": "Sem Inter CR 6 CLL 10",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929169458132321,
                            -75.28837266471481
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2c8203bf-f4ae-4bb7-b567-65f9ac51a6ed",
                    "title": "Sem Inter CR 7 CLL 4",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924263864990342,
                            -75.28570225963055
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e9196bde-9588-487d-850c-807d9df709b2",
                    "title": "Sem Inter CR 8 CLL 4",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924598675329901,
                            -75.28482334879864
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3f7a91e9-d749-4870-85dd-e8a83216c90e",
                    "title": "Sem Inter CR 34 CLL 8",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930330045469328,
                            -75.26422442534559
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "34723549-5d79-44a5-a77d-411b71461199",
                    "title": "Sem Inter CR 20 CLL 26 SUR",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.905772174044158,
                            -75.27869550661252
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6e4cac76-c362-47cb-9d13-0a1aef978601",
                    "title": "CR 33 TRANSVERSAL 36 SUR",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.89727566053854,
                            -75.26246008068138
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "56e27d90-2795-4be0-9129-931f3e2d4580",
                    "title": "CRA 7 CLL 19 SUR",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.90979387120468,
                            -75.28188109034818
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "174c5427-282a-4bf0-be22-452c3cd663aa",
                    "title": "CR 25 CLL 21 SUR",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.908124899680808,
                            -75.27233656508676
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "cf94af7f-a672-4bd3-a59c-1dc97b3fdee1",
                    "title": "CR 10 CLL 19 SUR",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910944334785329,
                            -75.27926643756193
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d7f1a117-bc7b-4e72-971e-da0367005d5e",
                    "title": "CR 2 CLL 12",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929626288062058,
                            -75.29300048560265
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "da030f12-1dc6-4b9a-80f4-9ff8510c38ee",
                    "title": "CR 9 CLL 21",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93937780399617,
                            -75.28516766259469
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2abec70f-fd19-45e2-8ff8-51568cd34c9c",
                    "title": "CR 5 CON AV CIRCUNVALAR",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.920594405896872,
                            -75.28652974276352
                        ]
                    }
                }
            ]
        }';
        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('traffic_light')->insert([
                'name' => $Data['title'],
                'uuid'=> Str::uuid(),
                'status'=> $Data['properties']['Estado'],
                'position' => json_encode($Data['geometry']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } 
    }
}

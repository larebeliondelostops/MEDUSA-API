<?php

namespace Database\Seeders\Neiva;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FiberSiesPointsSeeder extends Seeder
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
                    "type": "Feature",
                    "markerType": 20,
                    "id": "7bbc0e35-526e-4dd6-abea-49f77ef379bc",
                    "title": "T-SUR-ORIENTALES-CEO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.904175024,
                            -75.273826757
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "6164c642-8e04-49ab-84c9-dfce93d441dc",
                    "title": "T-SUR-ORIENTALES-CEO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.908370165,
                            -75.2722594149
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "0551f39f-13fd-4de7-a296-0a5ac7af1352",
                    "title": "T-SUR-ORIENTALES-CEO3",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.911945569299999,
                            -75.2720750871
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "27018088-4134-42a1-9a97-a3f1935f83e8",
                    "title": "T-SUR-ORIENTALES-CEO4",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9152395685,
                            -75.2747830472
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "99db0f38-d91b-423c-b9e8-1edcc1e079fa",
                    "title": "T-SUR-ORIENTALES-CEO5",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9179696208,
                            -75.2749561441
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "f864a0aa-42b9-412c-ba8a-04dd88a70610",
                    "title": "T-SUR-ORIENTALES-CEO6",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.920073507100001,
                            -75.2728724849
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "22106568-0a2b-4a72-834a-6b78affb12ad",
                    "title": "T-SUR-ORIENTALES-CEO7",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9222116433,
                            -75.2690495779
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "9e5e2276-c516-4fdd-b2a1-3625d19513e5",
                    "title": "T-SUR-ORIENTALES-CEO8",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9237992379,
                            -75.2664458853
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "0712132e-fa62-4d30-b9ab-8692a479c0ff",
                    "title": "T-SUR-ORIENTALES-CEO9",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9264525196,
                            -75.2665614582
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "57c315ce-38e0-4426-8fd4-96b7db4177dd",
                    "title": "T-SUR-ORIENTALES-CEO10",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9302729499,
                            -75.2640818059
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "1d999480-0912-4152-81ce-2515f57b70b5",
                    "title": "T-SUR-ORIENTALES-CEO11",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9316935897,
                            -75.255107496
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "fb215dc2-8a0c-4d90-9eb7-95a40a7e28b1",
                    "title": "T-SUR-ORIENTALES-CEO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9342047727,
                            -75.245704394
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "bde21767-9cd1-4754-a486-68eeacbbac93",
                    "title": "T-ORIENTE-CEO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9366616863,
                            -75.2817058038
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "7bc57ffc-0990-41a9-a3f2-d77e41b2bf25",
                    "title": "T-ORIENTE-CEO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937825482,
                            -75.2777035906
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "80e1926b-c8af-49a6-b5b9-a2ff85ecbe87",
                    "title": "T-ORIENTE-CEO3",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9386683178,
                            -75.2723898725
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "7ecc1465-608e-4a41-a6e2-5ac7da539137",
                    "title": "T-ORIENTE-CEO5",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9403616161,
                            -75.2621424418
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "c918a992-3866-485f-a4bc-0ca666f96778",
                    "title": "T-ORIENTE-CEO4",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9397858584,
                            -75.2677279323
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "fbc1db84-9535-4901-bd71-0206cda827b9",
                    "title": "T-ORIENTE-CEO6",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9401378709,
                            -75.2538441219
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "13eba3cf-5ee1-4785-8328-81f103cc63df",
                    "title": "T.SUR-CEO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9268094381,
                            -75.2927568555
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "2cc51665-2234-422b-a7c7-0bebf7d6fac6",
                    "title": "T.SUR-CEO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9232197681,
                            -75.2916139011
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "2c0e0737-9abc-448b-a43c-800069ce4961",
                    "title": "T.SUR-CEO3",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9244688574,
                            -75.2879293263
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "a3538f36-eb61-4df8-8f68-ca6b915fb3e1",
                    "title": "T.SUR-CEO4",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9197836574,
                            -75.2861214358
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "fa899c21-1bfb-4f16-8a2f-b8c9cba23c1d",
                    "title": "T.SUR-CEO5",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9170287745,
                            -75.2855229894
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "04523e0d-d014-4700-a7aa-1e0dccde647d",
                    "title": "T.SUR-CEO6",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9090504424,
                            -75.2850810702
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "101097a5-36a1-43d2-ab5e-c81e0744ed28",
                    "title": "T.SUR-CEO7",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9077165683,
                            -75.2811495075
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "14575c51-68d6-464e-8b06-d86569e8f766",
                    "title": "T.SUR-CEO8",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9052267618,
                            -75.2802388685
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "830f2bb6-ab59-4253-9956-48348ac890cf",
                    "title": "T.NORTE.C2-CEO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933629228,
                            -75.2913167898
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "9947931b-1283-4f5c-854f-24f240bc1d2c",
                    "title": "T.NORTE.C2-CEO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9350180331,
                            -75.2897492923
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "8c2dca90-3ffb-4099-ae90-8799d7682e1e",
                    "title": "T.NORTE.C2-CEO3",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9376306153,
                            -75.2890181249
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "b0411611-4424-4b4a-a0e7-202c94047e25",
                    "title": "T.NORTE.C2-CEO4",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9402757108,
                            -75.2823017308
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "af494d0b-9895-4988-8d9e-16580491db43",
                    "title": "T.NORTE.C2-CEO5",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9508053526,
                            -75.2870121382
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "e8e19af7-389e-46fe-8846-131dd7463cc7",
                    "title": "T.NORTE.C2-CEO6",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9569316886,
                            -75.289458934
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "673d0fea-9103-43b7-b4b7-f1cff55616e5",
                    "title": "T-NORTE-C1-CEO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9328493735,
                            -75.2995504681
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "6ce3d997-cde0-4105-9695-5bf8e6c68b75",
                    "title": "T-NORTE-C1-CEO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9378201384,
                            -75.3025184866
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "daae6300-5f20-4e5d-9126-1ac67b358c8c",
                    "title": "T-NORTE-C1-CEO3",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941235484099999,
                            -75.2990323305
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "577993f6-ff14-43d7-9917-60f2dc390153",
                    "title": "T-NORTE-C1-CEO4",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9447506944,
                            -75.2979369047
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "04df39cf-66eb-44ce-bd80-9622ba8f924f",
                    "title": "T-NORTE-C1-CEO5",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9475575606,
                            -75.2980337064
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "188ead4a-c383-479a-b325-7ca1409e90d2",
                    "title": "T-NORTE-C1-CEO6",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.953329098499999,
                            -75.2977550761
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "3db37c9f-d4e5-42d0-bba4-c12e2fd40257",
                    "title": "T-NORTE-C1-CEO7",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9573375329,
                            -75.2970755513
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "12aca9ff-f917-46ce-921c-0b203166a3f0",
                    "title": "T-NORTE-C1-CEO8",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9633317005,
                            -75.2961449258
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "c01e166e-4143-4e82-9cf2-083353244ebe",
                    "title": "T-NORTE-C1-CEO9",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9624480225,
                            -75.2926114077
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "a04b2c7d-9812-4696-8961-58e57d9d8953",
                    "title": "T-SUR-ORIENTALES-CEO1-R-SALIDA-CAGUAN.CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.8973414782,
                            -75.2626399457
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "21a907dc-fc1c-455d-b358-eaccf95ca6fc",
                    "title": "T.SUR-CEO8-R-SALIDA-SUR-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9029731426,
                            -75.2831397682
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "f38a66b3-b28c-4570-bd6d-e43f59c58d0c",
                    "title": "T.SUR-CEO8-R-SALIDA-SUR-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.8938819613,
                            -75.2777343385
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "161b2982-86a1-4eeb-9499-31e959c2315c",
                    "title": "T-SUR-ORIENTALES-CEO1-R-SALIDA-CAGUAN.CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9007123111,
                            -75.2692536322
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "5449438c-9313-4e4d-8bc4-e681ad285a37",
                    "title": "T-SUR-ORIENTALES-CEO2-R-CAM117-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9092930213,
                            -75.2747266885
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "5e6d5a18-549c-4648-bcf4-1eb61408d2ca",
                    "title": "T-SUR-ORIENTALES-CEO4-R-CAR15-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9159243909,
                            -75.2768343687
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "daeb8958-5b92-4511-aa7c-4bf976e4189c",
                    "title": "T-SUR-ORIENTALES-CEO4-R-CAR15-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918926958,
                            -75.2796996103
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "9c96b251-a1e2-4374-9191-a0ef166eb589",
                    "title": "T-SUR-ORIENTALES-CEO4-R-CAR15-CTO3",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9250706897,
                            -75.2792930552
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "c96b4d59-bbf4-4ee1-9974-a2945ae56d30",
                    "title": "T.SUR-CEO1-R-ALCALDIA-PP-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9274529766,
                            -75.2910770586
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "594ff20a-4f68-4963-912c-ec61e32ca601",
                    "title": "T.SUR-CEO1-R-ALCALDIA-PP-CT01-SR-CAR3-CL7-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9262498776,
                            -75.2906180071
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "071ca1c1-6d12-445e-83e8-7ad2fe9e6384",
                    "title": "T.SUR-CEO1-R-ALCALDIA-PP-CT02",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9280074906,
                            -75.2892805256
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "257e4358-4cb3-480a-8bd6-bac1b8ed631b",
                    "title": "T.SUR-CEO1-R-ALCALDIA-PP-CT03",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9287694194,
                            -75.2895518762
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "7069fa8b-c5e4-4fd9-8e64-2ef29a19031a",
                    "title": "T.SUR-CEO3-R-CAR6-CAL6-CAR7-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9248886563,
                            -75.2868286977
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "40cb25a1-ac7c-474c-8a8d-544dcd7d6ba6",
                    "title": "T.SUR-CEO3-R-CAR6-CAL6-CAR7-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925671458,
                            -75.2872010517
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "cde795cb-57f6-4c46-be82-d25481649ed8",
                    "title": "T.SUR-CEO3-R-CAR6-CAL6-CAR7-CTO3",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9268291182,
                            -75.2865604405
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "8552ec25-5c42-46bc-8ab4-e65bf80e4cf9",
                    "title": "T.NORTE.C2-CEO3-R-CRUZ-ROJA-AV-26-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938901255799999,
                            -75.2932144254
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "5cb0f1fa-ddf1-4c66-ac08-a8c6556d5d01",
                    "title": "T.NORTE.C2-CEO3-R-CRUZ-ROJA-AV-26-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941302627799999,
                            -75.2941330127
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "588a378d-4be7-4a46-987d-13d003c76ddb",
                    "title": "T.NORTE.C2-CEO3-R-CRUZ-ROJA-AV-26-CTO3",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9430715163,
                            -75.2901678834
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "b3944fa5-9a1b-48af-b075-fd12862d9a36",
                    "title": "T.NORTE.C2-CEO3-R-CRUZ-ROJA-AV-26-CTO1-SR-CR-25-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9378452153,
                            -75.2960307977
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "4728feb6-184b-4350-9a25-5733ffad0c4d",
                    "title": "T.NORTE.C2-CEO3-R-CRUZ-ROJA-AV-26-CTO1-SR-CR-25-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9369716431,
                            -75.2984411025
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "c75c540a-bc41-4530-ac8c-eb4cd6aa6245",
                    "title": "T-SUR-ORIENTALES-CEO4-R-CAR15-CTO3-SR-CAR14-CAL8-CAR12-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929179828800001,
                            -75.2808669634
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "7b09bce6-e15b-4218-bfe7-b1f8fd446505",
                    "title": "T-SUR-ORIENTALES-CEO4-R-CAR15-CTO3-SR-CAR14-CAL8-CAR12-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9309544705,
                            -75.283980886
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "24fa82f2-e0ce-4d48-937e-14fecfe310e0",
                    "title": "T-SUR-ORIENTALES-CEO4-R-CAL11S-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9153471342,
                            -75.2729072776
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "4aabdb79-bbae-4e9f-aa20-68500488ceae",
                    "title": "T-SUR-ORIENTALES-CEO4-R-CAL11S-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9155422019,
                            -75.2711058514
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "48484176-8498-4a7f-931e-dacb815fad0f",
                    "title": "T-SUR-ORIENTALES-CEO6-R-CAR23-CAL1DS-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9189786653,
                            -75.2722709459
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "b1797bc6-91b8-4c38-96c1-2c1719040b5b",
                    "title": "T-SUR-ORIENTALES-CEO7-R-DIA1D-CAR29--CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9212179344,
                            -75.268412203
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "259e50ea-5028-478b-82bf-b7dc94dee893",
                    "title": "T-SUR-ORIENTALES-CEO7-R-DIA1D-CAR29-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9196522194,
                            -75.265881874
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "69b1e258-8891-4ffa-90f4-2cf8f1174ea1",
                    "title": "T-SUR-ORIENTALES-CEO8-CAL2B-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9234713911,
                            -75.2650903174
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "8ab59883-ea93-4ec2-a574-1bc04f94e33c",
                    "title": "T-SUR-ORIENTALES-CEO8-CAL2B-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9233817251,
                            -75.2620173634
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "79f4e579-2701-4604-a311-ff8fc1281a95",
                    "title": "T-SUR-ORIENTALES-CEO9-R-CAL2E-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9259185976,
                            -75.2689662525
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "8387edf5-bf54-4b70-b1b8-0e6adba7d159",
                    "title": "T-SUR-ORIENTALES-CEO4-R-CAR15-CTO3-R-CAL3A-CAR16-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9249814168,
                            -75.2773299501
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "ad6c5287-be40-40b2-9ec2-2f2f5098c7d6",
                    "title": "T-SUR-ORIENTALES-CEO4-R-CAR15-CTO3-R-CAL3A-CAR16-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9239839822,
                            -75.2769034843
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "0709e5a4-6ee3-4b11-9228-c19149e8bc72",
                    "title": "T-ORIENTE-CEO4-R-CAR31-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934894552,
                            -75.2675462983
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "3a2313af-bdf8-42ae-ad64-57e00d0d9eac",
                    "title": "T-ORIENTE-CEO6-R-CAR46-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9437399626,
                            -75.2536112459
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "b4ca30c3-061a-4968-b968-096a3e83412d",
                    "title": "T-ORIENTE-CEO6-R-CAR46-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9467677433,
                            -75.253413591
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "17de25d7-5ddc-403f-bf9b-5eac44fd6098",
                    "title": "T-ORIENTE-CEO6-R-CAR46-CTO4",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9499376209,
                            -75.2517020488
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "f8854b0c-23ec-4735-8d0f-21563e4bb4fb",
                    "title": "T-ORIENTE-CEO6-R-CAR46-CTO3",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9483826606,
                            -75.2512122115
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "542f73f1-1fe1-4b05-a810-6b487f6eff4c",
                    "title": "T-ORIENTE-CEO7",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9409182318,
                            -75.247726228
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "965d11b3-005f-408f-b707-3c698c9cdc29",
                    "title": "NODO-ORIENTE-R-CAL20-CAR53-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9432844205,
                            -75.2454114526
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "ec773317-b548-475c-a568-4cc8547e8858",
                    "title": "NODO-ORIENTE-R-CAL20-CAR53-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9434387878,
                            -75.2487150798
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "1d89e662-313c-48f0-83e1-da1bc1f887d8",
                    "title": "T.NORTE.C2-CEO5-R-TRV8B-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9484963029,
                            -75.2883547437
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "34fcb4d1-8cfd-4351-9c12-c33a592c52ec",
                    "title": "T-NORTE-C1-CEO2-R-PUENTE-SANTANDER-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9427053749,
                            -75.3066224808
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "abd15dc6-cd01-4298-960d-81a97d350fb2",
                    "title": "T-NORTE-C1-CEO2-R-PUENTE-SANTANDER-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9423054757,
                            -75.310916222
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "139959f6-5a35-40a3-ae9d-35c7b03813d4",
                    "title": "NODO-NORTE-R-CAR7-CAL90-CTO1",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9627314119,
                            -75.2877845416
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "c40ca9af-d366-40b6-ae0b-13661af5e97b",
                    "title": "NODO-NORTE-R-CAR7-CAL90-CTO3",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9763682774,
                            -75.2845296668
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "64e8f686-d7cc-4398-bc4e-fa24e5d64674",
                    "title": "NODO-NORTE-R-CAR7-CAL90-CTO5",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.979983405,
                            -75.2835798407
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "e398d951-34a5-458c-9de2-d841a0381aff",
                    "title": "NODO-NORTE-R-CAR7-CAL90-CTO3-R-CAL82-CAR2C-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9765356028,
                            -75.287812692
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "ca167f6e-c1d0-4f97-8672-4929b5255908",
                    "title": "NODO-NORTE-R-CAR7-CAL90-CTO2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9741282661,
                            -75.2850928626
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "3fedf458-7376-4dda-8592-f0310db0e9b2",
                    "title": "NODO-NORTE-R-CAR7-CAL90-CT04",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9779919073,
                            -75.2841531336
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "89dad221-fd7c-490a-bb25-176d3d32bb83",
                    "title": "Mufla Salida CAGUAN",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.897322861112968,
                            -75.26270979851279
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "b8e1e63e-6faa-4159-ba3c-2c9595e89886",
                    "title": "Mufla Santa Isabel 2",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.914961062431547,
                            -75.27582212469811
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 20,
                    "id": "8f62cd0e-dda7-4811-8439-764df5165782",
                    "title": "Mufla IPC",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922181844062869,
                            -75.26905376005769
                        ]
                    }
                }
            ]    
        }';
        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('fiber_sies_points')->insert([
                'name' => $Data['title'],
                'uuid'=> Str::uuid(),
                'latitude' => $Data['geometry']['coordinates'][0],
                'longitude' => $Data['geometry']['coordinates'][1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } 
    }
}

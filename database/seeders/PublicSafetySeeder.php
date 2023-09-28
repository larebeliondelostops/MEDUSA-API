<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublicSafetySeeder extends Seeder
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
                    "markerType": 29,
                    "id": "99a49cbd-18fa-452f-a4a4-e66b5ee36f8d",
                    "title": "CAM 1",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942825700660746,
                            -75.30667325883776
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "fe550cfd-fe48-407b-b226-cf82fa9ea895",
                    "title": "CAM 2",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941090999969827,
                            -75.29806699992888
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "ab3f1a6e-b1c8-4e27-a3b3-27418c8167c6",
                    "title": "CAM 3",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942403694865925,
                            -75.30277617811677
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "c9e445e1-a7a9-4c5c-927b-c26b65643439",
                    "title": "CAM 4",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942078714421696,
                            -75.3113804068003
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "e44d5510-6233-4541-95cb-094b43f848c0",
                    "title": "CAM 6 360",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949723677807758,
                            -75.31199653572185
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "5ff42a2c-6838-4e45-9a4a-9b89b2f8df38",
                    "title": "CAM 7",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937508457295377,
                            -75.30107982761625
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "762e3aca-b23b-4c5d-9280-216d846f3df0",
                    "title": "CAM 9-LPR",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94865589472499,
                            -75.28847960811254
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "a9ba6cf0-7781-4e7c-b2bb-b7a17d64d993",
                    "title": "CAM 10",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940515620542599,
                            -75.28204011730854
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "14121d9d-ab9b-45a6-b163-b5fe6ab9cafb",
                    "title": "CAM 11",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943429492237686,
                            -75.2899634833925
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "a8bf46ec-8055-416a-a2ca-df32262c004a",
                    "title": "CAM 13",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937667523299529,
                            -75.28920746799675
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "65f82a47-fff1-4249-bf89-0807e21fd498",
                    "title": "CAM 14",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938157639540781,
                            -75.2929680658648
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "1272a78a-e6cc-4f65-8f39-2a4ab51cc33b",
                    "title": "CAM 15",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921924875050486,
                            -75.29187304824806
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "383a97ab-e63b-4f7d-8929-4ceeb9675718",
                    "title": "CAM 16-360",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922728816828845,
                            -75.29046594669478
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "9d5a1350-2003-416c-8bc1-d6bc3498b83e",
                    "title": "CAM 18-LPR",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933127406637613,
                            -75.29910516599016
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "f3c350d0-4e07-47aa-8b46-ed2832a230cb",
                    "title": "CAM 19",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935350438918677,
                            -75.29490107795803
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "684f3e3d-b348-4387-86a5-c0e281f48826",
                    "title": "CAM 21",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926827037485254,
                            -75.28651685839274
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "d133040f-fd83-4f19-beb4-125f5cd7b20f",
                    "title": "CAM 22",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926564207308612,
                            -75.28441860373073
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "b11cb78a-2af7-4291-9111-56ee383bcc98",
                    "title": "CAM 24",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928542953079739,
                            -75.29149386676967
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "696d4d07-adfa-4424-ab02-c4a87e0ef075",
                    "title": "CAM 26",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928891768960116,
                            -75.2814486191822
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "44b5cbe5-277d-48f2-85cc-3a64fa1544a4",
                    "title": "CAM 27",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93675190516106,
                            -75.28160481878196
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "47e491fd-dfff-4fbb-83ae-42b8b290b298",
                    "title": "CAM 28",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940418805248757,
                            -75.27378516882519
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "9af3e6c5-59e3-43ec-8315-dd80a07c9475",
                    "title": "CAM 29",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93446939225479,
                            -75.24472029964762
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "ca704f8a-148a-432f-baf9-c3e5d0579f6f",
                    "title": "CAM 30",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912713143983013,
                            -75.2744930614152
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "143700c5-5aaa-4ce7-a20a-90bc605658df",
                    "title": "CAM 32",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.902699208942003,
                            -75.26676880042271
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "7eaae1f0-9e8c-4170-b1ea-60c4947e6ea8",
                    "title": "CAM 36",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.920033385812002,
                            -75.2842209369654
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "9b4529a4-065b-47a1-8512-d659c0db51b4",
                    "title": "CAM 37",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.919250951097804,
                            -75.27988002868548
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "dedffecf-57b7-4942-8229-d02fe8677d25",
                    "title": "CAM 40",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925084695925377,
                            -75.26934291019042
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "69e71e26-a5cf-4820-8338-85e10b550c4c",
                    "title": "CAM 42",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926830453188887,
                            -75.27304116847876
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "80b8f95d-7438-4e16-848b-0d112d54fe80",
                    "title": "CAM 44",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931917002770999,
                            -75.25574804268628
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "1c08e2df-340f-42a4-a3dd-dcaeb9b2ec78",
                    "title": "CAM 46",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.975163798223437,
                            -75.2847219663831
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "5c2e019c-2ab5-4044-a6c8-1a2d194a4682",
                    "title": "CAM 47",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.962669535320825,
                            -75.28767749497378
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "412ce8a4-ebbc-46c0-9ba1-5c1ed4d209f1",
                    "title": "CAM 48",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940327315192487,
                            -75.25785376997813
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "44f1d116-a154-436c-a520-0c2acfb138ee",
                    "title": "CAM 49",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941303993610169,
                            -75.24805477817104
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "05dcdf16-f354-4c6b-9fe8-cb9b392b4ea6",
                    "title": "CAM 52",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93793418883404,
                            -75.25415461967211
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "ca44000a-d15c-43db-902d-40a9b3285935",
                    "title": "CAM 54",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935177009218426,
                            -75.27921262772219
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "a89789b5-7f1e-416b-959e-20f06b9a2750",
                    "title": "CAM 55",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.907056736838453,
                            -75.28095519807339
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "af09583b-a600-42ef-9165-f7303f9cf435",
                    "title": "CAM 56",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910858808350584,
                            -75.2787138703248
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "723bff35-4d80-4713-abbc-28d64259ca6e",
                    "title": "CAM 56-LPR",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910858808350584,
                            -75.2787138703248
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "ec0de22f-5632-4b06-ab8d-e32aca78241f",
                    "title": "CAM 57",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.907693619846421,
                            -75.28121414344227
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "bcd43840-571e-4b25-b74a-84b0838db828",
                    "title": "CAM 58",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.903905432396267,
                            -75.2836641889509
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "4d8b1f22-ad61-4eed-91a0-674c27736844",
                    "title": "CAM 65",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93306685452284,
                            -75.28934033818352
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "ff5a3d30-ce11-4091-b3de-dba1a44e8ce6",
                    "title": "CAM 67",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929013805611415,
                            -75.28976057375489
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "109f3ad2-d62b-4889-8d1c-e128efb84c0c",
                    "title": "CAM 68",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937669241493771,
                            -75.27827399138015
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "75d68ff1-f304-4c10-9f2d-653cd2880299",
                    "title": "CAM 69",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925220817166696,
                            -75.27909944498866
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "7bbebfc9-7930-4530-8867-ccd7a79721c9",
                    "title": "CAM 70",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928636761043809,
                            -75.2706023965948
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "00b3a7ab-c2cb-4de4-a4e1-594e343d4c3c",
                    "title": "CAM 72",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.920068272996963,
                            -75.27216780652478
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "a9c7f14c-4a36-4477-a82c-9dbe0e675682",
                    "title": "CAM 73",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943732147820338,
                            -75.25354336033561
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "34eb141b-ead0-4b11-ad0e-818239be3835",
                    "title": "CAM 75",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945000334153892,
                            -75.28476149512358
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "89735ae9-4b25-44df-bb10-0f026fcd8cce",
                    "title": "CAM 76-360",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926566613124935,
                            -75.28747611720932
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "678c837c-0ed4-4a1e-afe1-e1b28e933dc1",
                    "title": "CAM 77",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924124222792342,
                            -75.28648791433628
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "13c81912-959c-484a-b12d-d29d01858f92",
                    "title": "CAM 78",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926679438457852,
                            -75.28968046887212
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "748ee742-b5a7-4ac7-af02-ff31c5b229e1",
                    "title": "CAM 79",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.915020187278604,
                            -75.27300280274721
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "8aec126d-0d4a-4dcb-863a-99f55572c689",
                    "title": "CAM 81",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924233567360336,
                            -75.27618013157809
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "f03b9707-774c-4689-a685-1dedb6900261",
                    "title": "CAM 82",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.975567105486098,
                            -75.2885633021927
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "0ab96a88-8a98-4b1e-a112-e3fe85da0f77",
                    "title": "CAM 83",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.978031475684604,
                            -75.28488398461928
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "1a490928-f983-4e08-8290-60e8f1c93b0d",
                    "title": "CAM 84",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.979373495374194,
                            -75.28684221805372
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "9b9bf812-a287-4f3f-93ec-cd06fde86af1",
                    "title": "CAM 85",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.980907637028122,
                            -75.28251933046262
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "99d4bff4-8fbc-4f7b-8594-dac976571e84",
                    "title": "CAM 87",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946116152069427,
                            -75.23808606856004
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "45225d82-d443-4140-8100-65d718714752",
                    "title": "CAM 88",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.950090813821494,
                            -75.25177244569515
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "196b1bdf-0203-414c-8cc6-2791dded962c",
                    "title": "CAM 89",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943823813290485,
                            -75.25056802073368
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "2b6016ae-1f92-4f05-9485-6d25f4205d40",
                    "title": "CAM 90",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926198214780552,
                            -75.2906862432398
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "18ae7c0d-dfe6-41ed-be92-303168cc3c1a",
                    "title": "CAM 91",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92507345229929,
                            -75.27727941626065
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "41523bec-8cd5-4672-8efd-616eec60660f",
                    "title": "CAM 92",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948361813001597,
                            -75.28739082328521
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "ff7624d4-e2fb-45b7-8dac-fbcd1416d104",
                    "title": "CAM 94",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.939442109716703,
                            -75.2852790874021
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "245bd577-9f3f-41ff-87b7-00ae21327d98",
                    "title": "CAM 95",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944829356904822,
                            -75.29795007166697
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "48a0f515-e2ad-4940-8af3-f6447680ac2f",
                    "title": "CAM 96",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931403472764445,
                            -75.28416645727788
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "043e7541-d41a-4577-9a0e-730758c99475",
                    "title": "CAM 97",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9467145206127,
                            -75.29192544552961
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "a6351f67-d0b6-4f97-a6d6-5e9efdf2f5e8",
                    "title": "Mufla Matamundo",
                    "properties": {
                        "Estado": "Antiguas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.919434174405861,
                            -75.28599177875655
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "e59c59ac-a6c0-4603-bb03-6b2831fe000f",
                    "title": "CAM 5",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938075554456225,
                            -75.29607442389272
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "886142c5-7e66-4106-ba8b-10fb88f0b838",
                    "title": "CAM 8",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.956782512725891,
                            -75.28948932839687
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "18fe9861-a99d-44d1-8a63-e37a023d5981",
                    "title": "CAM 9",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94865589472499,
                            -75.28847960811254
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "0973f879-95d4-4043-b24b-09fc88090d1d",
                    "title": "CAM 12",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941232815959553,
                            -75.2941922544909
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "5c3b96e6-1852-4002-850a-c04f3c8300a5",
                    "title": "CAM 16",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922728816828845,
                            -75.29046594669478
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "174e8b42-f745-47b8-a40d-462dad587074",
                    "title": "CAM 17",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92592811542234,
                            -75.2915967718734
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "2df46497-0f31-4ef7-b83e-31f8d4f25101",
                    "title": "CAM 18",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933127406637613,
                            -75.29910516599016
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "fe145e7c-a4c0-4e1b-884d-6aed02832eb5",
                    "title": "CAM 20",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925810942529508,
                            -75.289458961447
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "764222af-f852-4acb-a121-9c3bfeea561e",
                    "title": "CAM 23",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.919741628482374,
                            -75.28628666070617
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "787cfdfa-2d00-4fab-baa9-7110e91918f9",
                    "title": "CAM 25",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929736122286383,
                            -75.27983463793137
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "ebe659bf-152f-4df2-978b-9dd97b37df8f",
                    "title": "CAM 31",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.907533842630904,
                            -75.27043664519697
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "7a493d25-7d4a-4acc-927a-d9a1edcb53c1",
                    "title": "CAM 33",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.896052173770073,
                            -75.28310474141632
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "5b63dd67-a0b8-4854-972b-886c39632a96",
                    "title": "CAM 34",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9132974534873,
                            -75.26963336105486
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "4d1713a5-f2b7-4c1c-b1dc-0a7b725896df",
                    "title": "CAM 35",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.91514370030066,
                            -75.2813661395815
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "7928a247-e4f1-495a-8e88-e4444ad243d8",
                    "title": "CAM 38",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926515420974293,
                            -75.27691447645566
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "09872275-f653-4bdc-99a4-baca5086050f",
                    "title": "CAM 39",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92598444570351,
                            -75.27192293628727
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "b9cc9261-060b-422a-ad58-30c3d58e924d",
                    "title": "CAM 41",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93040468032089,
                            -75.26436157183178
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "f134a7b5-7df3-405f-8109-23836cfe14b3",
                    "title": "CAM 43",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922368387389754,
                            -75.26293291317637
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "bd4e7621-ff16-4520-8455-f53f8273594e",
                    "title": "CAM 45",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.980251023475611,
                            -75.28354761826229
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "4fac33be-8aa4-4efa-8d64-e6d902438257",
                    "title": "CAM 50",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948474909268336,
                            -75.25014484223033
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "aef25406-4474-4a8a-ab43-bee3af6ac82d",
                    "title": "CAM 51",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94007049757171,
                            -75.25373893535293
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "5ed4b93d-6242-4bca-9da6-5d7ceeef63f9",
                    "title": "CAM 53",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943429472945158,
                            -75.24867227030084
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "a95214cf-1f25-465d-8417-75a060776d79",
                    "title": "CAM 59",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.893889184416414,
                            -75.27777641153266
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "4d64028f-cb9a-4fb8-a9dc-52989c2c7999",
                    "title": "CAM 60",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921437820159872,
                            -75.2688704885954
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "3ffc5290-18a3-4164-b37a-e26b01be94dc",
                    "title": "CAM 61",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925119379625674,
                            -75.26020147801705
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "b38e93c9-6076-4117-9632-bcc58654bc5c",
                    "title": "CAM 62",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.917792008335317,
                            -75.26762245041232
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "e29ba4e9-f183-4884-a759-445132237a88",
                    "title": "CAM 63",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.917965763511442,
                            -75.27495146633613
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "9ad436c3-c9fe-4e49-a447-1a4ad43c132e",
                    "title": "CAM 64",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.916468501899773,
                            -75.28335953692752
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "af0fbf9b-cd4b-4d20-8b0e-dcb6572444f3",
                    "title": "CAM 66",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934303771492203,
                            -75.29166967618838
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "0581a047-2425-445b-be23-d1a43623d325",
                    "title": "CAM 71",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923157394798984,
                            -75.26766485175682
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "a00c5ef6-d3b3-4de2-81e1-f885c0be6bde",
                    "title": "CAM 74",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940711874703002,
                            -75.26923202132849
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "98a29906-34f8-4d9c-99bd-8255315b8a99",
                    "title": "CAM 76",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926566613124935,
                            -75.28747611720932
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "ae896d18-cdbc-4562-8544-c12df180cfe3",
                    "title": "CAM 80",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9234876061594,
                            -75.27345736985181
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "c16327b1-57bb-428b-aeb4-f309941c98a2",
                    "title": "CAM 86",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945464633223938,
                            -75.24198745503718
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "8239123b-b1d4-4aea-8533-2276a67f35ce",
                    "title": "CAM 93",
                    "properties": {
                        "Estado": "Da\u00f1adas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.917913619225535,
                            -75.27988814616617
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "c5c3982f-7ef8-40d2-b0cd-2b90d3b41ea0",
                    "title": "CAM 121",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9156262936,
                            -75.2711055261
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "39654384-611f-4206-a693-d77e4801e86e",
                    "title": "CAM 121-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9156262936,
                            -75.2711055261
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "7cc637ee-2f1e-4af9-83fe-827d2ed2ea99",
                    "title": "CAM 121-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9156262936,
                            -75.2711055261
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "330ce39e-d640-431f-a020-fa7dfa127d95",
                    "title": "CAM 110",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9474337654,
                            -75.2980922711
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "53f53b94-acd1-44a4-9eef-37f1f2b7e8b1",
                    "title": "CAM 110-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9474337654,
                            -75.2980922711
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "3bc2b211-b385-44ae-8f39-67916ee96f71",
                    "title": "CAM 110-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9474337654,
                            -75.2980922711
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "68918879-7361-4f8a-88f6-4935e0ffdda2",
                    "title": "CAM 115",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941323091,
                            -75.2990616931
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "dbb019fb-8f34-4144-a990-a3904ec554da",
                    "title": "CAM 115-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941323091,
                            -75.2990616931
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "836d3968-9f2c-4498-b713-fa692df4144f",
                    "title": "CAM 115-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941323091,
                            -75.2990616931
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "4eed84b7-b8da-404b-87d8-35da43a1c19c",
                    "title": "CAM 98",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9508717414,
                            -75.2869353058
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "f1029716-78ca-43a1-a6a8-9d6eaae0fc60",
                    "title": "CAM 98-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9508717414,
                            -75.2869353058
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "0323eb7d-ac4a-4b35-b8a4-edb558ca35cf",
                    "title": "CAM 98-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9508717414,
                            -75.2869353058
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "d7519b33-1b33-4c43-9455-b914dbefa1d1",
                    "title": "CAM 120",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9568862026,
                            -75.2789234074
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "41c9892d-a501-414e-8ea5-79590e94f3a9",
                    "title": "CAM 120-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9568862026,
                            -75.2789234074
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "23c4d7ab-89c6-450c-81a8-bf2d42465c30",
                    "title": "CAM 120-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9568862026,
                            -75.2789234074
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "e5be8f24-7ff6-4f7e-bde4-2b3403c548d7",
                    "title": "CAM 103",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9322770683,
                            -75.2881359247
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "87f47d42-a4ca-4b88-bb61-6068981adc0f",
                    "title": "CAM 103-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9322770683,
                            -75.2881359247
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "dd1de140-df0e-419d-b53c-a12d41516177",
                    "title": "CAM 103-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9322770683,
                            -75.2881359247
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "dc26ba82-f506-43ff-9c9f-7da850fb4246",
                    "title": "CAM 106",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932095093900001,
                            -75.2908511059
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "2d1fb1e1-5d48-4b8a-992e-141f090bd28e",
                    "title": "CAM 106-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932095093900001,
                            -75.2908511059
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "d7c8a570-ced5-442c-9f23-e578f8f4ae81",
                    "title": "CAM 106-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932095093900001,
                            -75.2908511059
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "6d06541c-57c3-4628-bbd1-67719df872d1",
                    "title": "CAM 107",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925299535200001,
                            -75.2882093291
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "5c1fae69-e83d-45c4-b699-dc950c18c584",
                    "title": "CAM 107-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925299535200001,
                            -75.2882093291
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "f5af0137-9328-4f5c-89c2-11cafc4f9179",
                    "title": "CAM 107-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925299535200001,
                            -75.2882093291
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "4afc3920-ba89-47e2-9fa6-e114e2d50dd0",
                    "title": "CAM 108",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9453849692,
                            -75.2630592471
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "e05f823e-a2c5-4d14-9cbd-2de33f9b7ab3",
                    "title": "CAM 108-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9453849692,
                            -75.2630592471
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "6d18a51a-1ce1-4328-acd4-fe417ccb8e7e",
                    "title": "CAM 108-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9453849692,
                            -75.2630592471
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "e96d3bce-3e12-455c-ba5c-ba2fe2949e6a",
                    "title": "CAM 109",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9337178277,
                            -75.2724710772
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "000a88e6-b151-4490-ab10-924107f9af93",
                    "title": "CAM 109-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9337178277,
                            -75.2724710772
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "5441727d-61e5-4204-9679-ea2213733312",
                    "title": "CAM 109-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9337178277,
                            -75.2724710772
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "cf206a2e-c2b4-4c45-afb2-477dae428b23",
                    "title": "CAM 111",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9158718982,
                            -75.2769116702
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "dbb53003-9c35-4047-a10b-cde31741ff9a",
                    "title": "CAM 111-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9158718982,
                            -75.2769116702
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "774c0fd9-da8f-461f-a20e-f81e2b8d13bd",
                    "title": "CAM 111-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9158718982,
                            -75.2769116702
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "ef4a7c44-0787-4a80-a74a-690991cd2e49",
                    "title": "CAM 112",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.898926103,
                            -75.2600662892
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "e71bde45-2f32-428f-bd32-44c8fbb109d8",
                    "title": "CAM 112-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.898926103,
                            -75.2600662892
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "17794fcd-061b-478c-a6f9-10b50e781675",
                    "title": "CAM 112-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.898926103,
                            -75.2600662892
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "8adb4c57-3308-4cb0-9532-06a9e78d4119",
                    "title": "CAM 113",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9118826967,
                            -75.2719872373
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "4b5f8620-0586-4efb-b0eb-e4b7736053f8",
                    "title": "CAM 113-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9118826967,
                            -75.2719872373
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "0f7b8214-e5a1-44ef-8e0c-05ef0f8b617e",
                    "title": "CAM 113-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9118826967,
                            -75.2719872373
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "b1dfe22a-45d4-46dc-9773-6de8088d3304",
                    "title": "CAM 114",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9142142149,
                            -75.2758174427
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "e5973e76-2347-49fa-9bf5-89cce0f8500c",
                    "title": "CAM 114-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9142142149,
                            -75.2758174427
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "7e2ce9c6-cdc3-4098-afbe-afd4fffa5b5a",
                    "title": "CAM 114-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9142142149,
                            -75.2758174427
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "24c861d6-dfdd-4a5e-89da-1d13bf056ebc",
                    "title": "CAM 116",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9176358411,
                            -75.2730886873
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "55eebc6f-8721-40ae-b195-2e1f3d84f023",
                    "title": "CAM 116-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9176358411,
                            -75.2730886873
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "47e0b0c5-3cd5-419d-ae4e-890334db8f92",
                    "title": "CAM 116-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9176358411,
                            -75.2730886873
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "dc78c9f3-228a-48e2-9582-bf02b06141ca",
                    "title": "CAM 117",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.909149938,
                            -75.2748359556
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "0838e3b1-5b6e-42a7-abff-72f2a51a98b5",
                    "title": "CAM 117-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.909149938,
                            -75.2748359556
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "7786d859-473a-4577-8698-f725b23df187",
                    "title": "CAM 117-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.909149938,
                            -75.2748359556
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "58090f02-1a59-4bc0-b539-c894a84b1526",
                    "title": "CAM 118",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9182621512,
                            -75.2760391367
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "85ed38ac-a115-4669-a621-3c502a5c3358",
                    "title": "CAM 118-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9182621512,
                            -75.2760391367
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "ebb7e317-d67b-4af0-8593-b56def19de43",
                    "title": "CAM 118-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9182621512,
                            -75.2760391367
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "1daf212e-a98b-489b-b47b-dcaa5b5c726f",
                    "title": "CAM 119",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9231417677,
                            -75.2620454121
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "638bad31-1f28-4316-ae56-ef36ebf2833d",
                    "title": "CAM 119-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9231417677,
                            -75.2620454121
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "84239e47-f7d7-4d21-9bb0-64b68ef3c32f",
                    "title": "CAM 119-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9231417677,
                            -75.2620454121
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "e2a0d810-20fb-4d73-be6e-2bb18251b435",
                    "title": "CAM 99",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9205046573,
                            -75.2643667338
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "f2e824ea-1b98-428b-a61d-6eb73b3f2df4",
                    "title": "CAM 99-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9205046573,
                            -75.2643667338
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "542baf2d-9c42-44f7-929d-adf38953cb3b",
                    "title": "CAM 99-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9205046573,
                            -75.2643667338
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "e6dcd11e-0abb-4af3-bc07-871c8c2d7a6d",
                    "title": "CAM 100",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9196578215,
                            -75.2659478146
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "184e143f-008b-4814-ab9e-cfb0e1594b99",
                    "title": "CAM 100-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9196578215,
                            -75.2659478146
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "37e8cd65-c92d-4a5b-9760-99b8cb9aa174",
                    "title": "CAM 100-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9196578215,
                            -75.2659478146
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "5ff23c94-74ce-4b68-9a9f-52fbd7cd1bad",
                    "title": "CAM 101",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9781944525,
                            -75.2824432422
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "3025f50c-957a-4164-9b4a-4fcfaa9a9a31",
                    "title": "CAM 101-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9781944525,
                            -75.2824432422
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "6c6f221b-d4e4-474a-aad1-a1417d2f1e94",
                    "title": "CAM 101-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9781944525,
                            -75.2824432422
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "0ab17855-87d8-4d93-8311-aefb706921e4",
                    "title": "CAM 102",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942064036600001,
                            -75.2416593064
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "21fc0647-1f10-4d2f-8606-40d9d9251607",
                    "title": "CAM 102-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942064036600001,
                            -75.2416593064
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "44fb25e7-3fa7-460a-a53a-2594f17f74db",
                    "title": "CAM 102-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942064036600001,
                            -75.2416593064
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "857ba311-a481-45f5-8e6f-c7d6489d116a",
                    "title": "CAM 104",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9517982692,
                            -75.2523238675
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "e6d30be2-3f18-4d43-bd4d-b92ed504aaa6",
                    "title": "CAM 104-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9517982692,
                            -75.2523238675
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "b2f611b7-f920-4355-b8b5-8a96e7fdb4bc",
                    "title": "CAM 104-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9517982692,
                            -75.2523238675
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "ee7fd21f-3522-424a-8c2d-70d7972d2f85",
                    "title": "CAM 105",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9473020513,
                            -75.2557417769
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "e745e0af-5cea-4809-9bb1-842d3d304e61",
                    "title": "CAM 105-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9473020513,
                            -75.2557417769
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "d03c3722-2395-42c3-9b2c-95ab84d0967f",
                    "title": "CAM 105-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9473020513,
                            -75.2557417769
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "6f06f3ad-b382-4544-bf31-4aaeb7ba89ca",
                    "title": "CAM 122",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.974083845,
                            -75.28596879
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "1ea4eb1d-2cbb-49bf-b764-4a0aa50e7fe6",
                    "title": "CAM 122-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.974083845,
                            -75.28596879
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "b363da97-677b-450d-bca7-df5ec1e8ac07",
                    "title": "CAM 122-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.974083845,
                            -75.28596879
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "572eea07-50ba-4b17-8523-69bb1b4017b2",
                    "title": "CAM 123",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9720179012,
                            -75.2884062674
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "aad27468-4861-45a5-a7e0-bace046a71c1",
                    "title": "CAM 123-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9720179012,
                            -75.2884062674
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "75d6e35f-5c22-42e4-9ae1-4a3377eae091",
                    "title": "CAM 123-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9720179012,
                            -75.2884062674
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "f531e3bd-081a-4647-bc68-ae1c15401442",
                    "title": "CAM 124",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9164672412,
                            -75.2694669504
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "eeae73f9-ed7a-4f51-95a6-d89ed8d705e2",
                    "title": "CAM 124-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9164672412,
                            -75.2694669504
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "e49888d4-aa23-431e-be0b-94ed9014ddae",
                    "title": "CAM 124-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9164672412,
                            -75.2694669504
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "f76eb559-9ce2-4235-98df-47936a16942b",
                    "title": "CAM 125",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.8988130237,
                            -75.2617748521
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "7bbaff36-8a74-458b-85e2-b64157f4c8b6",
                    "title": "CAM 125-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.8988130237,
                            -75.2617748521
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "d5707a32-9a7f-469f-88b9-34cda8ab7162",
                    "title": "CAM 125-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.8988130237,
                            -75.2617748521
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "4696f19d-d7da-42b8-843c-de2d361e974c",
                    "title": "CAM-126",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9235419182,
                            -75.2651755039
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "3934e186-1757-4292-8252-5266cd5d6e65",
                    "title": "CAM-126-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9235419182,
                            -75.2651755039
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "5aab82ac-abbb-40dd-a771-2eb6d1248e02",
                    "title": "CAM-126-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9235419182,
                            -75.2651755039
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "43e23d75-85af-46be-8420-0d115b15c0ab",
                    "title": "CAM 127",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.919066618700001,
                            -75.2722326151
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "c0b12b27-df2e-4657-b531-d46e415cacb7",
                    "title": "CAM 127-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.919066618700001,
                            -75.2722326151
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "4fa96369-5802-4e9c-8d0e-5c961ee4119f",
                    "title": "CAM 127-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.919066618700001,
                            -75.2722326151
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "95effb64-4d73-4f68-aced-db8861386afc",
                    "title": "CAM 128",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9370838573,
                            -75.2984421241
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "f3c9645f-97b3-4144-ba14-e89b2db22a8d",
                    "title": "CAM 128-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9370838573,
                            -75.2984421241
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "a2cd255f-9362-4f3a-a887-510eb5275f0a",
                    "title": "CAM 128-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9370838573,
                            -75.2984421241
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "1587e7ab-4958-4975-a52d-e9aa16365b90",
                    "title": "CAM 129",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9270278526,
                            -75.2888813394
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "562b0f8e-aa2c-41fb-bdda-2472aa6e1d4f",
                    "title": "CAM 129-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9270278526,
                            -75.2888813394
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "21cfa375-9ecf-4f41-a5f7-222f421d2b7d",
                    "title": "CAM 129-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9270278526,
                            -75.2888813394
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "79cf5adc-c5dd-4d28-9d94-aed7751544f7",
                    "title": "CAM 130",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9349729849,
                            -75.2675369405
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "07d053e8-382a-4c1b-90d8-b3a688f512e4",
                    "title": "CAM 130-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9349729849,
                            -75.2675369405
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "1030cc23-1c81-44b9-bab0-84b65873015d",
                    "title": "CAM 130-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9349729849,
                            -75.2675369405
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "806fdd75-4cab-4270-aeac-6f51520e6d51",
                    "title": "CAM 131",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934219004900001,
                            -75.2926854185
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "86c2deff-0104-401f-a881-b5fe87b4ba0c",
                    "title": "CAM 131-F1",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934219004900001,
                            -75.2926854185
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 29,
                    "id": "fa9f49a3-6503-4fe3-b948-fe64103d1bed",
                    "title": "CAM 131-F2",
                    "properties": {
                        "Estado": "Nuevas"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934219004900001,
                            -75.2926854185
                        ]
                    }
                }
            ]
        }';
        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('public_safety')->insert([
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

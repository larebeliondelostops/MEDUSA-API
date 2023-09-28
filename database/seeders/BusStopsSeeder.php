<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BusStopsSeeder extends Seeder
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
                    "id": "2c3cdf3c-b1f5-4e37-932d-368aea19ae60",
                    "title": "701",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923654563101735,
                            -75.2620662482639
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "adaa9ca3-13a8-4857-9ab4-18f1e46c87d5",
                    "title": "470",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.968172432000074,
                            -75.28661042199997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fb3f8fc9-7e8e-482d-8267-205dd9111ca6",
                    "title": "443",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93014297422718,
                            -75.29308615124602
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "227cb34b-078f-4523-9d1a-f700bf9f6835",
                    "title": "444",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934481835000042,
                            -75.29421403099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "40d02a49-6e7f-4d37-b302-00ea65497bfe",
                    "title": "445",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933132717788792,
                            -75.29377747816358
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4211bd5b-f490-4944-a4eb-4dd308008846",
                    "title": "484",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934437971000023,
                            -75.29458999899998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0006e16c-3905-4491-9656-00b878bcb03b",
                    "title": "403",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926370097000074,
                            -75.29149268699996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bb7d9fb3-11f1-4e9c-94a1-f6b54569f214",
                    "title": "289",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.951657813491483,
                            -75.25150937508211
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "33a16865-7222-42ce-8632-7aea328392e8",
                    "title": "442",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924114752661197,
                            -75.29070015135619
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "275ed042-e7d4-4942-9dfd-faa674de9762",
                    "title": "700",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925486726200335,
                            -75.29127613317232
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2c4ed403-5ff5-4ee6-9e19-188f36dddd20",
                    "title": "485",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932490261003732,
                            -75.29396665619659
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8b8c9ff0-6302-4048-b53e-b4f5c97b1647",
                    "title": "486",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930068657000049,
                            -75.29328409399994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "402ca60d-4065-4438-b2dd-d40596225bf6",
                    "title": "487",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928388011000038,
                            -75.29269020299995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "cb64f289-a74a-4f28-bd66-bc4a36fe2d77",
                    "title": "488",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926282904000061,
                            -75.29185537099994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e2701ffa-8667-4f63-a0eb-86220338a4ed",
                    "title": "699",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924791206770561,
                            -75.29118765150474
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e76db916-c3c3-4c1a-bcf3-1b1768b9bdc4",
                    "title": "489",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924155842831801,
                            -75.29099308166263
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7f01c9c5-47fa-4414-be87-2f8d1133c39d",
                    "title": "490",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923014349000027,
                            -75.28896548199998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7f86b722-c272-432e-b5a0-040d95590299",
                    "title": "441",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923281158000066,
                            -75.28910526099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bfec2f24-4079-480e-9b18-8135f8bd98dd",
                    "title": "677",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924929279202251,
                            -75.28956602891688
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c5f30e3a-4af6-4ee1-8806-c759552c02a9",
                    "title": "660",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930011346000073,
                            -75.29142273399998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "71fe0160-5cc3-4935-975c-c6c3c1354cb1",
                    "title": "657",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935264011000072,
                            -75.29318525799994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "56e6617c-90fe-46f6-b050-6b4193a89cea",
                    "title": "656",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93620674500005,
                            -75.29302040799996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "583f9f25-7303-4577-8c1f-7e93ebf1cc7f",
                    "title": "658",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932927061737784,
                            -75.2922379183468
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "94a3bf0a-8f14-41ac-a6a8-01ea0fb24f53",
                    "title": "659",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930635034901891,
                            -75.29130712068394
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "aa7fd767-6827-4858-98a5-e6596d321d82",
                    "title": "600",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921792419000042,
                            -75.28688681499995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "11a857f3-7c42-480c-b733-f8cab2619279",
                    "title": "653",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930868156563474,
                            -75.29032870761895
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "982357aa-3dbc-460a-8488-f733d30d30f6",
                    "title": "655",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932567910870692,
                            -75.29094177045583
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a2abc3b6-6fd4-4ec7-b229-cf3635528c9c",
                    "title": "654",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934997138000028,
                            -75.29180569699997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b1a49b2e-082c-4060-9f2a-67435ec50160",
                    "title": "491",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923813248000045,
                            -75.28671345199996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3f0c46d7-a78b-4cd4-bbdc-74315c9033f0",
                    "title": "440",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924047054000027,
                            -75.28681626199995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "04fd5703-a254-413e-9edd-16c7a3e94f88",
                    "title": "675",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925654862000044,
                            -75.28768237399998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "01218c86-40e1-477d-bd6e-89dccd85a738",
                    "title": "661",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930775867000023,
                            -75.28897750899995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "924d4a7f-2006-4bbe-a766-c77fa7b2b506",
                    "title": "493",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921567790006978,
                            -75.28487280867193
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "092b6e90-096f-416f-a902-70ad2309d40d",
                    "title": "424",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921569779000039,
                            -75.28461963799998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "35fb7b18-1891-4a49-9d5d-c15970757d38",
                    "title": "425",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923866162883385,
                            -75.28540849054431
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "df562941-d2b4-495a-9512-9ed1dd195354",
                    "title": "492",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923771224409527,
                            -75.28562036725631
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "986c6d57-c7d8-437e-ab27-030c8dc0b3f2",
                    "title": "426",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926450842000065,
                            -75.28624690799995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d02e2cc8-1803-4e33-8671-7b53183a685f",
                    "title": "511",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92641878400002,
                            -75.28651678599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "19a13be3-172a-4dd0-84c8-fa6352f0f221",
                    "title": "427",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929056085419349,
                            -75.28702975607081
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3cc54927-6681-491b-90ae-d30783cd5cae",
                    "title": "512",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929005975444054,
                            -75.28721884584336
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f6ba6c6c-ebe8-4a3c-bf72-a0d428eb08be",
                    "title": "428",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930594063766743,
                            -75.28746988216773
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1057883f-0c13-41f3-8e92-91f3640529d9",
                    "title": "513",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930856711000047,
                            -75.28783177499997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1b5cfc0f-d874-4d4b-a535-9c8420badd8e",
                    "title": "431",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933163545390913,
                            -75.2882910427536
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3025c394-f446-420f-aaff-7b0473f06840",
                    "title": "514",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933066980231263,
                            -75.28854716326025
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b53c8be2-a779-453a-8bd1-165765f0339e",
                    "title": "438",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934826895381843,
                            -75.28869229302738
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c43e2f96-5e18-42ab-94fe-23ac9d6c8741",
                    "title": "515",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.9347717516038,
                            -75.28886791401132
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a51b63b6-e2e8-43cc-b113-d49fbc2fb957",
                    "title": "439",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937220306323348,
                            -75.28903106993843
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "21151474-59bb-42dc-815f-2c777c0fc97b",
                    "title": "516",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937159766000036,
                            -75.28924998599996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1f0e1fc0-0e16-4080-b1a2-220710f30c5f",
                    "title": "127",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.939879807000068,
                            -75.28436580999994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f81e4ea8-f17c-4579-9234-fb1014471439",
                    "title": "124",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.939593586000059,
                            -75.28429991699994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7b04de06-39f2-45f6-a2b6-e9ae038d2293",
                    "title": "580",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940137073563399,
                            -75.28281455497265
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c2876a86-8179-433f-8a9f-3f92b3df4d48",
                    "title": "579",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940283261735484,
                            -75.28281014518642
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9c9a5364-e420-482a-ab4f-f619bc984761",
                    "title": "368",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.939117325579017,
                            -75.2862410019571
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5d23e2eb-a7a0-478f-805b-cfb848a76e28",
                    "title": "369",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938917596371914,
                            -75.28621019306757
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c12303a0-3672-42a7-ae46-eb11c7044503",
                    "title": "578",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936078192906769,
                            -75.28161957989725
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6f6098f9-ad66-48ab-a846-9f4cb9bdf0f3",
                    "title": "577",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936085557090239,
                            -75.28134424239015
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "67a78f04-1f19-4ea4-8753-70c0efebaf8e",
                    "title": "367",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937969079396233,
                            -75.28892918790264
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "06ac1bab-a8b5-4280-bb70-5e54270f6d2b",
                    "title": "370",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937746508077416,
                            -75.28896311635869
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7c308cbb-bde3-4d28-aac4-a62f9d37343a",
                    "title": "576",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932390859926648,
                            -75.28016197876022
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c5b9b3f1-70d4-477b-b8ce-19f68287af5e",
                    "title": "125",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931015445569524,
                            -75.28514073426055
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5690fb3e-198b-4ea4-92ce-018ba1d2917e",
                    "title": "371",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93090535500005,
                            -75.28538845899999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c04d1cbc-2997-4ccf-98b0-144c022dab68",
                    "title": "412",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.927477465000038,
                            -75.28488136999994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "855cc18f-5cf1-43c5-be6e-02da37bbc440",
                    "title": "15",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926454768000042,
                            -75.28490654299998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "856b5c68-4353-468b-811d-ba10972751d2",
                    "title": "400",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925490655000033,
                            -75.28479370399998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3174bfd6-fe8d-427f-9088-67cfedd1fe6e",
                    "title": "393",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924926731000028,
                            -75.28498748499999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ad5ae8b2-f529-4070-a6e8-52d7024e1fbb",
                    "title": "429",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929151416000025,
                            -75.28401527999995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f3dd492e-d58e-443e-a6d1-3d94db8c52d4",
                    "title": "176",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922946829000068,
                            -75.28341731799998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a6ba643b-6722-456c-a2a3-b7c8c9cb4964",
                    "title": "175",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922775071562363,
                            -75.28353531320404
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ebc041b6-6439-4429-8f39-cedcc898518f",
                    "title": "625",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929819119000058,
                            -75.28245648199999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bf68f91f-2d93-45a8-9f81-1f258a32608e",
                    "title": "410",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928226037000059,
                            -75.28271230399997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0710eb38-e71e-4142-98dc-c60a4759319e",
                    "title": "16",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926393586000074,
                            -75.28263797099999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9eee3b47-026b-455d-9bd1-c4ea0d2f1689",
                    "title": "12",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926209432000064,
                            -75.28270113099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1a863021-5e1e-4bad-997a-2adfc88f4426",
                    "title": "177",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923021271942361,
                            -75.28035804669982
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3724a718-3b67-4aab-ac7f-3ba5e5299d13",
                    "title": "178",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923165104741194,
                            -75.28024393569048
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fb1970ae-356e-42f8-a7bb-2d8d9728ee5d",
                    "title": "14",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926737629000058,
                            -75.28065170599996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "db5032fe-9dce-4516-9459-a79ee91b086f",
                    "title": "13",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926944491000028,
                            -75.28057042199998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fa46f884-26d7-4ebd-8b7b-28a7910525c2",
                    "title": "411",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929300943000044,
                            -75.28032758299997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e72a42df-c529-4b85-8e74-1833546bb703",
                    "title": "413",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930206830000031,
                            -75.28051360699999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "82e5abae-05bb-4319-85ac-588368cd37ac",
                    "title": "575",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932601740179004,
                            -75.28003034208186
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2589716f-7f5e-495d-bdb8-b60aea48e9d1",
                    "title": "573",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931164631000058,
                            -75.27947265599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "64890c2a-2fa9-4f98-80a1-adf0eaa71fa4",
                    "title": "574",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931136112000047,
                            -75.27967229199999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0b1d033c-f164-4172-aa09-71c3eaa2731d",
                    "title": "570",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929103076000047,
                            -75.27898785099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "adebd3a8-c6bf-4ef2-b308-9979418285c2",
                    "title": "571",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.929129748000037,
                            -75.27916774699997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ef4999c4-4de5-4219-a304-f47a13cee14f",
                    "title": "569",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926493108755928,
                            -75.27901285745304
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8d487073-eda4-446a-9fd4-3e704e561385",
                    "title": "572",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926339592000034,
                            -75.27916636899994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bc9ff71f-fba4-443a-8094-ba1369e44ea0",
                    "title": "567",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923865539326195,
                            -75.27926125577478
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e560d288-b0a7-4619-8b53-5d5fedf32587",
                    "title": "568",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923830229000032,
                            -75.27937267199997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "21978545-16e8-468b-90b6-7127383fe22c",
                    "title": "565",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921692733000043,
                            -75.27937718299995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9862ae45-29f4-4881-802b-18efa0a9ea18",
                    "title": "566",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921676300000058,
                            -75.27951373799993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "531d7020-ed98-420d-88e1-0b2c13db2187",
                    "title": "419",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910138590000031,
                            -75.27687128199995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c09c9d80-a082-48bd-a99f-cf0e6f2cd1c6",
                    "title": "500",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.909888487000046,
                            -75.27696525099998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c9f33e72-7ecc-40dd-8228-a8b35420309f",
                    "title": "560",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.90879579500006,
                            -75.27411708599993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8425857b-24e5-4d95-93bf-06489a083f5b",
                    "title": "559",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.909028487000057,
                            -75.27400665499994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2c760bec-39b3-4109-8753-cf367b21a666",
                    "title": "418",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.908142165000072,
                            -75.27178085399999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "78143216-fe11-4c6c-9282-25f829dd60fe",
                    "title": "501",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.907931423000036,
                            -75.27186923999994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a7437d70-047d-4d65-b58f-4b46c0799077",
                    "title": "417",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.906734925000023,
                            -75.26900617499996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2bf0d58e-6eae-448c-9576-130e9b067291",
                    "title": "502",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.906500005000055,
                            -75.26914133899999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0940ba82-52a9-4b96-88fa-78d715623889",
                    "title": "416",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.904561161000061,
                            -75.26742161499999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d2552da6-a294-46c8-984c-afc33937e937",
                    "title": "503",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.904437294000047,
                            -75.26768291099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "08d8e034-1178-49dc-8604-295bfaaa3030",
                    "title": "415",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.901620621000063,
                            -75.26611701099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7856f49e-fcce-4d6a-bf6a-60b3aa28c43d",
                    "title": "504",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.901523085000065,
                            -75.26637008099993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "010a337e-aa52-4f95-996d-09f080a51c72",
                    "title": "436",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.899676281000041,
                            -75.26500874599998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5a311e5b-7077-4b77-a862-37242b6b8261",
                    "title": "505",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.89956987000005,
                            -75.26522463699996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "240f67df-6bf9-4f00-b262-7a80c0551fe2",
                    "title": "435",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.897841376037515,
                            -75.26285010814212
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7fa75724-54d1-4803-ac60-058a2a3a35a5",
                    "title": "402",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.89746043481774,
                            -75.26286227727698
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4683c39e-ef7d-4bc3-8475-77cbbd3862c8",
                    "title": "629",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938289505000057,
                            -75.27689556699994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9bbd9dfd-fdc4-470c-99db-fa4a421cd3a8",
                    "title": "641",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938155056388321,
                            -75.27783544896185
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8e3df626-804a-4c33-bdbb-93f4f369a81a",
                    "title": "631",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940682780000032,
                            -75.27220696499995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7e679aa7-2d94-41b8-b07d-a7cb7a638780",
                    "title": "643",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940912084000047,
                            -75.27205445799996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a3c39812-60e0-4480-8ffa-daf2479e8097",
                    "title": "632",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940587400326115,
                            -75.26902185906377
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6f86de46-b742-4b12-b57c-c74b813c269f",
                    "title": "644",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940801273000034,
                            -75.26951222299994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a27bbeae-0bec-430f-be21-f110aa475b34",
                    "title": "633",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94068598274321,
                            -75.26696390510514
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e2f0a6fc-c3db-434f-834e-f6c2abc4ada3",
                    "title": "645",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940846033000071,
                            -75.26692196099998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "68a2a711-d6c8-42de-a1ae-3e4e38214564",
                    "title": "626",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940838785000039,
                            -75.26439922199995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6148f1b3-8eb4-4e8b-874f-c4f1d80d7ffa",
                    "title": "627",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941090429000042,
                            -75.26408597699998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2da2b113-1c03-46f6-9e3f-a5b2d14c12f7",
                    "title": "646",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94051668700007,
                            -75.26139506099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "81b8f79c-a378-4b4b-92b5-8f814fe791de",
                    "title": "634",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940297159000068,
                            -75.26147732199996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0958646e-2a39-41a6-a239-9129110bb487",
                    "title": "635",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940152406000038,
                            -75.25871480099994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ff421088-b006-41f1-b6c6-ab69a74fcf47",
                    "title": "647",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940438270000072,
                            -75.25861990299995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6c80235a-2dd3-45f4-9afb-6273ddd549a9",
                    "title": "636",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.939993260000051,
                            -75.25597119499997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6d7ef983-d2cb-44fb-9cb2-8e5f4113c5ae",
                    "title": "648",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940233954000064,
                            -75.25602207399999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "36f61ac4-9bdc-4540-9d18-8598d833eba4",
                    "title": "637",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.939928918000021,
                            -75.25330125099998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a10bae06-9cf0-49fb-af7c-bad8ecd27dcc",
                    "title": "649",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940130272000033,
                            -75.25320590099994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "63e6d69c-4c3f-452c-877e-27395e8485f4",
                    "title": "638",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940089697732321,
                            -75.251011951685
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a3f2297a-f5bc-4e72-a1d5-16fb2bb14c9e",
                    "title": "650",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94025197700006,
                            -75.25105554299995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ebd26d01-6005-4c0c-acaa-642bbb67752e",
                    "title": "639",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94094241800002,
                            -75.24844144399998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "24b5de46-3488-4dca-9616-cbbba34c90a3",
                    "title": "651",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941160811000032,
                            -75.24857275199997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "96a28648-3e52-4bdc-ae68-e4f025bdcda7",
                    "title": "450",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942034527000033,
                            -75.29230172999996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8d4c40c3-53b3-4265-a488-91b79af1df89",
                    "title": "480",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942348304000063,
                            -75.29243120499996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "879ce584-f00e-4fe0-afda-052e2c33958f",
                    "title": "451",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943854774539528,
                            -75.28940670929641
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a1c527f9-6366-4088-b198-6cf323419694",
                    "title": "479",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943994693709222,
                            -75.28953327473248
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "49306cd1-c374-4780-b92e-688a97b7137d",
                    "title": "452",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946572497000034,
                            -75.28825479399995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fa998fea-9414-4940-96e1-bfb8cc624eb8",
                    "title": "478",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946606711421746,
                            -75.28847328249334
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e355c424-7371-4811-99bc-f1e854e748be",
                    "title": "453",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949412308000035,
                            -75.28871813199999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8c7e5d2c-daac-4bbd-8b0f-ad95bd0316e9",
                    "title": "477",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949322166342339,
                            -75.28898323639275
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c95b7b2d-42e8-4c09-a138-7f3d07b26aa2",
                    "title": "454",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.952782924609575,
                            -75.29048891861282
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4494aa5f-d7c5-4094-adfb-e2c14fbc33ac",
                    "title": "476",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.952788442883941,
                            -75.29073931700854
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a7416b3d-10d1-49f4-8bd4-7085adb77a18",
                    "title": "455",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.955101742000068,
                            -75.28969961399997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fe149382-68e4-4cd7-98a2-dc87d6ee7ba4",
                    "title": "475",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.95518052700004,
                            -75.29002908999996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c5eef537-d089-42ad-9fc5-eccfc107b18f",
                    "title": "456",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.958044264010415,
                            -75.28890659930819
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7fba11f9-5d25-4a9b-b798-582b2601363b",
                    "title": "474",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.958049481000045,
                            -75.28914496299996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8f51e51f-da0b-40ec-90dd-3023db48e473",
                    "title": "457",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960476023000068,
                            -75.28808707199994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f9b81a0d-811a-4317-a7b1-86d6c2b013ca",
                    "title": "473",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960509591000061,
                            -75.28839980399994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e8006237-79f6-42c6-beb2-9e08f36d873d",
                    "title": "458",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.962905454000065,
                            -75.28753496499996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4769be4d-09ce-4bc9-a9ce-dc41308972fa",
                    "title": "472",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.96295120700006,
                            -75.28779349099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ace8116d-fc02-4986-9264-25d59e62eff6",
                    "title": "471",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.965600541000072,
                            -75.28737833299994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a17d7175-a605-4da2-8a0d-e8f2fe948a01",
                    "title": "459",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.966898900000047,
                            -75.28660921599999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fe24e439-0324-47e3-a2ae-c43792f94b39",
                    "title": "460",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.970340958000065,
                            -75.28571209099994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6e42f5d6-2ccd-41b0-861b-b2aac01e08c1",
                    "title": "469",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.970345445000021,
                            -75.28608747199996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c8d98b69-d2af-4275-9782-2e2da1df0e9f",
                    "title": "461",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.97282849000004,
                            -75.28513660399994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9b711657-5505-4006-b113-075a512ec26d",
                    "title": "468",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.972860659000048,
                            -75.28542222899995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "da151c0e-620f-4911-a770-c9784be4ceb0",
                    "title": "462",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.975482373000034,
                            -75.28455126299997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8f7ec4bf-2cbc-411c-9907-e3880bad38f0",
                    "title": "467",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.975543841000047,
                            -75.28472440199994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "09f7bcf8-aabb-4217-87d6-4313cc8c1ea9",
                    "title": "463",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.977498953000065,
                            -75.28399837599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3e4f2874-d0d4-410c-9917-7d4ee19d1eb8",
                    "title": "466",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.977516712000067,
                            -75.28424806099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9b4ae371-a9b4-4931-8b23-73f3d64ef222",
                    "title": "464",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.979304543000069,
                            -75.28353068099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d6acc939-d2b9-4952-8e99-5bf415bfda3f",
                    "title": "465",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.979363155000044,
                            -75.28381562799996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8d273665-f555-4e21-9f77-5ebaf17de1a4",
                    "title": "430",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.928097870417123,
                            -75.28638870716185
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2131a5cc-d48d-4589-ac8b-7cb7724fd096",
                    "title": "652",
                    "properties": {
                        "ParaderosSETP": "Fase 1"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930293358423031,
                            -75.28811202173105
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b4695993-b258-4796-8218-018de41bf7f4",
                    "title": "481",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941226621000055,
                            -75.29564595399995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2d97aa57-62ad-4fc6-9876-14abaca287f7",
                    "title": "553",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.982353471013479,
                            -75.28247246670063
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1cba9ae5-208e-46a7-b7c7-8dc43e2853bb",
                    "title": "552",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.982577917655279,
                            -75.28250919837714
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c4a9514b-b57a-4ccb-9bef-0be3b8cbf95f",
                    "title": "7",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923462142988962,
                            -75.26516839466589
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f98eafbb-a783-48cb-a3ee-240646013589",
                    "title": "179",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922877278000044,
                            -75.27862392799994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "950fad01-cfd6-4b21-8381-540a29827a2d",
                    "title": "202",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923354349000022,
                            -75.27409327499998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bb3dd345-f85e-4129-93a8-00e6d2f7a083",
                    "title": "211",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922210627000027,
                            -75.26311472999998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "99d842db-31b2-4f2d-a916-909d21c4bcc9",
                    "title": "201",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923196376000021,
                            -75.27414652199997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1e95072a-2821-4a21-a300-52ae5781af34",
                    "title": "215",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924914975000036,
                            -75.26039516199995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "752abd1a-8acc-43de-9e90-2084497cb7f2",
                    "title": "213",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92389478900003,
                            -75.26164797599995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1cb9ea17-90b4-4f94-a17e-faf1c969ffa9",
                    "title": "216",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925054155000055,
                            -75.26037130999998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "66965b0d-a75b-4bbb-b948-e0a0bc4abc2c",
                    "title": "214",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924049087000071,
                            -75.26166666899996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a3527d34-9392-425b-89b8-7d3c5c6d66a2",
                    "title": "448",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92843918697905,
                            -75.29244423400961
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9d1fd1c4-ace5-4529-a7d1-31420e5b2879",
                    "title": "221",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923736871000074,
                            -75.26716281699998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1cc8e654-5e46-4456-97dd-c259450e0712",
                    "title": "212",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922439330000032,
                            -75.26302401199996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e6a465a2-0108-437d-9c4d-6f6ae46b215a",
                    "title": "210",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922473733000061,
                            -75.26527881399994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "42bd5c7f-2b8c-4956-9834-752df298136f",
                    "title": "226",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925908451000054,
                            -75.26906413199998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b1a9692b-fe11-4ed4-be0a-d0f9fc86853a",
                    "title": "209",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922332945000051,
                            -75.26510501099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3cc5fe9b-57f4-44bd-bdd0-c9c86ee2ca01",
                    "title": "222",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923882359000061,
                            -75.26706561499998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "de502f06-0be1-43f4-91b4-016a6818f103",
                    "title": "4",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925271163000048,
                            -75.27119551199996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e8f3c8d5-affc-450b-aea5-8a4d5885cfb8",
                    "title": "223",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925730862000024,
                            -75.26710530999998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c42db75a-ac8b-48cd-b515-4752e3f85792",
                    "title": "224",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925606966000032,
                            -75.26717800499995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8c13f69d-8ad8-4871-9bea-ec51f7fd6476",
                    "title": "225",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925748078000027,
                            -75.26917585499996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "834237fb-0b87-442c-8104-417bd432654e",
                    "title": "6",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.925466628000038,
                            -75.27111494799993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a787a5b7-9b54-4e32-a83f-e8b4429efff8",
                    "title": "207",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921392848000039,
                            -75.26713131399998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8296f738-2549-43d0-aeb2-42cca66615d7",
                    "title": "10",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926452193000046,
                            -75.27441925399995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0d9660af-74bf-4fae-bbeb-da69b2a53a6c",
                    "title": "5",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923527521876058,
                            -75.26521544952809
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1d784484-60f2-44d6-809f-48d50fd28750",
                    "title": "11",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926489418000074,
                            -75.27453159999999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "02f42494-cd1a-4a53-8adc-8300219dce54",
                    "title": "208",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921524393000027,
                            -75.26710534499995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f5f9779d-7bc3-4765-8196-261f280aed1f",
                    "title": "58",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.985912366000036,
                            -75.27597430999998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5c3eabcc-371c-4776-b93f-3310f5b18b16",
                    "title": "205",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92479692448029,
                            -75.26704551956074
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "28f1c991-989f-4a0b-841e-4ae5169612ac",
                    "title": "0",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.927076131000035,
                            -75.27828291299994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9ebce3c4-ca15-4389-8b47-8cfa129b86ac",
                    "title": "206",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924908870733901,
                            -75.2669661961061
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "87b4c690-e76f-4a64-8c5b-317b059cd319",
                    "title": "204",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922777669000027,
                            -75.27149207899998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a740c101-9dc5-467f-8df1-c6f6f6208fe8",
                    "title": "187",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.920637784000064,
                            -75.27524085799996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f0712208-b0e5-4e73-911a-e6bf34921757",
                    "title": "203",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922253286000057,
                            -75.27224895199998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "45af0075-5c8a-4e5c-97a3-7b4cd11fb333",
                    "title": "188",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.920540828000072,
                            -75.27482395099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5a0d6543-c325-4610-80c1-37e8c76961d6",
                    "title": "190",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.920011026647449,
                            -75.27204051588559
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "438889cd-fa12-43c0-bbfd-7ad4a45add8a",
                    "title": "8",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926512606000074,
                            -75.27664882099998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "711ae36b-6962-4b8b-9681-fd397a9f57c1",
                    "title": "192",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918999819000021,
                            -75.27006577599997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2d816033-b019-4dea-af4f-5e253f5cbda2",
                    "title": "193",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918309122000039,
                            -75.26827935699998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "24f8266b-6329-438e-839b-cbb15a0d1173",
                    "title": "195",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.917159888000072,
                            -75.26638816999997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6aaef5ba-35d4-4cd0-8999-210ba622fd4d",
                    "title": "196",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.917380169000069,
                            -75.26635636499998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8fb2ff0f-0c4a-4966-a149-517cbba6983a",
                    "title": "198",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.919063662000042,
                            -75.26439929799994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "aa73177d-0f5f-4175-b692-19d2f687bca5",
                    "title": "197",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918843453000022,
                            -75.26437639599999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0b2aee40-a75b-4958-947d-a1ae3d1feefa",
                    "title": "181",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921742153000025,
                            -75.27811828899996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1033f29a-71f1-46b6-8d54-29920921cb5e",
                    "title": "191",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.919184082000072,
                            -75.26992662999999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ec7d6636-6558-4bf4-aad6-8a1c527c2145",
                    "title": "194",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918204160000073,
                            -75.26849284099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5d336893-421f-41a5-9259-90ecca2ecc7b",
                    "title": "189",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.919860459000063,
                            -75.27193951399994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bafd89c1-ec48-4356-8ab5-2ed0288d25c5",
                    "title": "182",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921833132000074,
                            -75.27801649699995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "561d2dd7-a8cb-4f9d-b67d-4c69d3c6c4f5",
                    "title": "186",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921185511000033,
                            -75.27635452299995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "cb92f2c3-9faf-4e4e-8bd4-94b18fe0190f",
                    "title": "183",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921067733000029,
                            -75.27645723099994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "01c2d371-9c7c-4f1a-9fed-91337b9cfbf5",
                    "title": "199",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922893073000068,
                            -75.27610050999994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b2baf370-bee0-403e-af71-0714deea479e",
                    "title": "200",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923060670000042,
                            -75.27601641299998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ec97a2b2-792b-46ac-a2f1-c5bb56be64f9",
                    "title": "3",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92663738500005,
                            -75.27651410999994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7eb9fd1c-4a74-4931-b6f5-7c93748e3628",
                    "title": "9",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.926935044000061,
                            -75.27830166199993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "268d53c3-ce5f-4e36-bfac-88e3eadc8b7d",
                    "title": "180",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92305054600007,
                            -75.27871530599998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "458d0a79-78a8-48f9-bd70-474b1b41ec82",
                    "title": "59",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.985942902000033,
                            -75.27549559899995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b3a60d0a-d943-4357-a71f-0eb89996dff0",
                    "title": "61",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.98795076600004,
                            -75.27253126199997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "dfa2de47-c14d-43cf-a92e-d1b1f1c6df7e",
                    "title": "60",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.988304149000044,
                            -75.27245023699999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "376d333f-ffd7-4f2d-aa5b-c0f95a0f9f41",
                    "title": "63",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.991048041000056,
                            -75.26935059299996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4a99c00d-a01e-483a-ab9e-a4a0e25e8824",
                    "title": "62",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.991414598778021,
                            -75.26937771906564
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2d44b4cf-816a-4437-9ff9-c6441b73b07c",
                    "title": "65",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.995777222000072,
                            -75.26747638999996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4b742902-aa69-419b-a0df-334a84302f1c",
                    "title": "64",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.996127751000074,
                            -75.26773474099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2aca4cf8-98f6-406a-bc72-c46baba0460a",
                    "title": "67",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.005373746000032,
                            -75.26385662599995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "905c2202-acf6-4044-acf3-a0438f8e6793",
                    "title": "66",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.006239274000052,
                            -75.26401253299997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4e84b376-3767-49b2-96ce-5c0f90bb58f5",
                    "title": "69",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.013039770000034,
                            -75.25939659199997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "33222933-168b-42b9-854e-63f11a561220",
                    "title": "68",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.013002929000038,
                            -75.25967010799997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "88090649-6354-43f1-97a7-80715c93f721",
                    "title": "71",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.019067047000021,
                            -75.25522189699996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "dfe84a5b-d01e-4f4d-b91a-4db180c98e50",
                    "title": "74",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.02648222800002,
                            -75.25220124699996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b065c760-dd31-4d67-a017-0d05d381b12d",
                    "title": "75",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.02670272000006,
                            -75.25226978699999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e95b44cc-a3e8-479a-b553-6844eef83f1b",
                    "title": "77",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.030834666000033,
                            -75.25044448999995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c50e32e0-a3cd-4872-9c8a-468675641f54",
                    "title": "76",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.031087395000043,
                            -75.25054519799994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "79b2047f-9940-4be1-9d35-889b96f8d9d0",
                    "title": "78",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.035090619000073,
                            -75.24946296099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fe184e4d-a4ff-4f12-8437-5c552981ad6d",
                    "title": "79",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.034920802000045,
                            -75.24955959899995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ec4d6d64-3e56-4ae8-ba30-4c6aa70f46c7",
                    "title": "558",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.035735574424611,
                            -75.25156870876913
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fc3c5e95-a9a9-45d7-8285-8b5aeb91569d",
                    "title": "557",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.036037512762128,
                            -75.2531601228025
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c5c48b80-7db4-4651-8a20-490751a500b5",
                    "title": "556",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.036973924262486,
                            -75.25239669627132
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5227b258-c9d9-48c4-b9d5-ddc7a7724ffd",
                    "title": "555",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.037076090732519,
                            -75.25096343716359
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "31ea390e-a696-4a86-9889-992c60dcd7f1",
                    "title": "408",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.036649577000048,
                            -75.25023787899994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "104ef294-7288-4f1d-96fc-ca90b97df0d0",
                    "title": "73",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.023216154000068,
                            -75.25351415699998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "01079c84-5839-4eb9-98cb-cff4c3e6f285",
                    "title": "70",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            3.019408835000036,
                            -75.25531348999993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1aeb9332-ef53-405a-86a4-8196b27fe66a",
                    "title": "449",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941045362000068,
                            -75.29550624199999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0e054c2e-9466-4b3d-9b4c-bd2716f90c4d",
                    "title": "541",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941748761000042,
                            -75.29748085699998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "87a746f4-a77d-49a4-b82d-fb46e1994724",
                    "title": "383",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937837529000035,
                            -75.27644512799998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d29bda4e-e514-41fa-ae37-fa3471e9b150",
                    "title": "540",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941627073000062,
                            -75.29792894299999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f5dff4b6-a17e-4b94-bbb9-fdbe13e2baec",
                    "title": "542",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943442269000059,
                            -75.29707060399994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f6a580e6-7f22-4cb9-aedc-6cdf6ec1d51b",
                    "title": "543",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945000773000062,
                            -75.29665678399994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0cab336c-6961-449b-b75a-8ca158009e73",
                    "title": "131",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943625842000074,
                            -75.29201808899995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8ace61a3-22ce-4baa-a85d-c99e78d0f4a5",
                    "title": "409",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.865300239636723,
                            -75.22892655844444
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "793b95c7-6caf-48ae-a548-0be522538640",
                    "title": "128",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946875211000076,
                            -75.28946176199997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "52dc0f05-8cf5-48cc-bc49-1d779d2c5d2a",
                    "title": "126",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.947020567000038,
                            -75.28931532499996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "12f1f89f-3567-4f9e-a210-7bbf2c3bb185",
                    "title": "129",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945424520000074,
                            -75.29055739699999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7ef0bed4-679d-4790-b6b3-6c69baf34f9c",
                    "title": "132",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945517371000051,
                            -75.29069138299997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "99c98043-2467-492c-b478-f2d88ccff86d",
                    "title": "130",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943727295000031,
                            -75.29185635399995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c57667bf-f798-40d0-b8c9-11233202f764",
                    "title": "433",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.864050159000044,
                            -75.22992579499999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e59e91e3-8889-4adb-8f9a-f2a248b6b7e3",
                    "title": "508",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.864881438497877,
                            -75.23060928686176
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a3bd5c83-236b-48bb-b57a-10505568b507",
                    "title": "432",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.863356845000054,
                            -75.23147766899996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "80cc03fb-40b2-46c9-b99c-1b524d5ec37c",
                    "title": "692",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.863422704119921,
                            -75.23262472967592
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "23cb87d4-7d46-4a70-bc19-deb7d6c183f8",
                    "title": "693",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.863466913359527,
                            -75.23353585326676
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "010ae8b4-8dca-4614-b0e4-7fe0e7f78310",
                    "title": "506",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.86553088200003,
                            -75.23620409099993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "960735a4-6104-4636-8b0a-5c1280b2c627",
                    "title": "434",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.865763757000025,
                            -75.23630126499995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7e54211b-c227-40dc-b584-7f113927e47f",
                    "title": "56",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.870422088537882,
                            -75.2416777234163
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ecb459d0-c3c1-4d28-99c3-f9193b19ff7b",
                    "title": "41",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.870220942426061,
                            -75.2413065173431
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c8e79553-f867-49f6-bdab-3461ab4dfd58",
                    "title": "42",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.873844896594937,
                            -75.24460596306858
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "db4fd905-e337-4303-94af-0037043a0b91",
                    "title": "55",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.874073667720088,
                            -75.2450977759188
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "15cd7b5a-b9ef-4d04-94fc-fa4c1497aec3",
                    "title": "54",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.878271374000064,
                            -75.24833702599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3ee62153-f427-452a-8725-2e0fcbd23b7c",
                    "title": "43",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.878532449000034,
                            -75.24837656799997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c54f503d-64a1-4ce0-be9d-9e0f05383733",
                    "title": "44",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.884915198025287,
                            -75.25422868161857
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8c508467-2320-4d96-9f1c-f0429ec5b698",
                    "title": "53",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.884591685037255,
                            -75.25450463322434
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "64118382-fb81-4eb7-95f4-4202ec4f6400",
                    "title": "118",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.888288541000065,
                            -75.25732111999997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ed97cc2d-0e8f-4304-8d69-dc8330aa8ab9",
                    "title": "45",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.888770941000074,
                            -75.25731687399997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9d5cb11f-bef9-4042-9c23-b6ff1a5c96fb",
                    "title": "48",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.894115377000048,
                            -75.26031767699999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bfdb1742-9ae4-46a7-b567-615403d2433c",
                    "title": "51",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.893579852000073,
                            -75.26044930699999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5ca7e785-8afc-4094-bb5a-f4c0bd115c9d",
                    "title": "47",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.898344215000066,
                            -75.26187918799997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ee6fed5a-8139-404d-b5bc-1254ac6abbca",
                    "title": "80",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.898525923000022,
                            -75.26171920699994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3de50135-3389-4485-8e17-b5b62eb2be59",
                    "title": "81",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.900605018000022,
                            -75.26048537299994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "480630ec-b5e7-4761-b055-bed9dea6c24e",
                    "title": "40",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.900666489000059,
                            -75.26070147999997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8fb97678-05f3-41a1-96ae-f78be1168bce",
                    "title": "698",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.901666593000073,
                            -75.25907630699999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ce8d8b78-a043-4611-a525-6309868ea284",
                    "title": "82",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.901496059000067,
                            -75.25906385599995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b38f425f-d5c8-44f3-9ae1-c73d7e5489c9",
                    "title": "376",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.896095320129104,
                            -75.26490414279655
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c0f97090-7dcf-496e-8aa5-f6bd4a7f2d29",
                    "title": "375",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.897093469587708,
                            -75.26397834985431
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "88f61718-f71a-489c-800e-c360bfdfa3b5",
                    "title": "374",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.900939932000028,
                            -75.26830300799998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0b566404-51a1-4b12-b0fb-2efebe441476",
                    "title": "171",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.901831704000074,
                            -75.26760202799994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1b1e8aef-534e-4418-856c-b3b8576f5dbb",
                    "title": "172",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.902217828000062,
                            -75.26763855399997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d156a940-30f1-43a6-be01-90c6ad635c18",
                    "title": "170",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.902616025000043,
                            -75.26937665699995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3e67a7a5-d006-4768-9c66-7d9bf15176d1",
                    "title": "169",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.902547886000036,
                            -75.26971602899994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1cd59039-ab23-428a-ade2-9622ad2eb407",
                    "title": "168",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.902897802434931,
                            -75.27110386648063
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d46d359a-3577-48fb-aa7b-138c81a3c62e",
                    "title": "167",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.903793999976528,
                            -75.27277104871243
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "27161eb6-ddd4-47fb-8919-274a64182bb7",
                    "title": "398",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.904321402442253,
                            -75.27369448986356
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "893e9cf4-c52b-4ce0-8af1-18e728555e28",
                    "title": "397",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.904671906000033,
                            -75.27363255299997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "46e2369f-214a-4cb8-90ed-93d9f8f246c8",
                    "title": "373",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.904553375000035,
                            -75.27547492699995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bb33cb25-99a3-4a9c-97df-991b44679f20",
                    "title": "165",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.906777288220971,
                            -75.27565948997056
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "20c9b6e9-f703-463f-97c3-a8b9d41ef917",
                    "title": "166",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.907324774000073,
                            -75.27565939299996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "01e3f7d7-eb97-484a-8ab0-cdc4be5feccb",
                    "title": "21",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.903147931000035,
                            -75.26615002299997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2e15589c-eca2-45e9-b6b9-5215ecbaf164",
                    "title": "39",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.903163705000054,
                            -75.26636027299998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c97a29f6-e196-4a62-9fb7-9fa1f3cb3972",
                    "title": "681",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.904363944000068,
                            -75.26449202799995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4cb4ea86-1d3e-4148-a71b-785433cb2998",
                    "title": "38",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.904586355000049,
                            -75.26451918899994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "63fa2fd2-929d-4c5d-950c-16d320f221c0",
                    "title": "37",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.905559649000054,
                            -75.26260484299996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "500c1c82-43a9-4eab-a9c0-6070171b47ce",
                    "title": "18",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.905489947000035,
                            -75.26238424299999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1ebba1eb-bb38-477b-a363-afbf07106ad7",
                    "title": "22",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.906876890000035,
                            -75.26236414699997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f4816096-6fff-4ff7-8f0a-e0bb350cd7c1",
                    "title": "24",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.906951978000052,
                            -75.26254661999997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b3cdc9ee-8700-437d-9bec-9526c8b9aa11",
                    "title": "19",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.908810981000045,
                            -75.26303345999997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a94ff34d-f42b-46f8-be1b-39fe76f485c5",
                    "title": "26",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.908880550000049,
                            -75.26323788099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7d8af811-4db0-4a6f-b4c3-71397b56fb22",
                    "title": "20",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.909851534942762,
                            -75.26261534412454
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "aaa6be4c-ba34-443b-80c2-d3e55bcec94a",
                    "title": "25",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910468451000043,
                            -75.26367031599995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2816669d-463b-4d51-b61b-8dd76ea9f8f5",
                    "title": "27",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910509551000075,
                            -75.26385319599996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b095667d-2423-4e19-b798-1a9c643cc256",
                    "title": "30",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910516994000034,
                            -75.26518571299994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c379a340-caf4-4e85-98d1-3b44f8274320",
                    "title": "23",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910339371000021,
                            -75.26524774599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "071885f0-b91c-4a0a-ad07-6c73c9d7bc8e",
                    "title": "29",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910724226077414,
                            -75.26791319544378
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a4372311-35aa-4cef-8191-686e4ec4a061",
                    "title": "31",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.91061221261971,
                            -75.2678953010014
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "da97b780-b26b-4eb1-ab98-d9b70132e598",
                    "title": "32",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910494726000025,
                            -75.26913354099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fc1de384-27a8-483e-be02-43bca1e16669",
                    "title": "28",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910407479000071,
                            -75.26932722399994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9b14db4a-5c4e-4907-84de-1a48e4e29881",
                    "title": "33",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910965546000057,
                            -75.27118469299995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ee910dfd-d1eb-4a5e-ab4a-3539b4badeaf",
                    "title": "34",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910833963000073,
                            -75.27127266999997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6edfd757-adda-4227-bac2-f5acb2cf1f96",
                    "title": "116",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.911992920000046,
                            -75.27191711899997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d6b97a1f-5f5e-4327-b0e4-41ac41170272",
                    "title": "117",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912074648000043,
                            -75.27207196599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "49d660bb-29c6-4420-a32b-1b2724922c62",
                    "title": "101",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912950351000063,
                            -75.27339178199998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f373479e-c98c-4ab2-95ce-54545a1f260e",
                    "title": "87",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912715994000052,
                            -75.27345866099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "dceada09-119c-45f2-ba89-17ee40e9b51a",
                    "title": "111",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.908747610508019,
                            -75.27211820381679
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1ecdfbb2-81b1-4144-920e-d6251d81cf74",
                    "title": "95",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912058725445007,
                            -75.27426011727792
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f71b2b47-5e8e-4f18-b0ed-f0b730652cd2",
                    "title": "110",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.908680680433538,
                            -75.27201512653672
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "dc6af1ed-3a9e-4e6d-9db5-36c512a87399",
                    "title": "94",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912094286882803,
                            -75.27446276061605
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fdf28b7a-f1bd-4982-bb73-3f244bcd5a11",
                    "title": "109",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.907500753256147,
                            -75.27243146286092
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b3f4e145-af1d-465f-96fd-72db085fc0fe",
                    "title": "93",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910259576651411,
                            -75.27449616167858
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "554107ad-5f9c-4e96-adbc-7cf73ce0fe31",
                    "title": "92",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910107719356228,
                            -75.27431195325492
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c32d1650-f8f8-4baf-8131-e6326cfdab0a",
                    "title": "108",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.905576452998022,
                            -75.27323414303135
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "75884c11-c2d6-4ae1-996f-8e4c0efc5f91",
                    "title": "86",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912433907000036,
                            -75.27555245699995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "48da483c-8470-4f19-b177-4580155dafd3",
                    "title": "100",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912696866000033,
                            -75.27538024399996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7d57f8b0-afe3-4779-b120-6d029c35351b",
                    "title": "112",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.914311957000052,
                            -75.27533254699995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5914ef3c-c56d-4330-9db4-c30de187d8f0",
                    "title": "96",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912950299683609,
                            -75.27895205199925
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0c05233c-1a74-4e76-9514-569294c00eca",
                    "title": "97",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912823341093765,
                            -75.27904034017367
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bf8d661f-58fd-409f-ac7c-3492dab45fcf",
                    "title": "113",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924036116476799,
                            -75.2629903237228
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "73ec415a-a13c-4cae-a2a3-9291500b4129",
                    "title": "98",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.90994829155603,
                            -75.27171457777683
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d3ec2d7b-58a3-44e9-b0d8-03a0710bedb8",
                    "title": "114",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.924128930643668,
                            -75.26304196874175
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c3a31094-8048-42cc-a57e-1e42dfa8c6a7",
                    "title": "85",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912467661000051,
                            -75.27792727199994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4c736c0f-e5e8-40ab-99c2-f1c4e5a309af",
                    "title": "83",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.912328246000072,
                            -75.27805180799999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "51adc411-9f1c-4f2d-accd-eb5f17c3aa6f",
                    "title": "84",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.914050671000041,
                            -75.27972312799994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "da017d5a-a6c2-46fe-b0ae-8abf65001641",
                    "title": "420",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.911919617000024,
                            -75.27950074599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e8472877-7d50-4ae4-bcf6-2f559a0a9a40",
                    "title": "499",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.911823942000069,
                            -75.27972259699999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4b3d2d0d-30ea-469f-b49d-6b57b901bdc1",
                    "title": "421",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.914414950000037,
                            -75.28089555799994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fba44750-5c4f-4580-bda9-d01171b5b240",
                    "title": "498",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.914306615439878,
                            -75.28112228391092
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "04afeba8-b5ae-46cc-9fa5-fbde7ae8438d",
                    "title": "561",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.916047045000028,
                            -75.28109218899993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e216f6d4-20fd-47b3-8735-e069dd341fac",
                    "title": "564",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.916186723000067,
                            -75.28132441399998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "94df21de-bc73-4cc5-a69a-951475382f32",
                    "title": "562",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918111158000045,
                            -75.27975753399994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4e7c8c55-c075-4b97-99a5-05093f28eb0d",
                    "title": "563",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.91829328700004,
                            -75.28001644299997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4c66f1d5-fce1-4379-90e3-1638a8432675",
                    "title": "115",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918673455000032,
                            -75.27791585199998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6f5f30bb-f0b6-4d59-9d49-0fd80e657b78",
                    "title": "99",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.909856043039069,
                            -75.27153455520899
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c7bb2154-e666-431b-9a69-2e9a7cc1aae0",
                    "title": "437",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.915333367000073,
                            -75.28216651099996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7e897515-2c70-45fb-82a9-f13e593228aa",
                    "title": "497",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.91552217900005,
                            -75.28297831599997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a1ccc072-62b5-4ab2-9375-d5743b853ef6",
                    "title": "423",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.917028218000041,
                            -75.28298445199994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a92412a1-912b-49d1-8e02-502cecd4c50d",
                    "title": "510",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.917064336000067,
                            -75.28318394099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6c348b81-d0ef-4c57-a423-b6fdcc905ce3",
                    "title": "509",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918822835000071,
                            -75.28354783799995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "34285a57-9170-4916-ad40-24491604fc4c",
                    "title": "422",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918959376000032,
                            -75.28330239499996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4c87b6da-efda-43b7-9b4b-d8544811f46c",
                    "title": "496",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.916920076000054,
                            -75.28453825999998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c4588c1c-c7d7-4980-baf1-f5fba2bf2fd7",
                    "title": "494",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.918381566000051,
                            -75.28552865999995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c6ae4dbc-f02f-424d-9510-0474705accc8",
                    "title": "598",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.915561828000023,
                            -75.28554251699995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "885b42c9-bab7-46ba-b826-02dfd99ba948",
                    "title": "599",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.915747017000058,
                            -75.28573757099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "732c7a94-4140-4b29-96df-c748c63c08f5",
                    "title": "596",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.913392724000062,
                            -75.28563057099996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "99502496-9f9b-4681-a1b5-f1ebae7d8230",
                    "title": "597",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.913596297000026,
                            -75.28588506899996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "478f285e-c27e-4b1c-a666-82ceac7fe9b8",
                    "title": "594",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910662838000064,
                            -75.28530485799996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "66c3e98e-2d5a-4267-add8-7942a23298d9",
                    "title": "595",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.910480623000069,
                            -75.28558561299997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7b3297d6-1000-4e4f-bd69-efd00a4211b0",
                    "title": "593",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.907263475000037,
                            -75.28498913599998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ec20b44f-272b-43e9-928e-6f5ed7015a06",
                    "title": "592",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.907075849000023,
                            -75.28456689999996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fd92a699-7606-4791-8fbd-3c0b92ee2305",
                    "title": "590",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.903420728359462,
                            -75.28337175897123
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2890a2c2-8fa8-47b7-b75b-706755497c6a",
                    "title": "591",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.903486462000045,
                            -75.28374496299995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "97d9b587-290c-4361-8cf0-9e251ce7f9ed",
                    "title": "588",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.900027739000052,
                            -75.28074609399994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "102eaad0-bd01-4aff-825f-9ae0d00ed87a",
                    "title": "589",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.900073467000027,
                            -75.28108101199996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5ff15888-bf1f-40b8-a05c-a0024524dc40",
                    "title": "587",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.897096648000058,
                            -75.27915993699997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "725f0a9a-23aa-4236-810b-b8cfae764583",
                    "title": "586",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.897158746000059,
                            -75.27936898299998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2017b06e-dc6e-46a2-96f9-1fafb68762dc",
                    "title": "690",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.894668733585893,
                            -75.28018903519079
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fb30de5d-11c2-43dd-a25e-4e8cf33f9e60",
                    "title": "680",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.894917073482043,
                            -75.2800108573135
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "cbbe2b6a-3276-4124-8567-97476911d854",
                    "title": "678",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.895860793000054,
                            -75.28226701699998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "30d23d5c-789c-4ddf-a367-0fd51f120e3f",
                    "title": "585",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.89561896500004,
                            -75.28254136499999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "126dd349-9bd0-426c-b757-6ef4b8121f58",
                    "title": "601",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92998822200002,
                            -75.27850205399994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bb43b5e5-3475-46ba-a26f-4838b9f41c0b",
                    "title": "612",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931003203000046,
                            -75.27870740699996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ca250c1c-97a4-4679-b540-5734255ee344",
                    "title": "613",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931855026000051,
                            -75.27631951199999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "320d7ae8-4342-42e0-8d15-18efc1c2ef6d",
                    "title": "602",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930849986000055,
                            -75.27635964699994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f84569ab-86c5-43e3-acbd-90aef782f4fa",
                    "title": "603",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932310293000057,
                            -75.27394062099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "07408869-d9d5-4aa5-aa04-f3062424afea",
                    "title": "614",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932468262000043,
                            -75.27377594999996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "886ec99d-c630-44b3-88b1-3e437da87ae3",
                    "title": "615",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931633187000045,
                            -75.27093891599998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "43170f0e-102d-4cd8-ad6a-2d4a3dee1e9c",
                    "title": "604",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93134223800007,
                            -75.27086403899995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "39b231cd-4f96-47be-b928-1b18535618c1",
                    "title": "616",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931034237000063,
                            -75.26841952299998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "efafb077-f440-4ee0-8408-eeedb78fe435",
                    "title": "605",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93083763900006,
                            -75.26835009599995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "49905c2b-47cb-415f-bf3a-99305a022d08",
                    "title": "617",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930599938000057,
                            -75.26512052799995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "655dc20c-ede2-475e-b10f-926e58a05722",
                    "title": "606",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930375525000045,
                            -75.26494677999995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "043d6d10-fe19-4152-9b17-f1dcc83b082b",
                    "title": "607",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.930320898000049,
                            -75.26115819899996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1af8235c-78d8-4f73-ab35-c83644193330",
                    "title": "618",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93061278700003,
                            -75.26116702199994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fba0455a-b02a-4ba4-9e93-614a4a7c35c6",
                    "title": "619",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931494756000063,
                            -75.25797355399999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a58a6b26-7588-4dbc-9340-5eb96fb4e462",
                    "title": "608",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931259091000072,
                            -75.25793488199997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5319748a-5f49-42b8-bf5a-369b4162f655",
                    "title": "609",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931681278000042,
                            -75.25499713499994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "12be9a73-2b50-45a2-9dbb-c3a422fd9a0a",
                    "title": "620",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.931898618000048,
                            -75.25499617199995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "deee8915-4503-4896-baef-5833022647c8",
                    "title": "610",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932208289000073,
                            -75.25188672799999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b646745c-d194-4a0a-9f0a-ac51919aedb0",
                    "title": "621",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932481148000022,
                            -75.25183063799994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2e468fb1-6d78-4ee1-b548-438ccdafa2b4",
                    "title": "611",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933220013000039,
                            -75.24812906299996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b402ec13-ce34-4eee-834c-910da3bf3f87",
                    "title": "622",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933443594000039,
                            -75.24809679499998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9b9da7f5-f7a5-49a1-9091-f7fdc8746527",
                    "title": "230",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935152253000069,
                            -75.24628726099996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "28f591c8-6ad3-442b-863e-1be2f4e4fbf7",
                    "title": "227",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935476082000037,
                            -75.24610568399999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "333bd2b4-9153-4787-b712-db23760a3c31",
                    "title": "228",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938078639000024,
                            -75.24682015899998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5ed15607-3d8a-4042-8743-f014c60e63d0",
                    "title": "231",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937764645000073,
                            -75.24699253499995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4c3d79da-20ce-40b2-ab5c-f4d6d86aef1f",
                    "title": "386",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940274683000041,
                            -75.24752613699997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "160a2261-e567-4f37-b94c-486f61af2584",
                    "title": "229",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941050462000021,
                            -75.24776920899996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6f493ad6-d00c-4a86-bee3-79caf124ecd2",
                    "title": "388",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942056708059109,
                            -75.24520398760146
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "06e84575-0154-4248-badd-7aba33edad57",
                    "title": "389",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942366191726548,
                            -75.24643231196146
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "85ba8893-413d-4734-9592-03a723bd3845",
                    "title": "390",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941449833006766,
                            -75.24774754285794
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a21e7756-c288-49fa-9034-2e859b9969f6",
                    "title": "387",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941354896551409,
                            -75.24617968319903
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d5c01d0f-a444-4fae-bf0e-062b70758607",
                    "title": "271",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942991078000034,
                            -75.24837665799998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "20782722-6377-4e8e-b51b-b9b51d8d2339",
                    "title": "272",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942925488000071,
                            -75.24853493399996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fcfe29d6-7c8d-477c-b40b-f9775b0d3e4a",
                    "title": "273",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944021433000046,
                            -75.24630481399998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8211d799-ab84-4e29-a34f-13423cba8fdf",
                    "title": "274",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944966468000075,
                            -75.24336782199998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e7107f01-6183-4d71-8983-de0f81ea276c",
                    "title": "275",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946339181000042,
                            -75.24289460899996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ce537e04-cf53-4dcf-ab49-a7838503e205",
                    "title": "276",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945440089000044,
                            -75.24573628999997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "06888bdf-bfe3-4c64-bad3-0f0fd23a6ba7",
                    "title": "277",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944552637000072,
                            -75.24842291799996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "aa00696c-1c3c-4c02-bfd0-8ee89cdc4f5a",
                    "title": "278",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945623463000061,
                            -75.24920999799997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f7c17f7b-ca13-46ff-9aa3-b0d359784c60",
                    "title": "279",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945718638000074,
                            -75.24946807599997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e10d3f90-13d8-429a-ab39-fba7d0fe23e3",
                    "title": "281",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94864029300004,
                            -75.25018788599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fd25eebd-5e27-4f33-a876-b76b9d920741",
                    "title": "280",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948732657000051,
                            -75.25041267399996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "268651b1-3f0a-463f-a5eb-8f60324f445b",
                    "title": "288",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.950432990000024,
                            -75.25024031499999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "796e4223-6e84-41b0-8441-15ae4ce400ae",
                    "title": "290",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.951782865000041,
                            -75.25139782699995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "122166f3-5bec-48d1-b179-33c794536545",
                    "title": "676",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.951631862000056,
                            -75.25239754999996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b813545c-9276-4dbe-9734-2051195881ef",
                    "title": "292",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949675508000041,
                            -75.25164735099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "efd0e8b9-57a3-4537-9219-1a6b06e3f361",
                    "title": "697",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949671828000021,
                            -75.25418022799994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "813130b8-8f10-4981-8e66-f880873e42b1",
                    "title": "285",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948387388000072,
                            -75.25395365199995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "cc96ac82-61b2-4358-b672-ffb38176c133",
                    "title": "286",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948476752000033,
                            -75.25583113799996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "72efbcf9-9960-47af-8bb1-7ac794cf2975",
                    "title": "287",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946650455000054,
                            -75.25466429699998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "453e7f0e-b5e4-4b90-a23c-f1c1ed4cc04d",
                    "title": "377",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944025345190529,
                            -75.25478446355784
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "27152b4d-2d64-4beb-b527-1ca6685ae8a1",
                    "title": "378",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941389118000075,
                            -75.25497454499998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "dc055add-63d2-46e4-9564-c82681970586",
                    "title": "282",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941076852000037,
                            -75.25367237599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a0b99958-1cfe-4f96-ac9d-9b169a0545a5",
                    "title": "283",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943254429000035,
                            -75.25354910599998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "999e0b86-e481-4cd0-beb2-daf2135a2843",
                    "title": "284",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945634429000052,
                            -75.25337241899996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7cab3b0d-38b2-4a17-bbc3-d46850e6db7b",
                    "title": "264",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94167318600006,
                            -75.26309813099994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3cfe5681-700b-4898-af1c-4bec29799620",
                    "title": "265",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941865565000057,
                            -75.26324517299997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "33c875b4-669d-4568-95d3-d26f5d0363d1",
                    "title": "270",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945872511000061,
                            -75.26270649599996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "585ced03-fd9a-4df6-be31-c84c1239f3f3",
                    "title": "269",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945577640000067,
                            -75.26348901299997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fb63b86b-6378-4984-9b8a-1b5850128f52",
                    "title": "404",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932584220000024,
                            -75.27820513599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4c41f147-8da8-4094-877f-3850f7fd5901",
                    "title": "407",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932663727000033,
                            -75.27924889899998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7d00a5d6-b0cd-4bc3-a949-e71c6a380fea",
                    "title": "624",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934549528000048,
                            -75.27865839199995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ef3b5fb6-414a-43ac-a2b5-3c0ffbc816cb",
                    "title": "405",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934446604000073,
                            -75.27710386699994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2a06a445-7b37-4d60-83b9-8d66b844bec2",
                    "title": "406",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934235887000057,
                            -75.27706331799999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a52b1d66-8aeb-4bf5-8050-07618b4e5cc1",
                    "title": "232",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934179509000046,
                            -75.27415106099994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8a01d39b-02b5-447a-9359-fc16c7f841b6",
                    "title": "233",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934287936000033,
                            -75.27406100599995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "beb7398e-a7c0-4c0c-978d-125c563c519e",
                    "title": "234",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933211757000038,
                            -75.27147453599997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e08bc4e5-dd9b-47c6-9b8e-cf1876189ead",
                    "title": "235",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933275811000044,
                            -75.27125618299993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e71f3731-b4c7-4e69-b5c7-e317c23dd60f",
                    "title": "236",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932753840000032,
                            -75.26878809499993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4154cf01-1740-435e-a77d-b33c552e05be",
                    "title": "237",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.932971332000022,
                            -75.26867235999998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "314747ab-12fb-4b0f-a255-832fd245598c",
                    "title": "238",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933812441000043,
                            -75.26585729799996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "39c00ac8-ed90-4fad-b034-2128f2f4c0d9",
                    "title": "239",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.933985566000047,
                            -75.26584133099993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "69300703-8d37-462c-81fd-2f2a66a5af6e",
                    "title": "240",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934072822000076,
                            -75.26354056699995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6dbdc15e-999c-4bd2-b2c2-4c4ed4253b04",
                    "title": "241",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.934179744000062,
                            -75.26338845299995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a876e57c-f064-4561-a345-093afdf10e26",
                    "title": "243",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935621713000045,
                            -75.26274635099998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "14ff41f4-9212-4f56-84e0-aea4adffe576",
                    "title": "242",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935744081000053,
                            -75.26263727199995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "08caa64a-78ba-4f58-819f-fbe4445440ff",
                    "title": "244",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938006520000045,
                            -75.26165566999998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "af446d1f-ffec-4ee2-9dd2-8f70f9ce2280",
                    "title": "245",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938112656000044,
                            -75.26153072899996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "95da898c-ba4b-4c9d-be6b-c50161b9d621",
                    "title": "246",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93735566700002,
                            -75.25877374099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ee501e33-50d3-457b-9ff7-46ba6e45c39b",
                    "title": "247",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937500133000071,
                            -75.25859572999997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ee703076-200c-4bd8-bcad-82bf9181733a",
                    "title": "248",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937122118000048,
                            -75.25633353799998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "50f0a4f3-7b0c-44db-a95d-7e1ec936a551",
                    "title": "250",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937610868207514,
                            -75.25407623026275
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "461a513c-414e-4267-804e-97b16e3eceda",
                    "title": "263",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940313796000054,
                            -75.26305858499995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1812fdf3-1cf4-4ae9-bfdf-a26c44c91a44",
                    "title": "261",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940027157000031,
                            -75.26519616199994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "58c82be8-643e-4fd4-8346-a67f7f724c09",
                    "title": "262",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940205772000069,
                            -75.26514573399999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6798a845-5e0a-4d7d-9ec2-f99c193f636f",
                    "title": "259",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940820696962757,
                            -75.26234370773965
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ee2a1d9e-cdfe-4c37-8ad4-2356d4fa60d9",
                    "title": "260",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.939850036000053,
                            -75.26740187299998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3a2b07cd-b4d4-417c-aba5-c67778959f52",
                    "title": "258",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938206874000059,
                            -75.26859050999997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2d8b26ed-83ba-4b30-b0e1-d3d0921cd36e",
                    "title": "257",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938087841000026,
                            -75.26842033299994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "824ce427-6670-431b-a261-2b2377bfd0bc",
                    "title": "255",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936239658000035,
                            -75.26930897799997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4741716d-b9b5-4525-bcb1-a0397b017e7f",
                    "title": "256",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936395273000073,
                            -75.26937622299994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e90c3003-b179-40f6-af62-e9871643c02c",
                    "title": "385",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938624632000028,
                            -75.27066228699994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ebe8da1a-1891-418d-a401-940fcc8551ea",
                    "title": "384",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938233242000023,
                            -75.27376030299996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6dbac39b-8f13-4b60-ba2b-a48cf5b58fbe",
                    "title": "254",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935571972000048,
                            -75.27159687899996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3fe36ef5-e189-4c55-b80a-1704c6b05d56",
                    "title": "252",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935139071000036,
                            -75.27426751399997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6d142e05-42c9-49ed-a7c5-ef7f4333c3f4",
                    "title": "623",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.935758246000034,
                            -75.27728808999996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "24b156e7-96f9-44bd-a75b-7b6050179d0c",
                    "title": "628",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936932875000025,
                            -75.27800241199998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "dbbf9ac7-3bf5-4105-a23b-eafb48802733",
                    "title": "640",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936763444000064,
                            -75.27817179299996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8de60b16-f632-4c23-8890-a5e756fd7858",
                    "title": "446",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936526772000036,
                            -75.29513757799998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5b5d0229-2db6-44e2-a2ed-48ca23d703b1",
                    "title": "483",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936403932596596,
                            -75.29538741990898
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8875ab3c-f4dc-4584-98fd-2368ffe63e39",
                    "title": "447",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937751381782939,
                            -75.2957242918576
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a850c453-5711-4745-95de-6609d6ae9e03",
                    "title": "482",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937764687992926,
                            -75.29592943370491
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "afa1f885-2ba2-4427-8aa2-4c9de37342d6",
                    "title": "584",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.93999679600006,
                            -75.28968013399998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5b8e64eb-ea15-4b34-9c6e-fcedeb7023c1",
                    "title": "583",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940016062000041,
                            -75.28943729099996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ff8702c7-fa7f-4df5-9182-3bfb7a7d381b",
                    "title": "581",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942146768000043,
                            -75.28216680299994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e4d12e8b-3936-4d4d-b27a-7f73ecac64ab",
                    "title": "582",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942059967000034,
                            -75.28240901199996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f6aa1a6c-3b46-4ac5-997f-09ae323fe49f",
                    "title": "123",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943559981822431,
                            -75.28901392558716
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "52e35817-526e-4ff0-94a5-6f0bf558bbc5",
                    "title": "121",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944400877000021,
                            -75.28630788899994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c7730f1d-5aac-440b-a7be-b968e2042dbf",
                    "title": "120",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944591203000073,
                            -75.28654626899998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "50ba9462-6096-461b-90ae-e597a8eda8f9",
                    "title": "695",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946376865000048,
                            -75.28534291399995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6e0271e9-5fee-4c13-9e62-b1819a270743",
                    "title": "688",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94316451709632,
                            -75.29039945915443
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b15e0b6a-2a0b-4ada-a255-404c69523af8",
                    "title": "133",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946652327432042,
                            -75.28413385341416
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f662c11c-a311-4a22-938b-2a1e611b78e2",
                    "title": "134",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946764269909654,
                            -75.28414469439224
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a6206ecc-7b8f-4330-9c0b-23a13f20f428",
                    "title": "119",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949159946000066,
                            -75.28774038699999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d35d054e-ca83-4a4b-8597-85e0856d84b7",
                    "title": "122",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949429374000033,
                            -75.28781940999994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4a0327bd-ce42-497b-8eb7-2ba46212d0bd",
                    "title": "689",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.942973443698962,
                            -75.29030007465252
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b3b34818-47ca-4d79-9066-828bb4443944",
                    "title": "686",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.950063169000032,
                            -75.28653679199994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fbe6a3df-1be3-45f6-b7e3-3e86ab1d56a8",
                    "title": "141",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.954272442000047,
                            -75.28695146799998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f989869c-785b-4b6e-aaa0-e4329fbece1a",
                    "title": "142",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.954476200000045,
                            -75.28690959899996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5174e78c-9330-4fdb-98fc-9ef2c3e9e6e7",
                    "title": "143",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.955755372000056,
                            -75.28453555899995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5364c4e4-b47c-4b65-b255-da3f350713e6",
                    "title": "144",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.955968924820962,
                            -75.2844099847425
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a1e5b269-d5b1-4770-b298-1d39140cadcd",
                    "title": "140",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.959298930098465,
                            -75.27774239087854
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a39dd9f7-71b7-41c9-96f2-6d283a587504",
                    "title": "139",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.95936217079906,
                            -75.27806995366134
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0f424e21-2aa3-4ca5-9696-8afbe5009106",
                    "title": "145",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.956650718000049,
                            -75.28251728599997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d682f6e5-2e5a-48ef-9ace-1719d5459020",
                    "title": "146",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.956790739000041,
                            -75.28247851899994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8179425a-4266-40ca-94eb-e03b0ef16301",
                    "title": "147",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.957440907000034,
                            -75.28054244899994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e1248c90-b0d1-4f05-bf3b-8a613ce43ddc",
                    "title": "148",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.957571032000033,
                            -75.28049458099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a2d782a7-9854-4b0f-951e-16640b25cf43",
                    "title": "150",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.953993429426768,
                            -75.28836645751838
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1bb73133-5cd7-4f62-b08f-57acf2b28a36",
                    "title": "149",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.954848152650142,
                            -75.28825857325084
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9d3e555f-f403-44b2-866d-ffb451dc328b",
                    "title": "160",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.962222246000067,
                            -75.27945024899998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "368a3552-f9c9-457a-b0f3-b78f380844da",
                    "title": "159",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.962335364000069,
                            -75.27921913699998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4193ecf4-df5a-41ae-9861-d4601fd19fb7",
                    "title": "162",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.964709479000021,
                            -75.27912765299999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "69ac6eb9-764e-49d0-ab25-4bea3bde7f43",
                    "title": "163",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.967047604000072,
                            -75.27847953099996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6ecd1f7d-6eb8-4b40-a667-dff7df5452a4",
                    "title": "161",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.964467604987485,
                            -75.27720620969389
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4f34122f-e955-4cfd-a003-aee69b3361b2",
                    "title": "151",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.95902510623978,
                            -75.27916871904918
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "2f9c8ffa-6b71-48ac-9602-d8bdd1ade9d7",
                    "title": "152",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.959108255256258,
                            -75.2791844125409
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b87ef508-3605-4b39-a4d3-96dc1fd1b6b9",
                    "title": "153",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.959491338000021,
                            -75.27667634999995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "90bb8c08-3d71-4a7d-84dd-e43573f8b494",
                    "title": "154",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.959668481000052,
                            -75.27658009799995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "109571fc-447d-4c64-8c4a-952eeff68042",
                    "title": "184",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960008214000027,
                            -75.27371242099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "51b71732-5ae2-4a71-8c65-311bedf3939f",
                    "title": "185",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960317868000061,
                            -75.27368346099996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f9450b3c-fc24-49c1-b50a-b628948690da",
                    "title": "155",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960927436781513,
                            -75.27465218962293
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b662a7e8-3876-4a38-94b6-81364a5b0722",
                    "title": "156",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960909008926549,
                            -75.27479845719205
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4c6cb9a0-8cc1-4b64-89c3-9330b41a5be8",
                    "title": "164",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.967250922000062,
                            -75.27868617799999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c58fb237-0282-4da0-85f9-9825232844b3",
                    "title": "157",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.963497242000074,
                            -75.27303806699996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5b188db3-9e7a-4e51-9419-72073b6b76ee",
                    "title": "158",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.96380214900006,
                            -75.27301884599996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "cf5da0e5-78a8-4348-a1f0-c193276de5b6",
                    "title": "544",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946700577000057,
                            -75.29617273399998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e7970b33-adfc-4caf-9ccd-7d77bcce50ed",
                    "title": "545",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948655379000058,
                            -75.29571167099994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c92c4806-0cb8-4eaa-8c60-3c6d7fd47f9e",
                    "title": "546",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.950888656000075,
                            -75.29516245699995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c02d3368-9934-4984-833f-da40dd387b5b",
                    "title": "539",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943376014000023,
                            -75.29797990299994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "910bbb59-37c1-456d-9889-25f2a9c3c1ed",
                    "title": "538",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945056934000037,
                            -75.29805227999998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c7e4b32a-b181-43b1-93f4-ce2025d9d2bd",
                    "title": "321",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944888652000032,
                            -75.29838847399998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6c22e158-2261-4093-a01a-3ee1b72a52b1",
                    "title": "322",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.944845378000025,
                            -75.30044247699993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f1cf98b3-4e83-489f-9a7f-9e43c5cf845d",
                    "title": "537",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946885037000072,
                            -75.29812868199997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f9e3ae4d-9d3e-4495-bb70-ef28fb3cffda",
                    "title": "323",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.94767859600006,
                            -75.30175646799995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "25bb1153-fe7a-4ded-a5d0-c459f3adfeeb",
                    "title": "536",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948698307000029,
                            -75.29818062799995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a0783c74-b5e9-42ce-b0cb-4b95859c7500",
                    "title": "325",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949372005461478,
                            -75.2992812147926
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4b778aea-59e2-473b-8d1a-9927387bff46",
                    "title": "324",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949951276000036,
                            -75.30134552599998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ee2b19fa-2de1-49d1-9a9a-282853ea947d",
                    "title": "326",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.950603233000038,
                            -75.30179207899994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f362dc03-91f4-44ed-a4d2-23b158d5fcbc",
                    "title": "535",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.951602034000075,
                            -75.29825227899994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1b9fb165-bc42-44ed-af71-dcb506ba3f05",
                    "title": "327",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.952598745000046,
                            -75.30193188199996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "75659165-1e1b-47cc-a2d6-0a0229c54b0d",
                    "title": "328",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.952777154000045,
                            -75.30008437499998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "39dd97aa-3a5d-4249-a992-dcebc5f5e7ed",
                    "title": "549",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.95409115800004,
                            -75.29757271299997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e24eeccc-dcee-4397-aab7-807c170799db",
                    "title": "534",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.95411531000002,
                            -75.29775219599998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9dcc3678-56f8-4328-b542-a552cce673de",
                    "title": "548",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.957030450000048,
                            -75.29709965299998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1ad13d17-b475-4bfa-81d2-01461cbf17b2",
                    "title": "533",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.957031684000071,
                            -75.29727757799998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "00e97c00-6ff5-4771-9a53-c1ae905b5958",
                    "title": "547",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.959042039000053,
                            -75.29681878999997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d7df21fd-1e4e-49b1-935f-ebaf879682a7",
                    "title": "532",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.959071363000021,
                            -75.29694339899999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3e89efa0-f5f2-44eb-bb97-00d51584a5fa",
                    "title": "550",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.961320991000036,
                            -75.29642630599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d6dcd01b-2f3b-45a9-9639-73cc18bf1208",
                    "title": "531",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.961402817000021,
                            -75.29659078299994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0e649998-b77d-4c5c-8f7c-569a7eb0b186",
                    "title": "530",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.96372470411695,
                            -75.29619684997171
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ab8e4f86-3256-4a0e-9603-7c41d4c5918e",
                    "title": "551",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.963649584000052,
                            -75.29602036599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "cf3dd046-5b11-47f3-b0bb-453e176a8b27",
                    "title": "669",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.962342371000034,
                            -75.29322777799996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "99a87bae-53bf-4c16-a927-01c1f0a67ce4",
                    "title": "670",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.962550226000076,
                            -75.29305323999995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6e694564-0b91-47de-a144-3ee1568005ca",
                    "title": "668",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.961352271786369,
                            -75.28910166166557
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6a4e3c9c-f33a-4db8-885b-31132f0138a6",
                    "title": "414",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.96547331200003,
                            -75.29569259699997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6e3deaa4-ae96-46d6-a2b9-b540d93b9041",
                    "title": "529",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.965506697000024,
                            -75.29597443699998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5f63a221-3ee9-412a-b6db-777281edcfc7",
                    "title": "671",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.966234106000059,
                            -75.29426892699996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9b860d2b-bf82-46bd-9814-213e65132e99",
                    "title": "528",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.966465869000047,
                            -75.29410490899994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fc8e826d-8b91-4ece-8c5b-983f3f22dc9f",
                    "title": "672",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.965716325000074,
                            -75.29240701099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "947c6796-a536-4db9-b282-80c65984ee56",
                    "title": "527",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.965983997000024,
                            -75.29226553599995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "033bc19f-81f5-40f6-a47b-cb080dd0bab0",
                    "title": "662",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.965058168000041,
                            -75.29153087899994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "298867e7-e0b6-415a-8858-fbf65367c78d",
                    "title": "663",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.965347803000043,
                            -75.29177136499999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "37b175ba-d1a4-4b0e-96f1-6d2952aa0fdc",
                    "title": "667",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.961489387650928,
                            -75.28904906141052
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8df58c73-64c9-4448-9338-0fef6eaa2f21",
                    "title": "335",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.967471047000061,
                            -75.29535705299998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fbd5916c-47d0-4d37-9285-60964d51ae34",
                    "title": "50",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.967410947000076,
                            -75.29549863299997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "38b0368d-8c73-4c41-8a55-f21e211d3613",
                    "title": "337",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.967988748076422,
                            -75.2945962174318
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bc3cb470-5c33-46b3-b4e6-efb99ee58625",
                    "title": "336",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.967855441294371,
                            -75.29461347432483
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "1dda1cb3-5ae4-4e55-aa71-278ff36aaef7",
                    "title": "340",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.96038029892513,
                            -75.293870745249
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e52e7ae7-0fdc-4d5a-91aa-025bb0ca5d64",
                    "title": "341",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960890886787682,
                            -75.29585393740234
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "4e1da12b-aba6-4c61-b91b-543f4c341306",
                    "title": "338",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.967402589461535,
                            -75.29235014468496
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b16f1d08-ad71-4685-ac70-fc825ecb3dfb",
                    "title": "339",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.967218933571396,
                            -75.29260319598325
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "461feb49-92b9-4a53-9b0f-56e8fd33c613",
                    "title": "517",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.967699002000074,
                            -75.29016502499996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "904fd417-8553-4cb0-bacf-8b35013773f6",
                    "title": "526",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.967895589000023,
                            -75.29054218899995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "eff595c8-ce2a-4872-b243-8617c6144a91",
                    "title": "518",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.96969156800003,
                            -75.28918957899998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bf531f4e-a42f-42b5-b1f3-2ebe20260cb8",
                    "title": "525",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.969832576000044,
                            -75.28958612299994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "350ddc49-19ed-4977-a2d8-cf2763d0710b",
                    "title": "519",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.971187859000055,
                            -75.28837332199998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "63d5f090-c30f-453f-ace2-3fd5349475d5",
                    "title": "524",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.971549821000053,
                            -75.28864654399996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f558cd96-9f1f-4c14-8a61-0f63c576f3fd",
                    "title": "330",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.961004909275596,
                            -75.29432927596544
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d0a4571e-8794-40a9-a323-74386297886c",
                    "title": "520",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.973200237000071,
                            -75.28727193099996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c234c1e4-0de4-4673-977d-c37b449c7924",
                    "title": "523",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.973395322000044,
                            -75.28763922999997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "441dbbc8-b4f1-4573-be65-97258f61bd05",
                    "title": "329",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.859733642494694,
                            -75.19403329425757
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "dbda5000-9be3-4b82-886f-0c55b2348901",
                    "title": "331",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.962282582405003,
                            -75.29412864255994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "355cfb45-ec92-4e98-8e74-ec034560d9e4",
                    "title": "332",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.859405930583509,
                            -75.19431715443685
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "5101168a-1733-408c-9c72-7b9ad47519fb",
                    "title": "333",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.961966134107886,
                            -75.29087542566805
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ef34d8a5-850e-44d0-a9ee-3fc1b54bca26",
                    "title": "334",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.961687797743171,
                            -75.29080872856561
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d747bbf5-9514-4633-b5f2-2068e4fc427d",
                    "title": "521",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.975240169000073,
                            -75.28681903799998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "03249e07-be0c-4bd2-8e8f-e095b7444e71",
                    "title": "673",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.975331467000046,
                            -75.28583148399997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7287cd90-c1b9-42fa-9e19-59770e3c5de4",
                    "title": "674",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.975903652000056,
                            -75.28617432599998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c17f96d6-3866-4f87-925b-fb4ef8944338",
                    "title": "522",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.975936882000042,
                            -75.28725110999994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b85447fe-ed16-4d21-8c09-1ed3eb06d514",
                    "title": "366",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.977158091000035,
                            -75.28782375299994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7daee87c-6a11-4020-9c57-e50ec33ea0a1",
                    "title": "365",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.977042402000052,
                            -75.28772626599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b9a474a4-e53e-4e8a-942c-bfad5c93d2c8",
                    "title": "363",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.97856437400003,
                            -75.28726479299996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0fb2e183-304a-4128-9c63-f4040f925595",
                    "title": "364",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.978396296000028,
                            -75.28721088199995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bbb20f89-66f5-462c-99e5-2172924310cc",
                    "title": "362",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.979917639000064,
                            -75.28664224899995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "131c5c71-652b-4834-82f1-197348879f65",
                    "title": "361",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.979984657588028,
                            -75.28658695195779
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3b9e1040-b9ee-41d5-91a7-eac034982a67",
                    "title": "304",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943463853000026,
                            -75.30677118999995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "20e5cad0-97fe-4f10-9c7c-901a664d066e",
                    "title": "303",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.943587013000069,
                            -75.30658718199999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "67fc12c5-9f0a-4dfa-b35c-058a8898f8be",
                    "title": "305",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.945860653000067,
                            -75.30638556199995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d0c12063-279d-462e-bb05-c41d9bfa3112",
                    "title": "306",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946007622000025,
                            -75.30646456199997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "38ec684f-ff04-42e6-ae75-f3fc63800d64",
                    "title": "307",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948705763000021,
                            -75.31086986799994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9d202dfa-423c-4390-8495-3f46ee53cece",
                    "title": "308",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948305713672036,
                            -75.31034216269968
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a1b74698-978e-4c4f-b5e8-98b3f156b257",
                    "title": "309",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.952169408000032,
                            -75.31176993599996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "100051de-2153-494c-bb3f-4cbf5c369514",
                    "title": "310",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.95229217800005,
                            -75.31201890199998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "32e8f3ae-2dde-4342-88ff-92520f4cd861",
                    "title": "312",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.95501246300006,
                            -75.31180964999999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "80af94ed-e795-4a6d-8cc7-f087bf3ab62e",
                    "title": "311",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.954825325000059,
                            -75.31169380099993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "3ef7020c-cae1-41d8-b801-f2162c03f5ad",
                    "title": "313",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.957650074000071,
                            -75.31151965999999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "edb045cf-dcd5-415b-aeee-bb01410347b4",
                    "title": "314",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.957860582000023,
                            -75.31167681199997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0485a3f9-9c71-4419-8665-f0085b026609",
                    "title": "315",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960194852000029,
                            -75.31139873999996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "663055f8-6fc0-4255-bffe-15fcca52a9f3",
                    "title": "316",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960395082000048,
                            -75.31153519899993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9e0a75c5-aee2-44da-b17d-34b3fb91db54",
                    "title": "319",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.962158277000071,
                            -75.31123657899997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "eb900adc-e979-4eb2-879b-eac6bad88b44",
                    "title": "320",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.962382630143786,
                            -75.31166821011075
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "65a345dd-c86e-4c16-bf21-09a84590d1be",
                    "title": "318",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.963925454000048,
                            -75.30990166899994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f47c3440-4bd8-48c9-aadc-8c64cfa28709",
                    "title": "317",
                    "properties": {
                        "ParaderosSETP": "Fase 2"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.964052695000021,
                            -75.30969418099994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "00a8bddc-9404-4a1a-939f-f0bca591325e",
                    "title": "1",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.981472304000022,
                            -75.28452111199994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9a55bfd7-791b-4015-a2b0-9c692612191a",
                    "title": "2",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.981624719626291,
                            -75.28452025113431
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "d9b4ae3b-9f03-46a5-8058-b3395f41da85",
                    "title": "360",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.977725069601066,
                            -75.28337147070957
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bc52b795-d5a4-4a67-9305-ffc22ca6196b",
                    "title": "359",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.978473938000036,
                            -75.28198255899997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e027a597-c14d-478c-a505-e8e0ee5d96dd",
                    "title": "358",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.978573140000037,
                            -75.28183228499995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "698d33ac-9f4c-4a5e-ae69-61c8b6ea0713",
                    "title": "357",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.976958568000043,
                            -75.28129646099995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b624fe4c-62a5-43fb-9974-bf1dbc593785",
                    "title": "356",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.977252273000033,
                            -75.28118251699993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "52335a17-1158-4d6b-839b-9076db93a70c",
                    "title": "355",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.977560796000033,
                            -75.27911306699997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "ce4508de-ddf6-4a1d-9659-57427c13aacb",
                    "title": "354",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.977723950000041,
                            -75.27907873799995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a4c3767c-b318-4a2a-b947-0f363f7c5824",
                    "title": "353",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.978014372000075,
                            -75.27747263199996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a6e690c3-62eb-4579-b2d0-e645a7cdd310",
                    "title": "135",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948802140000054,
                            -75.28344303499995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "cad99138-fb8f-40a5-88c6-453fae44fe73",
                    "title": "351",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.977556179000032,
                            -75.27491869099998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "9b94ba1a-e65b-42e1-9242-4880f41b40cd",
                    "title": "350",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.977415269000062,
                            -75.27489307199994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "093186f2-e0ce-4acb-b71e-f0db4b944c19",
                    "title": "136",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.948778757000071,
                            -75.28366605799994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0cc0e4d9-1b1a-4f17-8362-75ec4add1b3c",
                    "title": "137",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.951031451000063,
                            -75.28273203199996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b52af544-53e6-463a-9e1d-5f9aad4c0786",
                    "title": "138",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.951405587000067,
                            -75.28284097999995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "62072a41-359f-4cd5-a49b-2f2063aaaedf",
                    "title": "348",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.976286966000032,
                            -75.27354056599995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fa1b91a5-3a32-4654-a0b4-f41325ec97e4",
                    "title": "349",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.976480129000039,
                            -75.27345913399995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bf3d5868-1860-48e2-bf42-807c52fb741c",
                    "title": "347",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.975404108000022,
                            -75.27176288099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6c6ec29d-dc00-47be-963d-7db4499c83df",
                    "title": "346",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.975297672000068,
                            -75.27191933499995
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "a9c020cd-46c6-43c4-a822-8647ccfe026d",
                    "title": "345",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.974558667000053,
                            -75.27007910699996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "c09a8142-8aca-42fd-9c8b-b55dba9c2710",
                    "title": "344",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.974377184000049,
                            -75.27002080299997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "e756a222-2a58-4f01-ac41-8c555db4fa75",
                    "title": "342",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.97256752800007,
                            -75.27100587999996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b73dee51-7e2b-4f32-ab73-0dd797dfb821",
                    "title": "343",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.97276155000003,
                            -75.27114553699994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "29d5e108-e513-48b0-956f-ffb47ad006d3",
                    "title": "103",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960916405000035,
                            -75.26990079399997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "83ecb630-bf17-4932-894e-7447b84d5d4a",
                    "title": "102",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.960688320000031,
                            -75.26997826399997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "f254700d-ed08-4ef4-a95d-beb92c4b8c92",
                    "title": "391",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.92320930538972,
                            -75.26751852156657
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "49b35ff6-b10e-4b11-9652-0dc5ebedcec3",
                    "title": "395",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922179315872836,
                            -75.26913396696928
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0e55d615-3b47-438e-b789-a973e981147d",
                    "title": "394",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.922099648350907,
                            -75.26906433405806
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fe1679bc-0131-4e32-a0dc-a3ae1c0dfcfb",
                    "title": "392",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.923108288792404,
                            -75.2674849864717
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "6db3e571-c08d-4804-a781-14eacd1ad29f",
                    "title": "267",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949679334000052,
                            -75.26312593199998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "27b16986-741f-4f89-a83e-3eba7ad7ba38",
                    "title": "268",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.949544520000074,
                            -75.26328822199997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "466de410-c18b-46ab-80fe-aaffd9d95041",
                    "title": "266",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.947832657000049,
                            -75.26258674399998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "8094aa01-e7c2-43e0-b87b-3f9ab84efcb2",
                    "title": "683",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.946962720000045,
                            -75.26390464199994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "02b930d2-ac4b-4b42-bbc7-ac0bdf692d51",
                    "title": "293",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940781064000021,
                            -75.29918006499997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "857cba7b-632f-41dd-82cf-f72b7863509b",
                    "title": "294",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.940678092000042,
                            -75.29932707699999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "7d833494-9e32-4d44-8e6b-0ed672e443b6",
                    "title": "296",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938907315000051,
                            -75.30042250599996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "55856dd3-e58e-4714-9481-aff233fe0647",
                    "title": "295",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.938714324000046,
                            -75.30047681599996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "bac0ab2f-86dd-430d-9542-9ad355677a18",
                    "title": "297",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.937125146000028,
                            -75.30175254799997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "69fcb8fb-8c91-45a0-ba3f-561762fd6aab",
                    "title": "298",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.936995093000064,
                            -75.30177402099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "47695b34-5b06-4ace-9f5b-a1e37200d04c",
                    "title": "299",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.939046462000023,
                            -75.30315294499997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "b4fe373f-3f65-4de0-8435-f0c7087616b7",
                    "title": "300",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.939077180000027,
                            -75.30337594899999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "0ad24c85-7ab9-428d-aaa7-1a084bcb55de",
                    "title": "301",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941522715000076,
                            -75.30456262199993
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "36ed7d1a-1aa7-46ab-ae64-657dc0367b2b",
                    "title": "302",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.941377044000035,
                            -75.30476922599996
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "18a28547-4911-4585-bce3-3b5fcf7fb799",
                    "title": "174",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.893678202000046,
                            -75.28604053999999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "795ff95c-d0d4-451c-845e-c06d2f2741d0",
                    "title": "173",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.893332994000048,
                            -75.28640726099997
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "42bcb6f0-bde3-4005-a7da-9072d13be32e",
                    "title": "687",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921394664818387,
                            -75.26875490032248
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "61a13d13-6506-4533-aa9c-41dc4ac85c06",
                    "title": "684",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.865137158855665,
                            -75.21211268511686
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "683702ff-b87a-48b2-89d2-2d8d439c83c1",
                    "title": "691",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.86492023832062,
                            -75.21255939536293
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "cdad0e63-e1be-4e2c-9354-96a8f6af12fd",
                    "title": "685",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.921380693284878,
                            -75.26892053838104
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "836087c7-4861-4025-bce8-c5e01bf133f2",
                    "title": "57",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.890730362000056,
                            -75.25281393599994
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "dd7913bd-97fd-47f2-ad1d-c1a9756db062",
                    "title": "46",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.891321059000063,
                            -75.25255017799998
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fefdb26b-70e6-4a14-a6ac-6ea8fbfb00ff",
                    "title": "49",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.896772516000056,
                            -75.25514012299999
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "markerType": 25,
                    "id": "fcadaafe-a7f0-4bd2-8f8f-1d08b2d9d078",
                    "title": "52",
                    "properties": {
                        "ParaderosSETP": "Fase 3"
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            2.896265677000031,
                            -75.25543318299998
                        ]
                    }
                }
            ]
        }';
        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('bus_stops')->insert([
                'name' => $Data['title'],
                'uuid'=> Str::uuid(),
                'paraderosSETP'=> $Data['properties']['ParaderosSETP'],
                'position' => json_encode($Data['geometry']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } 
    }
}

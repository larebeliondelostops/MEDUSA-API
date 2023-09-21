<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FiberPointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::setDefaultConnection('villavicencio');

        $data = '
        {
          "array": [
            {
              "id": "4de44735-767f-416e-a245-acaa8665c2f3",
              "title": "01.  IGLESIA PORFIA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.082757722950517,
                  -73.669296175569
                ]
              }
            },
            {
              "id": "51f815e6-9050-4114-ad44-fe167e4f7f58",
              "title": "02. BARRIO MONTECARLO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.104319040203183,
                  -73.65724791635868
                ]
              }
            },
            {
              "id": "5a2ea88a-1dc8-419b-a8af-c20b4d00fd81",
              "title": "03. PUENTE UNION RECREO Y POPULAR",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.142579749845648,
                  -73.6126297611363
                ]
              }
            },
            {
              "id": "39f63f91-f524-4d8c-be5d-70ca1ba9275a",
              "title": "04. ENTRADA M CENTAUROS",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.115666779631662,
                  -73.63439362670715
                ]
              }
            },
            {
              "id": "01f4ce5b-857c-4d25-a9e3-535f9bff58de",
              "title": "05. ENTRADA LA SALLE",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.150843458649746,
                  -73.64063218459569
                ]
              }
            },
            {
              "id": "10ca07fb-9717-40f6-b3d5-170ff0c4e37d",
              "title": "06. CC VILLLA JULIA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.154158555456809,
                  -73.63523318082751
                ]
              }
            },
            {
              "id": "147ec05c-8c3e-457f-98a4-c3abb49efdd9",
              "title": "07. TRANSITO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.150328244785609,
                  -73.62106094378284
                ]
              }
            },
            {
              "id": "46424603-b045-41e6-b79e-d8eac4b9021d",
              "title": "08. CHANTILLY VIZCAYA - HACARITAMA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.126737191683117,
                  -73.61620938251434
                ]
              }
            },
            {
              "id": "2018f747-b8fd-4f66-9720-fd4aabecd9b8",
              "title": "09. ESTADIO BOMBONERA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.140227827141291,
                  -73.61448154205479
                ]
              }
            },
            {
              "id": "c36a1a8b-1c77-4457-b8ee-ef1364702fa5",
              "title": "10. PUENTE ESPERANZA ENTRE 6 Y 7",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.128744532342888,
                  -73.63165749856518
                ]
              }
            },
            {
              "id": "97565793-63d9-442e-8171-d2b165027c41",
              "title": "11. COLEGIO COFREM",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.147618075350956,
                  -73.62009539853369
                ]
              }
            },
            {
              "id": "4c144666-a55e-4444-98e5-6fb3cd5baa2e",
              "title": "12. BOMBA LA SABANA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.148229253094318,
                  -73.62521664290887
                ]
              }
            },
            {
              "id": "68bb7755-2935-46e4-b87e-1e888746a817",
              "title": "13. BOMBA ESSO VIA MARACOS",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.135481242857232,
                  -73.61832274878961
                ]
              }
            },
            {
              "id": "09413b05-ce04-4bcc-bf96-bf0bb0c54569",
              "title": "14. COLEGIO ABRAHAM LINCOLN",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.142942524654118,
                  -73.6265715025365
                ]
              }
            },
            {
              "id": "6d211ab2-3632-4c41-acb5-000c637fb71d",
              "title": "15. ENTRADA ALBORADA BOMBA TEXACO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.125153059622636,
                  -73.61978979427391
                ]
              }
            },
            {
              "id": "7cc8c39b-c1fa-4d95-8d5c-8d14c1407440",
              "title": "16. BARRIO INDUSTRIAL",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.153551404893309,
                  -73.62707078823115
                ]
              }
            },
            {
              "id": "4a3d0477-69e2-4c0d-bb20-b93db461b92d",
              "title": "17. LAVAUTOS LOS TIGRES",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.147468446531595,
                  -73.62956696099535
                ]
              }
            },
            {
              "id": "9277bbfa-c36a-422e-a47e-87e68f054eba",
              "title": "18. COLEGIO FEMENINO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.136014025152764,
                  -73.62784318017582
                ]
              }
            },
            {
              "id": "05672d97-2fc6-4305-817f-59d102b4681b",
              "title": "19. MEGA COLEGIO LA RELIQUIA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.123738771697338,
                  -73.54229246835924
                ]
              }
            },
            {
              "id": "0ca7bef4-6589-45cb-8bda-8acb13d9d4c8",
              "title": "20. RELIQUIA CENTRO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.127332922518089,
                  -73.54686840171551
                ]
              }
            },
            {
              "id": "b27836a9-670d-4f2c-beb6-2439c00ea016",
              "title": "21. CALLE DE LAS FERRETERIAS",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.150139700372033,
                  -73.63396860085837
                ]
              }
            },
            {
              "id": "9ac53a90-36ef-464a-b787-81e7bfb93497",
              "title": "22. ENTRADA RECREO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.146195362393721,
                  -73.61159455091227
                ]
              }
            },
            {
              "id": "3a22abe7-9a8e-403b-a4d9-8d52dfd6333a",
              "title": "23. PORFIA BARRIO PLAYITA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.079742400442017,
                  -73.67482064503648
                ]
              }
            },
            {
              "id": "e11a715b-c912-41c4-9f35-b2f0196edbdc",
              "title": "24. BARRIO SANTA FE",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.149945444851694,
                  -73.62589678610611
                ]
              }
            },
            {
              "id": "ab65cf55-3326-41bd-99ce-25408bb2b038",
              "title": "25. PORFIA GAVIONES",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.082708010637188,
                  -73.67270522636835
                ]
              }
            },
            {
              "id": "fb18b8c7-74d8-4753-bf29-e76bcc2c009b",
              "title": "26. RESPALDO CLINICA META",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.144170090828803,
                  -73.6364042705287
                ]
              }
            },
            {
              "id": "886c803e-4695-4440-be0f-7062b1a01354",
              "title": "27. HATO GRANDE",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.147141791871791,
                  -73.61733976162725
                ]
              }
            },
            {
              "id": "c2efe822-bca9-472a-850e-8845da890080",
              "title": "28. PORFIA BANCO CONGENTE",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.078499910400493,
                  -73.66944026513572
                ]
              }
            },
            {
              "id": "8ae9d8af-8d37-4233-8f65-b44412fbee0a",
              "title": "29. CAMELIAS PLANCHON",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.137452325306077,
                  -73.61034813563624
                ]
              }
            },
            {
              "id": "f70510d3-f486-49e2-9600-ca3f526ba0b5",
              "title": "30. PLAZOLETA LOS CENTAUROS",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.150924208168182,
                  -73.63642632113718
                ]
              }
            },
            {
              "id": "7d6e222c-bd9e-457e-9237-1b1549dcaf78",
              "title": "31. IGLESIA BUQUE",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.137888401583761,
                  -73.64825499718062
                ]
              }
            },
            {
              "id": "49248be8-9beb-45db-a5b4-f409d5715d8a",
              "title": "32. LLANABASTOS",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.123403204175325,
                  -73.61169676212104
                ]
              }
            },
            {
              "id": "51d6243d-5154-4957-b448-e13e323830d6",
              "title": "33. SEPTIMA BRIGADA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.11984668560442,
                  -73.61591431321034
                ]
              }
            },
            {
              "id": "ba15fedd-5884-4e77-9349-ea653609f945",
              "title": "34. ETELL",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.131398054303987,
                  -73.62871232107193
                ]
              }
            },
            {
              "id": "636c23e5-6c63-473d-838b-dbba78c7e32d",
              "title": "35. GAITAN MOTELES",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.143250072672136,
                  -73.6287457169542
                ]
              }
            },
            {
              "id": "0805c5e2-1360-4345-beb6-3821e8f9fc9b",
              "title": "36. MEGA COLEGIO CALDAS",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.148905946802141,
                  -73.63208047657727
                ]
              }
            },
            {
              "id": "58dbc05d-0455-4f10-986f-bb59d74914d7",
              "title": "37. BARRIO VILLA JULIA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.152886160590583,
                  -73.63180765468867
                ]
              }
            },
            {
              "id": "f4a61819-a3b3-465b-a00c-c865c2ce7f38",
              "title": "38. EL NOGAL",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.139337534327351,
                  -73.6254396298526
                ]
              }
            },
            {
              "id": "2d8c7e25-a698-4454-b3a8-73f552ef0a7c",
              "title": "39. VILLA SUAREZ",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.153894305695222,
                  -73.61528965563936
                ]
              }
            },
            {
              "id": "b8d2448a-1c8e-4255-a667-85df71a65f84",
              "title": "40. BARRIO CALAMAR",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.153086142432573,
                  -73.61300328871644
                ]
              }
            },
            {
              "id": "f75f72cd-f810-49af-b2b8-0d0beb04c913",
              "title": "41. BARRIO PLAYA RICA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.107766701618763,
                  -73.6611017980744
                ]
              }
            },
            {
              "id": "c3c0efe8-267d-4a85-a14c-9d7ad5eecb68",
              "title": "42. BARRIO ANTONIO PINILLA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.133131834409288,
                  -73.58942549231422
                ]
              }
            },
            {
              "id": "7283a705-a65f-423c-952c-aa166522446b",
              "title": "43. BOMBEROS",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.148933333333333,
                  -73.63513333333333
                ]
              }
            },
            {
              "id": "b08c766d-97c5-4fcc-abd3-9fe6be033386",
              "title": "44. ENTRADA POPULAR CEIBA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.141989658291086,
                  -73.61700824875301
                ]
              }
            },
            {
              "id": "6c1b1840-10f7-4c11-8481-ec1e6beddf24",
              "title": "45. ENTRADA COVISAN",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.137352939717701,
                  -73.58630847175932
                ]
              }
            },
            {
              "id": "808c9310-5ce2-4d0c-8fec-a28c9265fbfa",
              "title": "46. 7 DE AGOSTO PLAZA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.141498448766875,
                  -73.63762095643438
                ]
              }
            },
            {
              "id": "474769c4-da85-4c4f-811b-d8d5b2a3e686",
              "title": "47. IGLESIA JORDAN",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.152745916695842,
                  -73.62223594745426
                ]
              }
            },
            {
              "id": "782dab27-2605-4568-89cf-3758d35d18a9",
              "title": "48. P SALUD BARRIO COMUNEROS",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.124082148603755,
                  -73.62658908732114
                ]
              }
            },
            {
              "id": "97da82b3-ae90-4731-84b0-708b106b868f",
              "title": "49. VILLACENTRO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.133860166864027,
                  -73.63675846337073
                ]
              }
            },
            {
              "id": "56de91d4-f933-4b76-b512-96fe162cce79",
              "title": "50. BARZAL CASA DEL KUMIS",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.144506129542079,
                  -73.63783669675236
                ]
              }
            },
            {
              "id": "f32a3d8f-267f-4a46-91de-a0fd213f60f7",
              "title": "51. PARQUE FUNDADORES",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.123097116964069,
                  -73.64306303172587
                ]
              }
            },
            {
              "id": "3607c7ab-d676-4df6-916b-29d620035974",
              "title": "52. VILLA DEL SOL",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.139840723347015,
                  -73.60843341668992
                ]
              }
            },
            {
              "id": "059e6711-35cb-4b9d-8df3-f9ba3e67f970",
              "title": "53. SAN JOSE ENTRADA PRINCIPAL",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.146913124517701,
                  -73.64077227515924
                ]
              }
            },
            {
              "id": "8a3368cd-5a4a-4a14-a222-efb49e2891e8",
              "title": "54. CAUDAL ALTO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.159473728272628,
                  -73.63913318733375
                ]
              }
            },
            {
              "id": "7991eaf6-a8fc-4098-a97a-6cbb459496cb",
              "title": "55. CAI GALAN",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.155634002041527,
                  -73.65637347132656
                ]
              }
            },
            {
              "id": "addaf905-632e-494b-8ee7-12f302ed96e1",
              "title": "56. BARRIO EL RETIRO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.141647743840557,
                  -73.62421473558084
                ]
              }
            },
            {
              "id": "cfabcea1-8c6e-428b-8f31-dca3ed4680d5",
              "title": "57. REGISTRADURIA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.13765,
                  -73.63591666666667
                ]
              }
            },
            {
              "id": "7b0d4020-2bca-4b7f-8d29-63f73b4ad5a9",
              "title": "58. BARZAL BAJO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.148236247589566,
                  -73.64035867955914
                ]
              }
            },
            {
              "id": "c42cf7b6-316c-4eba-9136-3d01dc8fdaf3",
              "title": "59. ENTRADA MONTECARLO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.098617633645387,
                  -73.65512753733752
                ]
              }
            },
            {
              "id": "883d936d-2d3f-406e-99a9-f1d7446400ba",
              "title": "60. HOTEL BAHIA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.133928973703544,
                  -73.61308361852998
                ]
              }
            },
            {
              "id": "7dcd230a-53d4-4b1b-b834-512cbc7f5b49",
              "title": "61. ENTRADA BRISAS DE GUATIQUIA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.154575082796373,
                  -73.62748469498007
                ]
              }
            },
            {
              "id": "73e5adf3-f689-4c81-9f04-866ca2cfc221",
              "title": "62. CHANTILLY VILLA BOLIVAR",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.123500476805242,
                  -73.63364968549344
                ]
              }
            },
            {
              "id": "334977bd-2586-4418-8983-a2eee70cbc1f",
              "title": "63. BARRIO ESTERO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.129344504388085,
                  -73.61307649440349
                ]
              }
            },
            {
              "id": "59002271-15fe-47e9-8a49-ba114c6200c0",
              "title": "64 POLIDEPORTIVO BRISAS GUATIQUIA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.155841956689371,
                  -73.6290820511212
                ]
              }
            },
            {
              "id": "b7726e4b-2c66-4e3c-904c-76b47b768199",
              "title": "65. BARRIO 7 DE AGOSTO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.140809999786796,
                  -73.63934156028859
                ]
              }
            },
            {
              "id": "edc0949e-21a5-4c5a-be4a-406637726f1a",
              "title": "66. PUENTE LA CRUZ",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.150415929931604,
                  -73.63948957281536
                ]
              }
            },
            {
              "id": "72afe8b5-eaf2-4db8-81e7-f94cb84fec32",
              "title": "67. PIEL CANELA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.141219604244776,
                  -73.6317357123453
                ]
              }
            },
            {
              "id": "22bd4b1b-b76e-4660-a21e-26ef0949b94b",
              "title": "68. ENTRADA CANTA RANA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.134779450407776,
                  -73.62239862709484
                ]
              }
            },
            {
              "id": "50d435fb-a649-48c0-994f-58c5e9d514bb",
              "title": "69. DIAN",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.152132232092303,
                  -73.63821950415392
                ]
              }
            },
            {
              "id": "24d3ab61-d49d-428c-b7c7-b5c7a5e64b8f",
              "title": "70. COLEGIO BARRIO SAN JOSE",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.148162132654133,
                  -73.64344054415514
                ]
              }
            },
            {
              "id": "811e629b-1f8f-4796-8e06-460ba882c985",
              "title": "71. PLAZA DE MERCADO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.15142544535909,
                  -73.63278543801776
                ]
              }
            },
            {
              "id": "c5c3da10-0ee3-4bde-a156-296484586bcc",
              "title": "72. EXITO VECINO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.15208277423632,
                  -73.6353630743942
                ]
              }
            },
            {
              "id": "567bea20-5604-46dc-a686-67341f360182",
              "title": "73. CLINICA MARTHA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.147022217126329,
                  -73.63890348977624
                ]
              }
            },
            {
              "id": "b444d8e4-b35a-4fc8-9113-a2dd298e4132",
              "title": "74. GLORIETA DAS",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.14443551043252,
                  -73.64333868165906
                ]
              }
            },
            {
              "id": "a6834193-1126-450f-810b-89b80c134e57",
              "title": "75. AMERICAS - SERRAMONTE VIA ACACIAS",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.115194224187657,
                  -73.64936380435553
                ]
              }
            },
            {
              "id": "ade47b9c-f598-4144-9c7d-eb1d19c4ed31",
              "title": "76. EXITO DE LA SABANA",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.127128579310945,
                  -73.63830457320658
                ]
              }
            },
            {
              "id": "b9e64399-3b26-435f-a192-918526450521",
              "title": "77. MANANTIAL",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.145323088879763,
                  -73.60642037894277
                ]
              }
            },
            {
              "id": "55725d43-15f5-45a4-82cd-e4f260110244",
              "title": "78. CALLE 36 DIVINO NIÑO",
              "geometry": {
                "type": "Point",
                "coordinates": [
                  4.151083687710139,
                  -73.63449026804811
                ]
              }
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $data) {
            DB::table('fiber_points')->insert([
                'name' => $data['title'],
                'uuid'=> Str::uuid(),
                'position' => json_encode($data['geometry'])
            ]);
        }
    }
}

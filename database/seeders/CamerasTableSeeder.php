<?php

namespace Database\Seeders;

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
              "name": "01. IGLESIA PORFIA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.082492168,
                        -73.6694145
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "02. BARRIO MONTECARLO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.104435675,
                        -73.6564804
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "03. PUENTE UNION RECREO Y POPULAR",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.142513528,
                        -73.6124916
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "04. ENTRADA M CENTAUROS",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.115452504,
                        -73.6343266
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "05. ENTRADA LA SALLE",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.150838507,
                        -73.6408079
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "06. CC VILLLA JULIA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.154000353,
                        -73.6353551
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "07. TRANSITO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.150313337,
                        -73.6206604
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "08. CHANTILLY VIZCAYA - HACARITAMA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.12653531,
                        -73.6160647
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "09. ESTADIO BOMBONERA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.139742765,
                        -73.6141847
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "10. PUENTE ESPERANZA ENTRE 6 Y 7",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.128946092,
                        -73.6314078
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "11. COLEGIO COFREM",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147111003,
                        -73.6198352
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "12. BOMBA LA SABANA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.148066504,
                        -73.6246818
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "13. BOMBA ESSO VIA MARACOS",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.135400999,
                        -73.6180555
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "14. COLEGIO ABRAHAM LINCOLN",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.143106706,
                        -73.6263363
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "15. ENTRADA ALBORADA BOMBA TEXACO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.125115756,
                        -73.6193326
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "16. BARRIO INDUSTRIAL",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153469819,
                        -73.6274772
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "17. LAVAUTOS LOS TIGRES",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147876665,
                        -73.6292444
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "18. COLEGIO FEMENINO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.135838412,
                        -73.6279773
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "19. MEGA COLEGIO LA RELIQUIA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.123763189,
                        -73.5424442
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "20. RELIQUIA CENTRO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.127308594,
                        -73.547041
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "21. CALLE DE LAS FERRETERIAS",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.150179234,
                        -73.6343508
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "22. ENTRADA RECREO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.146161609,
                        -73.611611
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "23. PORFIA BARRIO PLAYITA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.07908049,
                        -73.6742013
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "24. BARRIO SANTA FE",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.149752104,
                        -73.6254501
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "25. PORFIA GAVIONES",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.083909619,
                        -73.6715228
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "26. RESPALDO CLINICA META",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.144027455,
                        -73.6367259
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "27. HATO GRANDE",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147121965,
                        -73.6176239
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "28. PORFIA BANCO CONGENTE",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.078543968,
                        -73.6694246
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "29. CAMELIAS PLANCHON",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.137103722,
                        -73.6105586
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "30. PLAZOLETA LOS CENTAUROS",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.151005058,
                        -73.6361089
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "31. IGLESIA BUQUE",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.137608398,
                        -73.6476916
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "32. LLANO ABASTOS",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.123176586,
                        -73.6117336
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "33. SEPTIMA BRIGADA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.119375462,
                        -73.6153347
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "34. ETELL",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.13113547,
                        -73.6285029
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "35. GAITAN MOTELES",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.143131182,
                        -73.6285841
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "36. MEGA COLEGIO CALDAS",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.148978012,
                        -73.6317051
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "37. BARRIO VILLA JULIA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153025932,
                        -73.6322248
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "38. EL NOGAL",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.139431758,
                        -73.625789
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "39. VILLA SUAREZ",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.154188794,
                        -73.615248
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "40. BARRIO CALAMAR",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153491165,
                        -73.6132963
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "41. BARRIO PLAYA RICA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.107297738,
                        -73.660721
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "42. BARRIO ANTONIO PINILLA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.133186653,
                        -73.5885898
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "43. BOMBEROS",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153995923,
                        -73.6344848
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "44. ENTRADA POPULAR CEIBA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.141934227,
                        -73.6170945
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "45. ENTRADA COVISAN",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.137229625,
                        -73.5867173
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "46. 7 DE AGOSTO PLAZA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14146709,
                        -73.6376209
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "47. IGLESIA JORDAN",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.152681062,
                        -73.6219415
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "48. P SALUD BARRIO COMUNEROS",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.12396548,
                        -73.6264263
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "49. VILLA SUAREZ",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.133919409,
                        -73.6376273
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "50. BARRIO CALAMAR",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153491165,
                        -73.6132963
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "51. PARQUE FUNDADORES",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.123398069,
                        -73.6427047
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "52. VILLA DEL SOL",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.139693475,
                        -73.6084591
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "53. SAN JOSE ENTRADA PRINCIPAL",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147040476,
                        -73.6406753
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "54. CAUDAL ALTO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.159507285,
                        -73.6390251
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "55. CAI GALAN",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.155571492,
                        -73.6565583
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "56. BARRIO EL RETIRO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.141626625,
                        -73.6243205
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "57. REGISTRADURIA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.150503866,
                        -73.639455
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "58. SAN JOSE, (via BARZAL Bajo)",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.147608061,
                        -73.6400788
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "59. ENTRADA MONTECARLO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.098903735,
                        -73.6551367
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "60. HOTEL BAHIA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.133879219,
                        -73.613117
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "61. ENTRADA BRISAS DE GUATIQUIA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.153925884,
                        -73.6273276
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "62. CHANTILLY VILLA BOLIVAR",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.123404207,
                        -73.6336132
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "63. BARRIO ESTERO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.129288068,
                        -73.6129116
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "64. POLIDEPORTIVO BRISAS GUATIQUIA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.155344425,
                        -73.6286006
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "65. BARRIO 7 DE AGOSTO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14128166,
                        -73.6389936
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "66. PUENTE LA CRUZ",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.150079161,
                        -73.6395551
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "67. PIEL CANELA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.141316296,
                        -73.6318753
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "68. ENTRADA CANTA RANA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.134614751,
                        -73.6221623
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "69. DIAN",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.150873462,
                        -73.6374085
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "70. COLEGIO BARRIO SAN JOSE",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14791563,
                        -73.6432183
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "71. PLAZA DE MERCADO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.151647192,
                        -73.6330589
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "72. EXITO VECINO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.151963462,
                        -73.6351372
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "73. CLINICA MARTHA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.146931616,
                        -73.6389157
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "74. GLORIETA DAS",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.14454629,
                        -73.6433724
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "76. EXITO DE LA SABANA",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.126589895,
                        -73.6378572
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "77. MANANTIAL",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.145280801,
                        -73.6063572
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "78. CALLE 36 DIVINO NIÑO",
              "address": "PU",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.151220681,
                        -73.6348115
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CODALTEC CASA 1",
              "address": "PR",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.137811103,
                        -73.6435063
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CODALTEC CASA 2",
              "address": "PR",
              "url": "https://villavicencio.medusaapi.online/api/v1/ver-video1",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        4.137072742,
                        -73.6437316
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
            DB::table('cameras')->insert([
                'name' => $Data['name'],
                'uuid'=> Str::uuid(),
                'address' => $Data['address'],
                'url' => $Data['url'],
                'pointCoordinates' => json_encode($Data['pointCoordinates']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            "array":[
            {
              "name": "01. IGLESIA PORFIA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6694145,
                        4.082492168
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "02. BARRIO MONTECARLO",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6564804,
                        4.104435675
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "03. PUENTE UNION RECREO Y POPULAR",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6124916,
                        4.142513528
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "04. ENTRADA M CENTAUROS",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6343266,
                        4.115452504
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "05. ENTRADA LA SALLE",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6408079,
                        4.150838507
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "06. CC VILLLA JULIA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6353551,
                        4.154000353
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "07. TRANSITO",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6206604,
                        4.150313337
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "08. CHANTILLY VIZCAYA - HACARITAMA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6160647,
                        4.12653531
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "09. ESTADIO BOMBONERA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6141847,
                        4.139742765
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "10. PUENTE ESPERANZA ENTRE 6 Y 7",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6314078,
                        4.128946092
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "11. COLEGIO COFREM",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6198352,
                        4.147111003
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "12. BOMBA LA SABANA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6246818,
                        4.148066504
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "13. BOMBA ESSO VIA MARACOS",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6180555,
                        4.135400999
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "14. COLEGIO ABRAHAM LINCOLN",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6263363,
                        4.143106706
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "15. ENTRADA ALBORADA BOMBA TEXACO",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6193326,
                        4.125115756
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "16. BARRIO INDUSTRIAL",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6274772,
                        4.153469819
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "17. LAVAUTOS LOS TIGRES",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6292444,
                        4.147876665
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "18. COLEGIO FEMENINO",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6279773,
                        4.135838412
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "19. MEGA COLEGIO LA RELIQUIA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.5424442,
                        4.123763189
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "20. RELIQUIA CENTRO",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.547041,
                        4.127308594
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "21. CALLE DE LAS FERRETERIAS",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6343508,
                        4.150179234
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "22. ENTRADA RECREO",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.611611,
                        4.146161609
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "23. PORFIA BARRIO PLAYITA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6742013,
                        4.07908049
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "24. BARRIO SANTA FE",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6254501,
                        4.149752104
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "25. PORFIA GAVIONES",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6715228,
                        4.083909619
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "26. RESPALDO CLINICA META",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6367259,
                        4.144027455
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "27. HATO GRANDE",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6176239,
                        4.147121965
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "28. PORFIA BANCO CONGENTE",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6694246,
                        4.078543968
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "29. CAMELIAS PLANCHON",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6105586,
                        4.137103722
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "30. PLAZOLETA LOS CENTAUROS",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6361089,
                        4.151005058
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "31. IGLESIA BUQUE",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6476916,
                        4.137608398
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "32. LLANO ABASTOS",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6117336,
                        4.123176586
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "33. SEPTIMA BRIGADA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6153347,
                        4.119375462
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "34. ETELL",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6285029,
                        4.13113547
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "35. GAITAN MOTELES",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6285841,
                        4.143131182
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "36. MEGA COLEGIO CALDAS",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6317051,
                        4.148978012
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "37. BARRIO VILLA JULIA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6322248,
                        4.153025932
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "38. EL NOGAL",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.625789,
                        4.139431758
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "39. VILLA SUAREZ",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.615248,
                        4.154188794
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "40. BARRIO CALAMAR",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6132963,
                        4.153491165
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "41. BARRIO PLAYA RICA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.660721,
                        4.107297738
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "42. BARRIO ANTONIO PINILLA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.5885898,
                        4.133186653
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "43. BOMBEROS",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6344848,
                        4.153995923
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "44. ENTRADA POPULAR CEIBA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6170945,
                        4.141934227
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "45. ENTRADA COVISAN",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.5867173,
                        4.137229625
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "46. 7 DE AGOSTO PLAZA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6376209,
                        4.14146709
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "47. IGLESIA JORDAN",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6219415,
                        4.152681062
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "48. P SALUD BARRIO COMUNEROS",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6264263,
                        4.12396548
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "49. VILLA SUAREZ",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6376273,
                        4.133919409
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "50. BARRIO CALAMAR",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6132963,
                        4.153491165
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "51. PARQUE FUNDADORES",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6427047,
                        4.123398069
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "52. VILLA DEL SOL",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6084591,
                        4.139693475
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "53. SAN JOSE ENTRADA PRINCIPAL",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6406753,
                        4.147040476
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "54. CAUDAL ALTO",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6390251,
                        4.159507285
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "55. CAI GALAN",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6565583,
                        4.155571492
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "56. BARRIO EL RETIRO",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6243205,
                        4.141626625
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "57. REGISTRADURIA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.639455,
                        4.150503866
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "58. SAN JOSE, (via BARZAL Bajo)",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6400788,
                        4.147608061
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "59. ENTRADA MONTECARLO",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6551367,
                        4.098903735
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "60. HOTEL BAHIA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.613117,
                        4.133879219
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "61. ENTRADA BRISAS DE GUATIQUIA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6273276,
                        4.153925884
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "62. CHANTILLY VILLA BOLIVAR",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6336132,
                        4.123404207
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "63. BARRIO ESTERO",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6129116,
                        4.129288068
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "64. POLIDEPORTIVO BRISAS GUATIQUIA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6286006,
                        4.155344425
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "65. BARRIO 7 DE AGOSTO",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6389936,
                        4.14128166
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "66. PUENTE LA CRUZ",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6395551,
                        4.150079161
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "67. PIEL CANELA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6318753,
                        4.141316296
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "68. ENTRADA CANTA RANA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6221623,
                        4.134614751
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "69. DIAN",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6374085,
                        4.150873462
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "70. COLEGIO BARRIO SAN JOSE",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6432183,
                        4.14791563
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "71. PLAZA DE MERCADO",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6330589,
                        4.151647192
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "72. EXITO VECINO",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6351372,
                        4.151963462
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "73. CLINICA MARTHA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6389157,
                        4.146931616
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "74. GLORIETA DAS",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6433724,
                        4.14454629
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "76. EXITO DE LA SABANA",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6378572,
                        4.126589895
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "77. MANANTIAL",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6063572,
                        4.145280801
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "78. CALLE 36 DIVINO NI\u00d1O",
              "address": "PU",
              "url": "http://streaming.com.co/player/preview.php?servidor=vbox.cehis.net/IP-servinformacion&stream=931-4-5-servi.stream&titulo=C%C3%A1mara%20en%20VIVO&smil=no&tamano=personalizado&aspecto=a&ancho=640&alto=365",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6348115,
                        4.151220681
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CODALTEC CASA 1",
              "address": "PR",
              "url": "http://181.63.246.86:8093",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6435063,
                        4.137811103
                      ]
                    }
                  }
                ]
              }
            },
            {
              "name": "CODALTEC CASA 2",
              "address": "PR",
              "url": "http://181.49.7.246:8093",
              "pointCoordinates": {
                "features": [
                  {
                    "type": "Feature",
                    "geometry": {
                      "type": "Point",
                      "coordinates": [
                        -73.6437316,
                        4.137072742
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
                'address' => $Data['address'],
                'url' => $Data['url'],
                'pointCoordinates' => json_encode($Data['pointCoordinates'])
            ]);
        }
    }
}

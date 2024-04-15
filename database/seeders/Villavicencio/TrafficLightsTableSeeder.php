<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TrafficLightsTableSeeder extends Seeder
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
                    "name": "Único",
                    "coordinates": "4.128656683050969, -73.62236937381121"
                },
                {
                    "name": "Colegio Femenino",
                    "coordinates": "4.135770919101156, -73.62780946585769"
                },
                {
                    "name": "Molino San Marcos",
                    "coordinates": "4.141235701020961, -73.63185300715348"
                },
                {
                    "name": "Pentagrama",
                    "coordinates": "4.14049342293982, -73.63134491040324"
                },
                {
                    "name": "Palacio de Justicia",
                    "coordinates": "4.146014598642041, -73.63571873033038"
                },
                {
                    "name": "Parque de Los Estudiantes",
                    "coordinates": "4.14695846478008, -73.63643583745719"
                },
                {
                    "name": "Santa María Reina",
                    "coordinates": "4.146082728232762, -73.6314319198117"
                },
                {
                    "name": "Bomberos",
                    "coordinates": "4.1489977095204, -73.63507454281812"
                },
                {
                    "name": "Parque El Hacha",
                    "coordinates": "4.149416756519579, -73.63663598204403"
                },
                {
                    "name": "Banco de La República",
                    "coordinates": "4.151329307192328, -73.63770799995348"
                },
                {
                    "name": "Sabiduría",
                    "coordinates": "4.152824354918336, -73.63853242602043"
                },
                {
                    "name": "Alcaldía",
                    "coordinates": "4.152024358686943, -73.63993833976181"
                },
                {
                    "name": "Éxito Vecino",
                    "coordinates": "4.152495015530825, -73.63546781768427"
                },
                {
                    "name": "Antiguo Ley",
                    "coordinates": "4.152393499774613, -73.63429899173758"
                },
                {
                    "name": "Cruz Roja",
                    "coordinates": "4.1537783463446, -73.63681538206701"
                },
                {
                    "name": "Invias",
                    "coordinates": "4.155612723523956, -73.63661590091442"
                },
                {
                    "name": "Virgen de Manare",
                    "coordinates": "4.154709874785874, -73.63573630719817"
                },
                {
                    "name": "Bomba Alborada",
                    "coordinates": "4.125091023041918, -73.61969273666308"
                },
                {
                    "name": "Semillano",
                    "coordinates": "4.126530330860328, -73.62078624031484"
                },
                {
                    "name": "Alcalá Motors",
                    "coordinates": "4.115361482414794, -73.63031881789404"
                },
                {
                    "name": "Rosablanca",
                    "coordinates": "4.117590454106606, -73.62280890326535"
                },
                {
                    "name": "Chevrolet",
                    "coordinates": "4.115820959228965, -73.63434251491613"
                },
                {
                    "name": "Uniminuto",
                    "coordinates": "4.112405930238983, -73.63354562151761"
                },
                {
                    "name": "Hyundai",
                    "coordinates": "4.118089255877742, -73.63858355500216"
                },
                {
                    "name": "Industrial",
                    "coordinates": "4.152078607134568, -73.62838195415321"
                },
                {
                    "name": "Porfía",
                    "coordinates": "4.082685409211785, -73.66929598266232"
                },
                {
                    "name": "Lllanabastos",
                    "coordinates": "4.123394877722427, -73.61192511095911"
                },
                {
                    "name": "Villacentro",
                    "coordinates": "4.133832668479581, -73.63662694853288"
                },
                {
                    "name": "Clínica de Cirugía Ocular",
                    "coordinates": "4.135945683281823, -73.64296427405499"
                },
                {
                    "name": "Unicentro",
                    "coordinates": "4.141182955156019, -73.63480949270944"
                },
                {
                    "name": "Colegio INEM",
                    "coordinates": "4.139979533004323, -73.62772036533602"
                },
                {
                    "name": "Urb. La Macarena",
                    "coordinates": "4.13928376158665, -73.62545980026501"
                },
                {
                    "name": "Cantarrana",
                    "coordinates": "4.134776541883878, -73.62247250898518"
                },
                {
                    "name": "ETELL",
                    "coordinates": "4.131278066188126, -73.62902213092866"
                },
                {
                    "name": "CDE",
                    "coordinates": "4.13285429389614, -73.63362494196301"
                },
                {
                    "name": "Clínica Cardiovascular",
                    "coordinates": "4.142917716430508, -73.64000931337232"
                },
                {
                    "name": "Primavera Urbana",
                    "coordinates": "4.134647617118988, -73.63912944573713"
                },
                {
                    "name": "Discotecas",
                    "coordinates": "4.139817970425915, -73.63887819731619"
                },
                {
                    "name": "Dentisalud",
                    "coordinates": "4.144813889377921, -73.63879499756253"
                },
                {
                    "name": "Iglesia Templete",
                    "coordinates": "4.145530219442193, -73.64091430013244"
                },
                {
                    "name": "Hotel Rosado",
                    "coordinates": "4.149062957627861, -73.6285618894008"
                },
                {
                    "name": "Colegio Caldas",
                    "coordinates": "4.14909747199171, -73.63108310321445"
                },
                {
                    "name": "Monumento Al Coleo",
                    "coordinates": "4.156133701567848, -73.63140375898752"
                },
                {
                    "name": "Cofrem",
                    "coordinates": "4.147541102175619, -73.61999553736568"
                },
                {
                    "name": "Jordán",
                    "coordinates": "4.147888857983162, -73.62166577753099"
                },
                {
                    "name": "Yamaha Catama",
                    "coordinates": "4.148218698820168, -73.62404929414124"
                },
                {
                    "name": "San Gregorio",
                    "coordinates": "4.149223116419382, -73.63031458814994"
                },
                {
                    "name": "Hato Grande",
                    "coordinates": "4.147138348728991, -73.61727436065084"
                },
                {
                    "name": "Cerro Campestre",
                    "coordinates": "4.125319883919548, -73.60994875326509"
                },
                {
                    "name": "Justo y Bueno",
                    "coordinates": "4.140792108201731, -73.63924374656855"
                },
                {
                    "name": "Barzal Medio",
                    "coordinates": "4.146035772527203, -73.63963949159877"
                },
                {
                    "name": "Coomeva",
                    "coordinates": "4.145495290989716, -73.63898326531169"
                },
                {
                    "name": "Movilco",
                    "coordinates": "4.142932135488197, -73.63812857275775"
                },
                {
                    "name": "Conjunto Barzal",
                    "coordinates": "4.143547366304488, -73.63833805576689"
                },
                {
                    "name": "Carnes Danny",
                    "coordinates": "4.141379072115384, -73.63759334290712"
                },
                {
                    "name": "Fuente Luminosa",
                    "coordinates": "4.140374344396792, -73.63724115390208"
                },
                {
                    "name": "Registraduría",
                    "coordinates": "4.137460874535986, -73.63576846826348"
                },
                {
                    "name": "Iglesia San Benito",
                    "coordinates": "4.139702686058321, -73.63512327862996"
                },
                {
                    "name": "Lavadero Los Tigres",
                    "coordinates": "4.14741711730141, -73.62951116045903"
                },
                {
                    "name": "Fresilandia",
                    "coordinates": "4.141129482902095, -73.62104494876661"
                },
                {
                    "name": "Estadio Bello Horizonte",
                    "coordinates": "4.138987867714699, -73.62140838791159"
                },
                {
                    "name": "Barzal Bajo",
                    "coordinates": "4.148275956603282, -73.63790060268515"
                },
                {
                    "name": "7ma Etapa",
                    "coordinates": "4.131715903216453, -73.63039963322095"
                },
                {
                    "name": "Chantilly Vizcaya",
                    "coordinates": "4.126719590411398, -73.61628740023156"
                },
                {
                    "name": "Manantial",
                    "coordinates": "4.145254807433691, -73.60647728739583"
                },
                {
                    "name": "Camino Real",
                    "coordinates": "4.146094488507613, -73.6117176284814"
                },
                {
                    "name": "San Carlos",
                    "coordinates": "4.137579159124001, -73.58911430132733"
                },
                {
                    "name": "CAI Catama",
                    "coordinates": "4.142773748465249, -73.60162921195401"
                },
                {
                    "name": "Estero",
                    "coordinates": "4.133996214625968, -73.61306714668083"
                },
                {
                    "name": "Remanso",
                    "coordinates": "4.135547028185072, -73.61826965953534"
                },
                {
                    "name": "Villa Olímpica",
                    "coordinates": "4.140358608221639, -73.61735064717479"
                },
                {
                    "name": "Medicina Legal",
                    "coordinates": "4.138611380053384, -73.60302319386759"
                },
                {
                    "name": "Villa Bolívar",
                    "coordinates": "4.123537324553261, -73.63360990865168"
                },
                {
                    "name": "Terminal de Transporte",
                    "coordinates": "4.131916964367447, -73.60527166570593"
                },
                {
                    "name": "CC VIVA",
                    "coordinates": "4.125458092490213, -73.6361125270688"
                },
                {
                    "name": "Doña Luz",
                    "coordinates": "4.11497081829784, -73.60865579780027"
                },
                {
                    "name": "Somos",
                    "coordinates": "4.137688630001358, -73.63822668826468"
                },
                {
                    "name": "Santa Helena",
                    "coordinates": "4.150733779244132, -73.61639952916485"
                },
                {
                    "name": "Emporio",
                    "coordinates": "4.158751927240897, -73.63461989004952"
                },
                {
                    "name": "Colsubsidio",
                    "coordinates": "4.139064532217268, -73.63677458248847"
                },
                {
                    "name": "Comando Policía",
                    "coordinates": "4.159068142190596, -73.64392429357274"
                },
                {
                    "name": "Las Acacias",
                    "coordinates": "4.11938068835338, -73.63135059812667"
                },
                {
                    "name": "Catumare",
                    "coordinates": "4.109128359191807, -73.65472040981351"
                },
                {
                    "name": "Ferreterías",
                    "coordinates": "4.150180243352239, -73.63482256465936"
                },
                {
                    "name": "Parque de Los Artesanos",
                    "coordinates": "4.154755838521119, -73.63722306643847"
                },
                {
                    "name": "KIA",
                    "coordinates": "4.129962750507934, -73.63815780735605"
                },
                {
                    "name": "Jardín",
                    "coordinates": "4.131277038008393, -73.62800022032589"
                },
                {
                    "name": "Covisan",
                    "coordinates": "4.137224754856024, -73.58622883747718"
                },
                {
                    "name": "Santa Inés",
                    "coordinates": "4.152157612683504, -73.63012421859082"
                },
                {
                    "name": "Villa Johana",
                    "coordinates": "4.132613608929248, -73.60835861043189"
                },
                {
                    "name": "Centauros",
                    "coordinates": "4.110999708920071, -73.63325764837565"
                },
                {
                    "name": "Amarilo",
                    "coordinates": "4.109237682057608, -73.63847311256197"
                },
                {
                    "name": "Pinilla Maracos",
                    "coordinates": "4.129618758965443, -73.58925640501616"
                },
                {
                    "name": "Colegio Fátima",
                    "coordinates": "4.15894575886513, -73.64314476560337"
                },
                {
                    "name": "8va Etapa",
                    "coordinates": "4.132346809794947, -73.63221852550897"
                },
                {
                    "name": "Quintas de San Jorge",
                    "coordinates": "4.107005645555438, -73.65084133696521"
                },
                {
                    "name": "Buque",
                    "coordinates": "4.139904928087896, -73.64105772790919"
                }
            ]
        }

          ';

        $dataArray = json_decode($data, true);
        foreach ($dataArray['array'] as $Data) {
            $coordinates = explode(', ', $Data['coordinates']);
            $latitude = $coordinates[0] ?? null;
            $longitude = $coordinates[1] ?? null;
            
            DB::table('traffic_lights')->insert([
                'uuid'=> Str::uuid(),
                'name' => $Data['name'],  
                'latitude' => $latitude,
                'longitude' => $longitude,              
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}


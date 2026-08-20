<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
              "id": 25,
              "name": "Leydy Lamprea",
              "email": "llampreac@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$W53tt8odR7rEd4adVcuLYev0yuN6/jMInZh8icYj06eZmzBpJ0tOi",
              "remember_token": null,
              "created_at": "2023-11-10 17:04:08",
              "updated_at": "2023-11-10 17:04:08"
            },
            {
              "id": 26,
              "name": "Margarita Ferreira",
              "email": "mferreirap24@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$cV3Cvuiw1WEsv5cVf70oR.YnEDWG03F7ZQQfyoScLaQ0L2NUwUth.",
              "remember_token": null,
              "created_at": "2023-11-10 17:04:16",
              "updated_at": "2023-11-10 17:04:16"
            },
            {
              "id": 24,
              "name": "Cristian Testing",
              "email": "testza@test.com",
              "phone_number": null,
              "address": null,
              "avatar": "ed3b8c7a-8da1-4ea4-894c-2499712ac92a.jpeg",
              "email_verified_at": null,
              "password": "$2y$10$r7ZCIGrJEa1Hhj44qRs5hOMNBvbPUvN3jqZXXhQ9pJ74CoM1zGmuq",
              "remember_token": null,
              "created_at": "2023-10-03 16:58:17",
              "updated_at": "2023-10-03 17:03:46"
            },
            {
              "id": 1,
              "name": "Jorge Ignicion",
              "email": "ignicion@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": "ac8af021-fd77-4a70-a2eb-ecf39aef3833.jpeg",
              "email_verified_at": null,
              "password": "$2y$10$VLJLVGIEl8RupfhiZMilceJq9/RgwUETM4ujtJbyNMKCnIYbbhsoG",
              "remember_token": null,
              "created_at": "2023-09-27 22:22:46",
              "updated_at": "2023-11-17 09:20:05"
            },
            {
              "id": 27,
              "name": "Camilo usuario de prueba",
              "email": "usuarioprueba@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$y84AGMy2Ox6/BGZRkfFDS.V3q184/Q.OXKW3bzp7vOssmp8Z/UiCm",
              "remember_token": null,
              "created_at": "2023-11-22 22:29:55",
              "updated_at": "2023-11-22 22:29:55"
            },
            {
              "id": 2,
              "name": "Cristian Rincón",
              "email": "cristianrincon.ui@gmail.com",
              "phone_number": null,
              "address": "Calle Falsa 123",
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$kgHrOGsBwUupzL0Zt/2XE.iA.FQEk8xbgnLmhFnV8nfQqa/8QnE1q",
              "remember_token": null,
              "created_at": "2023-09-29 16:34:33",
              "updated_at": "2023-10-03 21:47:17"
            },
            {
              "id": 21,
              "name": "Cristian Test",
              "email": "test@test.com",
              "phone_number": null,
              "address": "Calle Falsa 123",
              "avatar": "2c2caa80-57f9-435e-b635-76e1c4a6edb8.jpeg",
              "email_verified_at": null,
              "password": "$2y$10$TmKTsj0e6BWzqnVSmGod1.yw31P6nldLGIqQ3GuhY5X9o/styel/i",
              "remember_token": null,
              "created_at": "2023-10-02 18:30:17",
              "updated_at": "2023-10-03 21:47:53"
            },
            {
              "id": 28,
              "name": "Daniel Martinez",
              "email": "danielxz331@gmail.com",
              "phone_number": "3223238961",
              "address": "calle 20a #35-47",
              "avatar": "f6b55bfa-24b5-43a1-838e-74fabb10918e.jpeg",
              "email_verified_at": null,
              "password": "$2y$10$2dbnX/tAHfTESrr5AHDytugiU1mnTbe4foD.bPQO9Plp7J8oeEbAS",
              "remember_token": null,
              "created_at": "2023-12-22 13:52:54",
              "updated_at": "2023-12-22 13:52:54"
            },
            {
              "id": 29,
              "name": "Jorge Abella",
              "email": "jabella@gmail.com",
              "phone_number": "3223238961",
              "address": "calle 50 # 35-21",
              "avatar": "94069bdd-8432-4367-96f3-83674c800ea9.jpeg",
              "email_verified_at": null,
              "password": "$2y$10$VUSIV6/O1mSuZk30bCKg5OKAK2M1WD1LMQsjBFpLjkRVp4TzC4rWi",
              "remember_token": null,
              "created_at": "2023-12-22 14:07:40",
              "updated_at": "2023-12-22 14:07:40"
            },
            {
              "id": 30,
              "name": "Jhon Fanor",
              "email": "fanor@gmail.com",
              "phone_number": "3223238961",
              "address": "calle 20a #35-47",
              "avatar": "db0343cf-a5cc-4ba8-819c-4209bda0257f.jpeg",
              "email_verified_at": null,
              "password": "$2y$10$TITt51ROQQKfupUehr/XweNalJy1JkkTkuvhzUNBKN.4k6I8c2HrG",
              "remember_token": null,
              "created_at": "2023-12-22 14:08:35",
              "updated_at": "2023-12-22 14:08:35"
            },
            {
              "id": 31,
              "name": "Daniel Alferez",
              "email": "alferez@gmail.com",
              "phone_number": "3223238961",
              "address": "calle 20a #35-47",
              "avatar": "9039f384-c17b-4970-8bb4-d4c6dcbf6bb8.jpeg",
              "email_verified_at": null,
              "password": "$2y$10$JfqP/1MKxhlkGPv4RlCGg.EDGo7Vbf1wUTOOurNqayj63XHc5ap22",
              "remember_token": null,
              "created_at": "2023-12-22 14:09:10",
              "updated_at": "2023-12-22 14:09:10"
            },
            {
              "id": 32,
              "name": "David Torres",
              "email": "torres@gmail.com",
              "phone_number": "3223238961",
              "address": "calle 20a #35-47",
              "avatar": "458071c6-8e94-4ed7-bb00-e8dcc2b7d78a.jpeg",
              "email_verified_at": null,
              "password": "$2y$10$ANOhta/QUeZfSAdXX7vj5.eebhkyMXjvzpuoifVHUtaGNrFH2cs0e",
              "remember_token": null,
              "created_at": "2023-12-22 14:09:41",
              "updated_at": "2023-12-22 14:09:41"
            },
            {
              "id": 33,
              "name": "camilo",
              "email": "camilo@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$/VHlb5vw9991itXWEBDIGuZWlTIj4JyIVL8BJ0tdENsbGePloq1NG",
              "remember_token": null,
              "created_at": "2024-01-02 14:02:16",
              "updated_at": "2024-01-02 14:02:16"
            },
            {
              "id": 34,
              "name": "parrado",
              "email": "parrado@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$OPAvicLT/Que9pXYMImp9uelv8pDd5gJ.GWJnUaDGIYVgPjXkgN7m",
              "remember_token": null,
              "created_at": "2024-01-02 15:46:54",
              "updated_at": "2024-01-02 15:46:54"
            },
            {
              "id": 35,
              "name": "Camilo Andres Parrado Mora",
              "email": "akmilopamo@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$3M7Bm91MEYMB7/4aHWAWQuqxNIpL7MnTSGodkY.vN1b1l5K0enz/q",
              "remember_token": null,
              "created_at": "2024-01-02 20:18:28",
              "updated_at": "2024-01-02 20:18:28"
            },
            {
              "id": 36,
              "name": "CAMILO ANDRES PARRADO MORA",
              "email": "camilo.parrado@unillanos.edu.co",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$Jqm7jQwdyxW6zfKMrJ2Bb.HX7I8GeN56QjqCnOdLF2F/yF6dBzII.",
              "remember_token": null,
              "created_at": "2024-01-03 07:07:12",
              "updated_at": "2024-01-03 07:07:12"
            },
            {
              "id": 37,
              "name": "Camilo Parrado",
              "email": "parradocamilo375@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$QhajyWeuqlsRt6SPnvF5F.6FtlZacilQYi/vwlRJMxM7mMvUvyl.K",
              "remember_token": null,
              "created_at": "2024-01-03 07:19:43",
              "updated_at": "2024-01-03 07:19:43"
            },
            {
              "id": 38,
              "name": "LlanoSystems Software company",
              "email": "llanosystems@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$/6Qanwd3a/IsOVH85z9sYOmoGdDcVR2cE2T1oDQ3lZEawwEficAA2",
              "remember_token": null,
              "created_at": "2024-01-03 08:06:37",
              "updated_at": "2024-01-03 08:06:37"
            },
            {
              "id": 39,
              "name": "Mariela Mora Forero",
              "email": "mamorafo@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$WjLL5GsE9URrJcQ0/H9pBOmS/myboi0.jTT2FODZhGhHuu.sJ0fNC",
              "remember_token": null,
              "created_at": "2024-01-03 13:56:42",
              "updated_at": "2024-01-03 13:56:42"
            },
            {
              "id": 40,
              "name": "Camilo Parrado",
              "email": "camilo.parrado.mora@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$EJRX7YJgy/Z.twNa.pqKXOEbh4Lx00hkupuA6LijLVg7kk8FFYFQ6",
              "remember_token": null,
              "created_at": "2024-01-04 08:32:37",
              "updated_at": "2024-01-04 08:32:37"
            },
            {
              "id": 41,
              "name": "David Alexander Acosta Ojeda",
              "email": "acostaojedadavid@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$xSYAMoaHv2lyeORhkI/4b.8p5e5KSvVAPsvs6TufT4d3LDn/CEhJu",
              "remember_token": null,
              "created_at": "2024-01-05 08:38:28",
              "updated_at": "2024-01-05 08:38:28"
            },
            {
              "id": 42,
              "name": "Jorge Antonio Hernandez Sanchez",
              "email": "ingenierto2006@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$MPsIuSuw4tYpvUyjNpxGgesG94G42WSvbVN2QMjvfPGI5lK0AAOwG",
              "remember_token": null,
              "created_at": "2024-02-14 16:40:11",
              "updated_at": "2024-02-14 16:40:11"
            },
            {
              "id": 43,
              "name": "Secretario Movilidad",
              "email": "secretaria_movilidad@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": "b2573897-3a03-4b07-ba61-f12ce77f8648.jpeg",
              "email_verified_at": null,
              "password": "$2y$10$hpt.igqTG04KmGFXnpHLBeALowL4fW49O6sSftGnyAG.vt6dnC2DC",
              "remember_token": null,
              "created_at": "2024-02-20 22:42:19",
              "updated_at": "2024-02-23 16:19:19"
            },
            {
              "id": 44,
              "name": "Diana Rincon",
              "email": "dianarincon@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$pNf1Qx7B/YDwd9IbHtj2deGYf5swpV6ZgR5/XsxuYzn910mrU1DMS",
              "remember_token": null,
              "created_at": "2024-03-12 08:04:50",
              "updated_at": "2024-03-12 08:04:50"
            },
            {
              "id": 7,
              "name": "Camilo Andres Parrado Mora",
              "email": "ackmilopamo@gmail.com",
              "phone_number": "3229505796",
              "address": "calle 10B #39-19",
              "avatar": "87d91b5e-a0e2-4f79-9b96-b854c309abf2.jpeg",
              "email_verified_at": null,
              "password": "$2y$10$nSNk/aCfLHKyZWDecN2pEudjg7ndPIRPyANJl6A9NjCWXwMP40GRi",
              "remember_token": null,
              "created_at": "2023-10-02 15:16:30",
              "updated_at": "2024-03-31 18:17:17"
            },
            {
              "id": 47,
              "name": "pruebita google",
              "email": "testgoogle@gmail.com",
              "phone_number": null,
              "address": null,
              "avatar": null,
              "email_verified_at": null,
              "password": "$2y$10$1jZGNbfetr5aATkAIY7/y.l0fH2TKrMiMpR/qrX7J13me3nd3Giny",
              "remember_token": null,
              "created_at": "2024-04-05 15:36:29",
              "updated_at": "2024-04-05 15:36:29"
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('users')->insertOrIgnore([
                'id' => $Data['id'],
                'name' => $Data['name'],
                'email' => $Data['email'],
                'phone_number' => $Data['phone_number'],
                'address' => $Data['address'],
                'avatar' => $Data['avatar'],
                'email_verified_at' => $Data['email_verified_at'],
                'password' => $Data['password'],
                'remember_token' => $Data['remember_token'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

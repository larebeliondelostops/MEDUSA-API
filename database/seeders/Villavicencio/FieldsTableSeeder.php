<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldsTableSeeder extends Seeder
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
              "id": 1,
              "name": "Nombre",
              "placeholder": "Ingrese el nombre",
              "key": "name",
              "type": 1,
              "required": true,
              "schema": "text",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 2,
              "name": "Email",
              "placeholder": "Ingrese el email",
              "key": "email",
              "type": 3,
              "required": true,
              "schema": "email",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 3,
              "name": "Rol",
              "placeholder": "Ingrese el rol",
              "key": "role",
              "type": 4,
              "required": true,
              "schema": "text",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 4,
              "name": "Dirección",
              "placeholder": "Ingrese la dirección",
              "key": "address",
              "type": 1,
              "required": true,
              "schema": "text",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 5,
              "name": "Teléfono",
              "placeholder": "Ingrese el teléfono",
              "key": "phone",
              "type": 2,
              "required": true,
              "schema": "phone",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 6,
              "name": "Posición",
              "placeholder": null,
              "key": "position",
              "type": 6,
              "required": true,
              "schema": "position",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 7,
              "name": "Potencial de mujeres",
              "placeholder": "Ingrese la cantidad",
              "key": "potencialWomen",
              "type": 2,
              "required": true,
              "schema": "number",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 8,
              "name": "Potencial de hombres",
              "placeholder": "Ingrese la cantidad",
              "key": "potencialMen",
              "type": 2,
              "required": true,
              "schema": "number",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 9,
              "name": "Total votos",
              "placeholder": "Ingrese la cantidad de votos",
              "key": "totalVotes",
              "type": 2,
              "required": true,
              "schema": "number",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 10,
              "name": "Mesas",
              "placeholder": "Ingrese la cantidad de mesas",
              "key": "tables",
              "type": 2,
              "required": true,
              "schema": "number",
              "created_at": "2023-09-27 22:17:26",
              "updated_at": "2023-09-27 22:17:26"
            },
            {
              "id": 11,
              "name": "URL",
              "placeholder": null,
              "key": "url",
              "type": 1,
              "required": false,
              "schema": "url",
              "created_at": "2023-09-28 21:43:22",
              "updated_at": "2023-09-28 21:43:22"
            },
            {
              "id": 12,
              "name": "Tipo Evento",
              "placeholder": "Seleccione el tipo de evento",
              "key": "eventType",
              "type": 4,
              "required": true,
              "schema": "number",
              "created_at": "2023-09-28 22:25:52",
              "updated_at": "2023-09-28 22:25:52"
            },
            {
              "id": 13,
              "name": "Posición",
              "placeholder": null,
              "key": "position",
              "type": 7,
              "required": true,
              "schema": "position",
              "created_at": "2023-09-29 12:15:57",
              "updated_at": "2023-09-29 12:15:57"
            },
            {
              "id": 14,
              "name": "Fecha de inicio",
              "placeholder": "Ingrese la fecha de inicio",
              "key": "startDate",
              "type": 9,
              "required": true,
              "schema": "date",
              "created_at": "2023-09-29 15:35:04",
              "updated_at": "2023-09-29 15:35:04"
            },
            {
              "id": 15,
              "name": "Fecha en que finaliza",
              "placeholder": "Ingrese la fecha en que finaliza",
              "key": "endDate",
              "type": 9,
              "required": true,
              "schema": "date",
              "created_at": "2023-09-29 15:35:04",
              "updated_at": "2023-09-29 15:35:04"
            },
            {
              "id": 16,
              "name": "Capacidad",
              "placeholder": "Ingrese la capacidad del evento",
              "key": "capacity",
              "type": 2,
              "required": true,
              "schema": "number",
              "created_at": "2023-09-29 15:35:04",
              "updated_at": "2023-09-29 15:35:04"
            },
            {
              "id": 17,
              "name": "Entidad autorizante",
              "placeholder": "Ingrese la entidad autorizante",
              "key": "authorizingEntity",
              "type": 1,
              "required": true,
              "schema": "text",
              "created_at": "2023-09-29 15:35:04",
              "updated_at": "2023-09-29 15:35:04"
            },
            {
              "id": 18,
              "name": "Pacientes en emergencia",
              "placeholder": null,
              "key": "emergencyPatients",
              "type": 2,
              "required": false,
              "schema": "number",
              "created_at": "2023-10-06 12:50:14",
              "updated_at": "2023-10-06 12:50:14"
            },
            {
              "id": 19,
              "name": "Camas de emergencia disponibles",
              "placeholder": null,
              "key": "emergencyBedsAvailable",
              "type": 2,
              "required": false,
              "schema": "number",
              "created_at": "2023-10-06 12:50:14",
              "updated_at": "2023-10-06 12:50:14"
            },
            {
              "id": 20,
              "name": "Quirófanos disponibles",
              "placeholder": null,
              "key": "availableOperatingRooms",
              "type": 2,
              "required": false,
              "schema": "number",
              "created_at": "2023-10-06 12:50:14",
              "updated_at": "2023-10-06 12:50:14"
            },
            {
              "id": 21,
              "name": "UCI disponibles",
              "placeholder": null,
              "key": "intensiveCareUnitAvailable",
              "type": 2,
              "required": false,
              "schema": "number",
              "created_at": "2023-10-06 12:50:14",
              "updated_at": "2023-10-06 12:50:14"
            },
            {
              "id": 22,
              "name": "Camas de primer nivel",
              "placeholder": null,
              "key": "firstLevelBeds",
              "type": 2,
              "required": false,
              "schema": "number",
              "created_at": "2023-10-06 12:50:14",
              "updated_at": "2023-10-06 12:50:14"
            },
            {
              "id": 23,
              "name": "Camas de segundo nivel",
              "placeholder": null,
              "key": "secondLevelBeds",
              "type": 2,
              "required": false,
              "schema": "number",
              "created_at": "2023-10-06 12:50:14",
              "updated_at": "2023-10-06 12:50:14"
            },
            {
              "id": 24,
              "name": "Camas de tercer nivel",
              "placeholder": null,
              "key": "thirdLevelBeds",
              "type": 2,
              "required": false,
              "schema": "number",
              "created_at": "2023-10-06 12:50:14",
              "updated_at": "2023-10-06 12:50:14"
            },
            {
              "id": 25,
              "name": "Banco de sangre",
              "placeholder": null,
              "key": "bloodBank",
              "type": 5,
              "required": false,
              "schema": "boolean",
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 26,
              "name": "Médicos en turno",
              "placeholder": null,
              "key": "doctorsInTheShift",
              "type": 2,
              "required": false,
              "schema": "number",
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 27,
              "name": "Enfermeras en turno",
              "placeholder": null,
              "key": "nursesInTheShift",
              "type": 2,
              "required": false,
              "schema": "number",
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 28,
              "name": "IPS Afiliada",
              "placeholder": null,
              "key": "affiliatedIps",
              "type": 1,
              "required": true,
              "schema": "text",
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 29,
              "name": "Número de emergencias al día",
              "placeholder": null,
              "key": "numberOfEmergenciesDay",
              "type": 2,
              "required": false,
              "schema": "number",
              "created_at": "2023-10-06 12:54:00",
              "updated_at": "2023-10-06 12:54:00"
            },
            {
              "id": 30,
              "name": "Coordenadas Iniciales",
              "placeholder": "Ingrese el par de coordenadas",
              "key": "position",
              "type": 1,
              "required": true,
              "schema": "text",
              "created_at": "2024-03-06 17:13:39",
              "updated_at": "2024-03-06 17:13:39"
            },
            {
              "id": 31,
              "name": "Zoom Principal",
              "placeholder": "Ingrese la cantidad de zoom",
              "key": "main_zoom",
              "type": 2,
              "required": true,
              "schema": "number",
              "created_at": "2024-03-06 17:13:39",
              "updated_at": "2024-03-06 17:13:39"
            },
            {
              "id": 32,
              "name": "Densidad Mapa de Calor",
              "placeholder": "Ingrese la densidad",
              "key": "heatmap_density",
              "type": 2,
              "required": false,
              "schema": "number",
              "created_at": "2024-03-06 17:23:46",
              "updated_at": "2024-03-06 17:23:46"
            },
            {
              "id": 33,
              "name": "Mapeos Externos",
              "placeholder": "Ingrese los nombres separados por coma",
              "key": "map_request",
              "type": 1,
              "required": false,
              "schema": "text",
              "created_at": "2024-03-06 17:23:46",
              "updated_at": "2024-03-06 17:23:46"
            },
            {
              "id": 35,
              "name": "Coordenadas Iniciales",
              "placeholder": "Ingrese el par de coordenadas",
              "key": "position",
              "type": 6,
              "required": true,
              "schema": "position",
              "created_at": "2024-03-06 17:37:32",
              "updated_at": "2024-03-06 17:37:32"
            }
          ]
        }

        ';

        $dataArray = json_decode($data, true);

        foreach ($dataArray['array'] as $Data) {
            DB::table('fields')->insert([
                'id' => $Data['id'],
                'name' => $Data['name'],
                'placeholder' => $Data['placeholder'],
                'key' => $Data['key'],
                'type' => $Data['type'],
                'required' => $Data['required'],
                'schema' => $Data['schema'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
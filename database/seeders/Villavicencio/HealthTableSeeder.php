<?php

namespace Database\Seeders\Villavicencio;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HealthTableSeeder extends Seeder
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
              "type": "Feature",
              "markerType": 27,
              "id": "7291e1f9-b69e-443b-bdba-62e0c9c32576",
              "title": "INST. EDUCATIVO 12 DE OCTUBR",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.15138,
                      -73.6377
                  ]
              },
              "properties": {
                  "address": "CALLE 12 # 19-20",
                  "idEntities": "1",
                  "emergencyPatients": "12",
                  "emergencyBedsAvailable": 5,
                  "availableOperatingRooms": 6,
                  "intensiveCareUnitAvailable": 2,
                  "firstLevelBeds": 5,
                  "secondLevelBeds": 6,
                  "thirdLevelBeds": 10,
                  "bloodBank": "true",
                  "doctorsInTheShift": 9,
                  "nursesInTheShift": 2,
                  "affiliatedIps": "Sanitas",
                  "numberOfEmergenciesDay": 15
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "05387422-e95a-465c-8a29-afc57b12d35f",
              "title": "COLEGIO GENERAL SANTANDER",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.15558,
                      -73.6406
                  ]
              },
              "properties": {
                  "address": "CALLE 15 # 20-20",
                  "idEntities": "2",
                  "emergencyPatients": "4",
                  "emergencyBedsAvailable": 7,
                  "availableOperatingRooms": 9,
                  "intensiveCareUnitAvailable": 6,
                  "firstLevelBeds": 4,
                  "secondLevelBeds": 6,
                  "thirdLevelBeds": 5,
                  "bloodBank": "true",
                  "doctorsInTheShift": 12,
                  "nursesInTheShift": 32,
                  "affiliatedIps": "Medical",
                  "numberOfEmergenciesDay": 59
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "375c8dc9-2d37-4afe-8850-ce50c55b05db",
              "title": "ESCUELA POLICARPA SALAVARRIET",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.15756,
                      -73.6386
                  ]
              },
              "properties": {
                  "address": "CALLE 16 # 20-20",
                  "idEntities": "3",
                  "emergencyPatients": "17",
                  "emergencyBedsAvailable": 8,
                  "availableOperatingRooms": 4,
                  "intensiveCareUnitAvailable": 1,
                  "firstLevelBeds": 8,
                  "secondLevelBeds": 12,
                  "thirdLevelBeds": 3,
                  "bloodBank": "false",
                  "doctorsInTheShift": 7,
                  "nursesInTheShift": 20,
                  "affiliatedIps": "HealthCare",
                  "numberOfEmergenciesDay": 25
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "295f9c37-5b39-4873-8c8c-37093f046290",
              "title": "COLEGIO ANTONIO NARI\u00d1O",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.13881,
                      -73.6516
                  ]
              },
              "properties": {
                  "address": "CALLE 17 # 20-20",
                  "idEntities": "4",
                  "emergencyPatients": "8",
                  "emergencyBedsAvailable": 3,
                  "availableOperatingRooms": 11,
                  "intensiveCareUnitAvailable": 4,
                  "firstLevelBeds": 3,
                  "secondLevelBeds": 2,
                  "thirdLevelBeds": 8,
                  "bloodBank": "true",
                  "doctorsInTheShift": 5,
                  "nursesInTheShift": 10,
                  "affiliatedIps": "MediCare",
                  "numberOfEmergenciesDay": 10
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "caf82f34-d25d-4129-bab3-7e980ca61671",
              "title": "COL NTRA SRA DE LA SABIDURIA",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.15306,
                      -73.6381
                  ]
              },
              "properties": {
                  "address": "CALLE 18 # 20-20",
                  "idEntities": "5",
                  "emergencyPatients": "20",
                  "emergencyBedsAvailable": 10,
                  "availableOperatingRooms": 3,
                  "intensiveCareUnitAvailable": 3,
                  "firstLevelBeds": 15,
                  "secondLevelBeds": 10,
                  "thirdLevelBeds": 5,
                  "bloodBank": "true",
                  "doctorsInTheShift": 8,
                  "nursesInTheShift": 12,
                  "affiliatedIps": "HealthPro",
                  "numberOfEmergenciesDay": 30
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "2cede884-c5f1-4c51-a749-88465a5ec84f",
              "title": "Sede Administrativa",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.14475,
                      -73.6379
                  ]
              },
              "properties": {
                  "address": "CALLE 19 # 20-20",
                  "idEntities": "6",
                  "emergencyPatients": "5",
                  "emergencyBedsAvailable": 2,
                  "availableOperatingRooms": 8,
                  "intensiveCareUnitAvailable": 5,
                  "firstLevelBeds": 6,
                  "secondLevelBeds": 7,
                  "thirdLevelBeds": 4,
                  "bloodBank": "true",
                  "doctorsInTheShift": 10,
                  "nursesInTheShift": 15,
                  "affiliatedIps": "MediHealth",
                  "numberOfEmergenciesDay": 12
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "b21334f0-8074-485e-b349-ea5ff6ad4108",
              "title": "Centro de Salud La Esperanza",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.13032,
                      -73.6375
                  ]
              },
              "properties": {
                  "address": "CALLE 20 # 20-20",
                  "idEntities": "7",
                  "emergencyPatients": "13",
                  "emergencyBedsAvailable": 6,
                  "availableOperatingRooms": 10,
                  "intensiveCareUnitAvailable": 7,
                  "firstLevelBeds": 8,
                  "secondLevelBeds": 8,
                  "thirdLevelBeds": 9,
                  "bloodBank": "false",
                  "doctorsInTheShift": 14,
                  "nursesInTheShift": 28,
                  "affiliatedIps": "LifeCare",
                  "numberOfEmergenciesDay": 20
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "8b1816c4-aa75-4b79-aa7c-8e2cbca07407",
              "title": "Centro de Salud Porfia",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.08172,
                      -73.6693
                  ]
              },
              "properties": {
                  "address": "CALLE 21 # 20-20",
                  "idEntities": "8",
                  "emergencyPatients": "9",
                  "emergencyBedsAvailable": 4,
                  "availableOperatingRooms": 5,
                  "intensiveCareUnitAvailable": 2,
                  "firstLevelBeds": 5,
                  "secondLevelBeds": 4,
                  "thirdLevelBeds": 6,
                  "bloodBank": "true",
                  "doctorsInTheShift": 6,
                  "nursesInTheShift": 10,
                  "affiliatedIps": "MedConnect",
                  "numberOfEmergenciesDay": 9
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "bbf669c2-67e7-4331-abad-4b807520f720",
              "title": "Centro de Salud Comuneros",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.12397,
                      -73.6269
                  ]
              },
              "properties": {
                  "address": "CALLE 22 # 20-20",
                  "idEntities": "9",
                  "emergencyPatients": "6",
                  "emergencyBedsAvailable": 3,
                  "availableOperatingRooms": 7,
                  "intensiveCareUnitAvailable": 1,
                  "firstLevelBeds": 4,
                  "secondLevelBeds": 5,
                  "thirdLevelBeds": 3,
                  "bloodBank": "false",
                  "doctorsInTheShift": 8,
                  "nursesInTheShift": 14,
                  "affiliatedIps": "MediPro",
                  "numberOfEmergenciesDay": 8
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "f1c2923a-e4d5-4362-89c3-2298b1490f88",
              "title": "Centro de Salud Recreo",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.14544,
                      -73.6106
                  ]
              },
              "properties": {
                  "address": "CALLE 23 # 20-20",
                  "idEntities": "10",
                  "emergencyPatients": "10",
                  "emergencyBedsAvailable": 4,
                  "availableOperatingRooms": 6,
                  "intensiveCareUnitAvailable": 3,
                  "firstLevelBeds": 7,
                  "secondLevelBeds": 8,
                  "thirdLevelBeds": 5,
                  "bloodBank": "true",
                  "doctorsInTheShift": 9,
                  "nursesInTheShift": 18,
                  "affiliatedIps": "HealthPlus",
                  "numberOfEmergenciesDay": 18
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "68ac67ca-81d5-4052-9db8-e0c437c19189",
              "title": "Hospital departamental",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.14372,
                      -73.6446
                  ]
              },
              "properties": {
                  "address": "CALLE 24 # 20-20",
                  "idEntities": "11",
                  "emergencyPatients": "19",
                  "emergencyBedsAvailable": 9,
                  "availableOperatingRooms": 5,
                  "intensiveCareUnitAvailable": 2,
                  "firstLevelBeds": 6,
                  "secondLevelBeds": 10,
                  "thirdLevelBeds": 8,
                  "bloodBank": "true",
                  "doctorsInTheShift": 11,
                  "nursesInTheShift": 22,
                  "affiliatedIps": "MediAssist",
                  "numberOfEmergenciesDay": 27
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "84c1e030-9ff8-4be2-bc8d-5c8009c58103",
              "title": "Cl\u00ednica Martha",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.14695,
                      -73.639
                  ]
              },
              "properties": {
                  "address": "CALLE 25 # 20-20",
                  "idEntities": "12",
                  "emergencyPatients": "7",
                  "emergencyBedsAvailable": 2,
                  "availableOperatingRooms": 4,
                  "intensiveCareUnitAvailable": 1,
                  "firstLevelBeds": 3,
                  "secondLevelBeds": 5,
                  "thirdLevelBeds": 2,
                  "bloodBank": "false",
                  "doctorsInTheShift": 5,
                  "nursesInTheShift": 10,
                  "affiliatedIps": "MedLife",
                  "numberOfEmergenciesDay": 11
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "913fb24d-a148-4bdb-a372-4deb1999ce8f",
              "title": "Cl\u00ednica Meta",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.1446,
                      -73.6369
                  ]
              },
              "properties": {
                  "address": "CALLE 26 # 20-20",
                  "idEntities": "13",
                  "emergencyPatients": "15",
                  "emergencyBedsAvailable": 6,
                  "availableOperatingRooms": 9,
                  "intensiveCareUnitAvailable": 4,
                  "firstLevelBeds": 8,
                  "secondLevelBeds": 12,
                  "thirdLevelBeds": 6,
                  "bloodBank": "true",
                  "doctorsInTheShift": 13,
                  "nursesInTheShift": 25,
                  "affiliatedIps": "HealthCare",
                  "numberOfEmergenciesDay": 22
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "6e2155dd-c97a-4b1d-8498-2f485b7be22b",
              "title": "Cl\u00ednica Universidad Cooperativa",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.14819,
                      -73.6393
                  ]
              },
              "properties": {
                  "address": "CALLE 27 # 20-20",
                  "idEntities": "14",
                  "emergencyPatients": "3",
                  "emergencyBedsAvailable": 1,
                  "availableOperatingRooms": 7,
                  "intensiveCareUnitAvailable": 3,
                  "firstLevelBeds": 5,
                  "secondLevelBeds": 6,
                  "thirdLevelBeds": 4,
                  "bloodBank": "true",
                  "doctorsInTheShift": 7,
                  "nursesInTheShift": 15,
                  "affiliatedIps": "MedConnect",
                  "numberOfEmergenciesDay": 7
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "5317173b-2947-4261-b760-365228f785d1",
              "title": "Centro de Salud Alto Pompeya",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.060567,
                      -73.428942
                  ]
              },
              "properties": {
                  "address": "CALLE 28 # 20-20",
                  "idEntities": "15",
                  "emergencyPatients": "11",
                  "emergencyBedsAvailable": 4,
                  "availableOperatingRooms": 8,
                  "intensiveCareUnitAvailable": 3,
                  "firstLevelBeds": 6,
                  "secondLevelBeds": 7,
                  "thirdLevelBeds": 5,
                  "bloodBank": "false",
                  "doctorsInTheShift": 9,
                  "nursesInTheShift": 17,
                  "affiliatedIps": "MediPro",
                  "numberOfEmergenciesDay": 14
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "de6ff435-07f4-4f63-ba67-4a108316776a",
              "title": "Centro de Salud La Esperanza",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.130914,
                      -73.63769
                  ]
              },
              "properties": {
                  "address": "CALLE 29 # 20-20",
                  "idEntities": "16",
                  "emergencyPatients": "9",
                  "emergencyBedsAvailable": 3,
                  "availableOperatingRooms": 10,
                  "intensiveCareUnitAvailable": 2,
                  "firstLevelBeds": 4,
                  "secondLevelBeds": 5,
                  "thirdLevelBeds": 3,
                  "bloodBank": "true",
                  "doctorsInTheShift": 8,
                  "nursesInTheShift": 15,
                  "affiliatedIps": "LifeCare",
                  "numberOfEmergenciesDay": 12
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "c7b8e39d-6882-4cae-925d-d6a971bb0ff9",
              "title": "Centro de Salud Morichal",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.137375,
                      -73.584502
                  ]
              },
              "properties": {
                  "address": "CALLE 30 # 20-20",
                  "idEntities": "17",
                  "emergencyPatients": "6",
                  "emergencyBedsAvailable": 2,
                  "availableOperatingRooms": 5,
                  "intensiveCareUnitAvailable": 1,
                  "firstLevelBeds": 3,
                  "secondLevelBeds": 3,
                  "thirdLevelBeds": 2,
                  "bloodBank": "true",
                  "doctorsInTheShift": 4,
                  "nursesInTheShift": 9,
                  "affiliatedIps": "HealthPlus",
                  "numberOfEmergenciesDay": 6
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "a2c14107-0250-41ee-9a97-5f23711929fa",
              "title": "Centro de Salud Porfia",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.081542,
                      -73.670571
                  ]
              },
              "properties": {
                  "address": "CALLE 31 # 20-20",
                  "idEntities": "18",
                  "emergencyPatients": "14",
                  "emergencyBedsAvailable": 7,
                  "availableOperatingRooms": 4,
                  "intensiveCareUnitAvailable": 3,
                  "firstLevelBeds": 5,
                  "secondLevelBeds": 8,
                  "thirdLevelBeds": 5,
                  "bloodBank": "false",
                  "doctorsInTheShift": 10,
                  "nursesInTheShift": 20,
                  "affiliatedIps": "MediLife",
                  "numberOfEmergenciesDay": 20
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "08c9a04b-779f-4718-8ebb-3082c94b36db",
              "title": "Centro de Salud Recreo",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.143518,
                      -73.611165
                  ]
              },
              "properties": {
                  "address": "CALLE 32 # 20-20",
                  "idEntities": "19",
                  "emergencyPatients": "8",
                  "emergencyBedsAvailable": 4,
                  "availableOperatingRooms": 6,
                  "intensiveCareUnitAvailable": 2,
                  "firstLevelBeds": 6,
                  "secondLevelBeds": 6,
                  "thirdLevelBeds": 4,
                  "bloodBank": "true",
                  "doctorsInTheShift": 7,
                  "nursesInTheShift": 12,
                  "affiliatedIps": "MediAssist",
                  "numberOfEmergenciesDay": 10
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "7a2c1f73-7968-44f7-a011-67d630ecf3ce",
              "title": "Centro de Salud 12 de Octubre",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.159317,
                      -73.651609
                  ]
              },
              "properties": {
                  "address": "CALLE 33 # 20-20",
                  "idEntities": "20",
                  "emergencyPatients": "12",
                  "emergencyBedsAvailable": 5,
                  "availableOperatingRooms": 9,
                  "intensiveCareUnitAvailable": 5,
                  "firstLevelBeds": 6,
                  "secondLevelBeds": 8,
                  "thirdLevelBeds": 6,
                  "bloodBank": "true",
                  "doctorsInTheShift": 11,
                  "nursesInTheShift": 20,
                  "affiliatedIps": "HealthPro",
                  "numberOfEmergenciesDay": 18
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "d02c1e24-2b83-479f-bed6-d0b766b3b361",
              "title": "Centro de Salud Comuneros",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.123946,
                      -73.626665
                  ]
              },
              "properties": {
                  "address": "CALLE 34 # 20-20",
                  "idEntities": "21",
                  "emergencyPatients": "18",
                  "emergencyBedsAvailable": 8,
                  "availableOperatingRooms": 7,
                  "intensiveCareUnitAvailable": 4,
                  "firstLevelBeds": 7,
                  "secondLevelBeds": 10,
                  "thirdLevelBeds": 6,
                  "bloodBank": "true",
                  "doctorsInTheShift": 12,
                  "nursesInTheShift": 25,
                  "affiliatedIps": "MedConnect",
                  "numberOfEmergenciesDay": 25
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "85cd12de-183c-4514-8473-8b796e849e5a",
              "title": "Centro de Salud Kirpas",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.118907,
                      -73.585906
                  ]
              },
              "properties": {
                  "address": "CALLE 35 # 20-20",
                  "idEntities": "22",
                  "emergencyPatients": "5",
                  "emergencyBedsAvailable": 3,
                  "availableOperatingRooms": 6,
                  "intensiveCareUnitAvailable": 3,
                  "firstLevelBeds": 5,
                  "secondLevelBeds": 6,
                  "thirdLevelBeds": 3,
                  "bloodBank": "true",
                  "doctorsInTheShift": 8,
                  "nursesInTheShift": 15,
                  "affiliatedIps": "HealthCare",
                  "numberOfEmergenciesDay": 13
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "269aaaff-2894-48a4-9d6c-926016359f7e",
              "title": "Centro de Salud La Nohora",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.07967,
                      -73.696636
                  ]
              },
              "properties": {
                  "address": "CALLE 36 # 20-20",
                  "idEntities": "23",
                  "emergencyPatients": "3",
                  "emergencyBedsAvailable": 1,
                  "availableOperatingRooms": 4,
                  "intensiveCareUnitAvailable": 2,
                  "firstLevelBeds": 3,
                  "secondLevelBeds": 4,
                  "thirdLevelBeds": 2,
                  "bloodBank": "false",
                  "doctorsInTheShift": 5,
                  "nursesInTheShift": 9,
                  "affiliatedIps": "MediPro",
                  "numberOfEmergenciesDay": 6
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "c405d95d-9fa8-43b7-9a94-8ac037f472ad",
              "title": "Centro de Salud Popular",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.140197,
                      -73.614652
                  ]
              },
              "properties": {
                  "address": "CALLE 37 # 20-20",
                  "idEntities": "24",
                  "emergencyPatients": "15",
                  "emergencyBedsAvailable": 6,
                  "availableOperatingRooms": 8,
                  "intensiveCareUnitAvailable": 3,
                  "firstLevelBeds": 7,
                  "secondLevelBeds": 7,
                  "thirdLevelBeds": 4,
                  "bloodBank": "true",
                  "doctorsInTheShift": 10,
                  "nursesInTheShift": 18,
                  "affiliatedIps": "LifeCare",
                  "numberOfEmergenciesDay": 21
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "3ff7963d-9cb4-4f42-957e-77152e4cd173",
              "title": "Centro de Salud Barzal",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.146666,
                      -73.638309
                  ]
              },
              "properties": {
                  "address": "CALLE 38 # 20-20",
                  "idEntities": "25",
                  "emergencyPatients": "7",
                  "emergencyBedsAvailable": 2,
                  "availableOperatingRooms": 6,
                  "intensiveCareUnitAvailable": 1,
                  "firstLevelBeds": 4,
                  "secondLevelBeds": 4,
                  "thirdLevelBeds": 3,
                  "bloodBank": "true",
                  "doctorsInTheShift": 6,
                  "nursesInTheShift": 11,
                  "affiliatedIps": "HealthPlus",
                  "numberOfEmergenciesDay": 9
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "0744332a-e151-42a5-b52a-bbf955772dd1",
              "title": "Puesto de Salud Buenavista",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.168947,
                      -73.680838
                  ]
              },
              "properties": {
                  "address": "CALLE 39 # 20-20",
                  "idEntities": "26",
                  "emergencyPatients": "10",
                  "emergencyBedsAvailable": 5,
                  "availableOperatingRooms": 9,
                  "intensiveCareUnitAvailable": 2,
                  "firstLevelBeds": 6,
                  "secondLevelBeds": 8,
                  "thirdLevelBeds": 4,
                  "bloodBank": "false",
                  "doctorsInTheShift": 9,
                  "nursesInTheShift": 17,
                  "affiliatedIps": "MediAssist",
                  "numberOfEmergenciesDay": 14
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "991f8a31-4a2d-4467-b0fa-96af48adfd28",
              "title": "Sede Administrativa",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.142582,
                      -73.641758
                  ]
              },
              "properties": {
                  "address": "CALLE 40 # 20-20",
                  "idEntities": "27",
                  "emergencyPatients": "9",
                  "emergencyBedsAvailable": 4,
                  "availableOperatingRooms": 7,
                  "intensiveCareUnitAvailable": 3,
                  "firstLevelBeds": 5,
                  "secondLevelBeds": 6,
                  "thirdLevelBeds": 4,
                  "bloodBank": "true",
                  "doctorsInTheShift": 8,
                  "nursesInTheShift": 16,
                  "affiliatedIps": "MediLife",
                  "numberOfEmergenciesDay": 12
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "14413576-0511-48d9-9e15-c1552017b51e",
              "title": "Puesto de Salud Rincon Pompeya",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.038493,
                      -73.366101
                  ]
              },
              "properties": {
                  "address": "CALLE 12 # 19-20",
                  "idEntities": "28",
                  "emergencyPatients": "6",
                  "emergencyBedsAvailable": 3,
                  "availableOperatingRooms": 5,
                  "intensiveCareUnitAvailable": 2,
                  "firstLevelBeds": 4,
                  "secondLevelBeds": 4,
                  "thirdLevelBeds": 3,
                  "bloodBank": "true",
                  "doctorsInTheShift": 6,
                  "nursesInTheShift": 11,
                  "affiliatedIps": "HealthPro",
                  "numberOfEmergenciesDay": 9
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "ccaad71b-05c1-4362-81f5-e73f88b62c24",
              "title": "Hospital Departamental",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.144622,
                      -73.643612
                  ]
              },
              "properties": {
                  "address": "CALLE 13 # 19-20",
                  "idEntities": "29",
                  "emergencyPatients": "11",
                  "emergencyBedsAvailable": 5,
                  "availableOperatingRooms": 9,
                  "intensiveCareUnitAvailable": 3,
                  "firstLevelBeds": 7,
                  "secondLevelBeds": 7,
                  "thirdLevelBeds": 5,
                  "bloodBank": "true",
                  "doctorsInTheShift": 10,
                  "nursesInTheShift": 19,
                  "affiliatedIps": "MedConnect",
                  "numberOfEmergenciesDay": 17
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "5a7e60a0-490e-43b6-ad71-366fc83442e8",
              "title": "Clinica Martha",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.147147,
                      -73.638913
                  ]
              },
              "properties": {
                  "address": "CALLE 14 # 19-20",
                  "idEntities": "30",
                  "emergencyPatients": "18",
                  "emergencyBedsAvailable": 8,
                  "availableOperatingRooms": 7,
                  "intensiveCareUnitAvailable": 4,
                  "firstLevelBeds": 8,
                  "secondLevelBeds": 10,
                  "thirdLevelBeds": 6,
                  "bloodBank": "false",
                  "doctorsInTheShift": 12,
                  "nursesInTheShift": 24,
                  "affiliatedIps": "MediAssist",
                  "numberOfEmergenciesDay": 23
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "9e21d320-5e59-4f63-bdb3-7d9fed196fd4",
              "title": "Clinica Cooperativa",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.148295,
                      -73.639143
                  ]
              },
              "properties": {
                  "address": "CALLE 15 # 19-20",
                  "idEntities": "31",
                  "emergencyPatients": "5",
                  "emergencyBedsAvailable": 3,
                  "availableOperatingRooms": 6,
                  "intensiveCareUnitAvailable": 3,
                  "firstLevelBeds": 5,
                  "secondLevelBeds": 7,
                  "thirdLevelBeds": 3,
                  "bloodBank": "true",
                  "doctorsInTheShift": 8,
                  "nursesInTheShift": 16,
                  "affiliatedIps": "HealthPro",
                  "numberOfEmergenciesDay": 11
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "2c5526c3-9192-4fc8-9887-3ebb665cf65b",
              "title": "Clinica Meta",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.143877,
                      -73.637407
                  ]
              },
              "properties": {
                  "address": "CALLE 16 # 19-20",
                  "idEntities": "32",
                  "emergencyPatients": "12",
                  "emergencyBedsAvailable": 6,
                  "availableOperatingRooms": 8,
                  "intensiveCareUnitAvailable": 2,
                  "firstLevelBeds": 6,
                  "secondLevelBeds": 8,
                  "thirdLevelBeds": 5,
                  "bloodBank": "false",
                  "doctorsInTheShift": 9,
                  "nursesInTheShift": 18,
                  "affiliatedIps": "MedConnect",
                  "numberOfEmergenciesDay": 16
              }
          },
          {
              "type": "Feature",
              "markerType": 27,
              "id": "2dd89d39-b044-405d-9b99-2f2f9ccb1fb7",
              "title": "Clinica Servimedicos",
              "geometry": {
                  "type": "Point",
                  "coordinates": [
                      4.142172,
                      -73.64085
                  ]
              },
              "properties": {
                  "address": "CALLE 17 # 19-20",
                  "idEntities": "33",
                  "emergencyPatients": "14",
                  "emergencyBedsAvailable": 7,
                  "availableOperatingRooms": 9,
                  "intensiveCareUnitAvailable": 4,
                  "firstLevelBeds": 7,
                  "secondLevelBeds": 9,
                  "thirdLevelBeds": 6,
                  "bloodBank": "true",
                  "doctorsInTheShift": 11,
                  "nursesInTheShift": 21,
                  "affiliatedIps": "HealthCare",
                  "numberOfEmergenciesDay": 20
              }
          }
      ]
    }';

    $dataArray = json_decode($data, true);
    foreach ($dataArray['array'] as $Data) {

      DB::table('health')->insert([
        'name' => $Data['title'],
        'uuid' => Str::uuid(),
        'address' => $Data['properties']['address'],
        'position' => json_encode($Data['geometry']),
        'emergencyPatients' => $Data['properties']['emergencyPatients'],
        'emergencyBedsAvailable' => $Data['properties']['emergencyBedsAvailable'],
        'availableOperatingRooms' => $Data['properties']['availableOperatingRooms'],
        'intensiveCareUnitAvailable' => $Data['properties']['intensiveCareUnitAvailable'],
        'firstLevelBeds' => $Data['properties']['firstLevelBeds'],
        'secondLevelBeds' => $Data['properties']['secondLevelBeds'],
        'thirdLevelBeds' => $Data['properties']['thirdLevelBeds'],
        'bloodBank' => $Data['properties']['bloodBank'],
        'doctorsInTheShift' => $Data['properties']['doctorsInTheShift'],
        'nursesInTheShift' => $Data['properties']['nursesInTheShift'],
        'affiliatedIps' => $Data['properties']['affiliatedIps'],
        'numberOfEmergenciesDay' => $Data['properties']['numberOfEmergenciesDay'],
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
  }
}

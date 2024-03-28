<?php

namespace Database\Seeders\Villavicencio;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IpatsTableSeeder extends Seeder
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
                "id": 1,
                "id_agente": 86052901,
                "id_ipat": "A001351276",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.13769, -73.64343",
                "fecha_ipat": "2022-01-01T00:00:00"
            },
            {
                "id": 2,
                "id_agente": 17343055,
                "id_ipat": "A001351263",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.123560141050645, -73.64343",
                "fecha_ipat": "2022-01-01T00:00:00"
            },
            {
                "id": 3,
                "id_agente": 17312640,
                "id_ipat": "A001351187",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.0836, -73.3612",
                "fecha_ipat": "2022-01-01T00:00:00"
            },
            {
                "id": 4,
                "id_agente": 17343524,
                "id_ipat": "A001351219",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.14752, -73.64051",
                "fecha_ipat": "2022-01-04T00:00:00"
            },
            {
                "id": 5,
                "id_agente": 173329365,
                "id_ipat": "A001351258",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14606, -73.6082",
                "fecha_ipat": "2022-01-06T00:00:00"
            },
            {
                "id": 6,
                "id_agente": 17336469,
                "id_ipat": "A001350979",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.14697, -73.61633",
                "fecha_ipat": "2022-01-08T00:00:00"
            },
            {
                "id": 7,
                "id_agente": 30983075,
                "id_ipat": "A001351240",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.13378, -73.62629",
                "fecha_ipat": "2022-01-08T00:00:00"
            },
            {
                "id": 8,
                "id_agente": 41785437,
                "id_ipat": "A001351287",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.16172, -73.6631",
                "fecha_ipat": "2022-01-09T00:00:00"
            },
            {
                "id": 9,
                "id_agente": 17343524,
                "id_ipat": "A001351303",
                "lesionados": 3,
                "victimas": 0,
                "georeferencia": "4.14774, -73.62057",
                "fecha_ipat": "2022-01-10T00:00:00"
            },
            {
                "id": 10,
                "id_agente": 17312640,
                "id_ipat": "A001351271",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.15709, -73.65169",
                "fecha_ipat": "2022-01-10T00:00:00"
            },
            {
                "id": 11,
                "id_agente": 79332889,
                "id_ipat": "A001351305",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.14209, -73.6209",
                "fecha_ipat": "2022-01-10T00:00:00"
            },
            {
                "id": 12,
                "id_agente": 79332889,
                "id_ipat": "A001351306",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.11226, -73.64064",
                "fecha_ipat": "2022-01-11T00:00:00"
            },
            {
                "id": 13,
                "id_agente": 15905797,
                "id_ipat": "A001351312",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.11834, -73.58474",
                "fecha_ipat": "2022-01-12T00:00:00"
            },
            {
                "id": 14,
                "id_agente": 30983075,
                "id_ipat": "A001351249",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14657, -73.60571",
                "fecha_ipat": "2022-01-12T00:00:00"
            },
            {
                "id": 15,
                "id_agente": 15905797,
                "id_ipat": "A001351313",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.15586, -73.63124",
                "fecha_ipat": "2022-01-14T00:00:00"
            },
            {
                "id": 16,
                "id_agente": 79332889,
                "id_ipat": "A001268395",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.117328, -73.624005",
                "fecha_ipat": "2022-01-14T00:00:00"
            },
            {
                "id": 17,
                "id_agente": 17312640,
                "id_ipat": "A001351308",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.14192, -73.62079",
                "fecha_ipat": "2022-01-15T00:00:00"
            },
            {
                "id": 18,
                "id_agente": 86075440,
                "id_ipat": "A001351236",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.10006, -73.64762",
                "fecha_ipat": "2022-01-15T00:00:00"
            },
            {
                "id": 19,
                "id_agente": 41785437,
                "id_ipat": "A001351277",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.0774, -73.66928",
                "fecha_ipat": "2022-01-15T00:00:00"
            },
            {
                "id": 20,
                "id_agente": 86072085,
                "id_ipat": "A001351237",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.15538, -73.62938",
                "fecha_ipat": "2022-01-16T00:00:00"
            },
            {
                "id": 21,
                "id_agente": 17420796,
                "id_ipat": "A001351264",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.08005, -73.66924",
                "fecha_ipat": "2022-01-17T00:00:00"
            },
            {
                "id": 22,
                "id_agente": 86044533,
                "id_ipat": "A001351266",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.062964, -73.640967",
                "fecha_ipat": "2022-01-17T00:00:00"
            },
            {
                "id": 23,
                "id_agente": 17420796,
                "id_ipat": "A001351353",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.14064, -73.61488",
                "fecha_ipat": "2022-01-20T00:00:00"
            },
            {
                "id": 24,
                "id_agente": 15905797,
                "id_ipat": "A001351337",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.10687, -73.65599",
                "fecha_ipat": "2022-01-20T00:00:00"
            },
            {
                "id": 25,
                "id_agente": 17348507,
                "id_ipat": "A001351355",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.10066, -73.64588",
                "fecha_ipat": "2022-01-20T00:00:00"
            },
            {
                "id": 26,
                "id_agente": 86072085,
                "id_ipat": "A001351343",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.13498, -73.61578",
                "fecha_ipat": "2022-01-21T00:00:00"
            },
            {
                "id": 27,
                "id_agente": 3277008,
                "id_ipat": "A001351351",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14047, -73.63124",
                "fecha_ipat": "2022-01-22T00:00:00"
            },
            {
                "id": 28,
                "id_agente": 15905797,
                "id_ipat": "A001442177",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.103849, -73.655896",
                "fecha_ipat": "2022-01-22T00:00:00"
            },
            {
                "id": 29,
                "id_agente": 86072085,
                "id_ipat": "A001351363",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.14663, -73.60915",
                "fecha_ipat": "2022-01-23T00:00:00"
            },
            {
                "id": 30,
                "id_agente": 173329365,
                "id_ipat": "A001351345",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.13269, -73.60955",
                "fecha_ipat": "2022-01-23T00:00:00"
            },
            {
                "id": 31,
                "id_agente": 40379609,
                "id_ipat": "A001351241",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.1259, -73.56364",
                "fecha_ipat": "2022-01-23T00:00:00"
            },
            {
                "id": 32,
                "id_agente": 40185825,
                "id_ipat": "A001351213",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.122526, -73.643521",
                "fecha_ipat": "2022-01-23T00:00:00"
            },
            {
                "id": 33,
                "id_agente": 17343524,
                "id_ipat": "A001351339",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.13238, -73.63206",
                "fecha_ipat": "2022-01-24T00:00:00"
            },
            {
                "id": 34,
                "id_agente": 17348507,
                "id_ipat": "A001351286",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.11535, -73.63025",
                "fecha_ipat": "2022-01-24T00:00:00"
            },
            {
                "id": 35,
                "id_agente": 86072085,
                "id_ipat": "A001351319",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.12507, -73.61969",
                "fecha_ipat": "2022-01-24T00:00:00"
            },
            {
                "id": 36,
                "id_agente": 173329365,
                "id_ipat": "A001351385",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.14938, -73.63655",
                "fecha_ipat": "2022-01-26T00:00:00"
            },
            {
                "id": 37,
                "id_agente": 86044533,
                "id_ipat": "A001351367",
                "lesionados": 2,
                "victimas": 1,
                "georeferencia": "4.14754, -73.62",
                "fecha_ipat": "2022-01-27T00:00:00"
            },
            {
                "id": 38,
                "id_agente": 52537919,
                "id_ipat": "A001351028",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.15029, -73.62361",
                "fecha_ipat": "2022-01-28T00:00:00"
            },
            {
                "id": 39,
                "id_agente": 86072085,
                "id_ipat": "A001351336",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.1258, -73.62024",
                "fecha_ipat": "2022-01-29T00:00:00"
            },
            {
                "id": 40,
                "id_agente": 86044533,
                "id_ipat": "A001351366",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.15029, -73.63611",
                "fecha_ipat": "2022-01-29T00:00:00"
            },
            {
                "id": 41,
                "id_agente": 40185825,
                "id_ipat": "A001351406",
                "lesionados": 0,
                "victimas": 2,
                "georeferencia": "4.12852, -73.62222",
                "fecha_ipat": "2022-01-30T00:00:00"
            },
            {
                "id": 42,
                "id_agente": 86072085,
                "id_ipat": "A001351381",
                "lesionados": 3,
                "victimas": 0,
                "georeferencia": "4.14754, -73.62",
                "fecha_ipat": "2022-01-30T00:00:00"
            },
            {
                "id": 43,
                "id_agente": 479491,
                "id_ipat": "A001351389",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.118741, -73.498569",
                "fecha_ipat": "2022-01-30T00:00:00"
            },
            {
                "id": 44,
                "id_agente": 15905797,
                "id_ipat": "A001351335",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.1342, -73.63631",
                "fecha_ipat": "2022-01-31T00:00:00"
            },
            {
                "id": 45,
                "id_agente": 17336469,
                "id_ipat": "A001351152",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14595, -73.63587",
                "fecha_ipat": "2022-01-31T00:00:00"
            },
            {
                "id": 46,
                "id_agente": 173329365,
                "id_ipat": "A001351396",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.15572, -73.65555",
                "fecha_ipat": "2022-01-31T00:00:00"
            },
            {
                "id": 47,
                "id_agente": 86072085,
                "id_ipat": "A001351402",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.1451, -73.63304",
                "fecha_ipat": "2022-02-01T00:00:00"
            },
            {
                "id": 48,
                "id_agente": 17312640,
                "id_ipat": "A001351421",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.15294, -73.63177",
                "fecha_ipat": "2022-02-01T00:00:00"
            },
            {
                "id": 49,
                "id_agente": 17348507,
                "id_ipat": "A001351415",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.1321, -73.64",
                "fecha_ipat": "2022-02-02T00:00:00"
            },
            {
                "id": 50,
                "id_agente": 40379609,
                "id_ipat": "A001351326",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.13959, -73.63503",
                "fecha_ipat": "2022-02-03T00:00:00"
            },
            {
                "id": 51,
                "id_agente": 40379609,
                "id_ipat": "A001351418",
                "lesionados": 3,
                "victimas": 0,
                "georeferencia": "4.13694, -73.63685",
                "fecha_ipat": "2022-02-04T00:00:00"
            },
            {
                "id": 52,
                "id_agente": 86072085,
                "id_ipat": "A001351384",
                "lesionados": 3,
                "victimas": 1,
                "georeferencia": "4.13694, -73.63686",
                "fecha_ipat": "2022-02-04T00:00:00"
            },
            {
                "id": 53,
                "id_agente": 17311888,
                "id_ipat": "A001351309",
                "lesionados": 3,
                "victimas": 0,
                "georeferencia": "4.13973, -73.60712",
                "fecha_ipat": "2022-02-05T00:00:00"
            },
            {
                "id": 54,
                "id_agente": 17312640,
                "id_ipat": "A001351377",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14635, -73.61435",
                "fecha_ipat": "2022-02-06T00:00:00"
            },
            {
                "id": 55,
                "id_agente": 86072085,
                "id_ipat": "A001351431",
                "lesionados": 3,
                "victimas": 0,
                "georeferencia": "4.14658, -73.61734",
                "fecha_ipat": "2022-02-06T00:00:00"
            },
            {
                "id": 56,
                "id_agente": 3275694,
                "id_ipat": "A001351451",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14159, -73.62372",
                "fecha_ipat": "2022-02-07T00:00:00"
            },
            {
                "id": 57,
                "id_agente": 17312640,
                "id_ipat": "A001351442",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14351, -73.62054",
                "fecha_ipat": "2022-02-07T00:00:00"
            },
            {
                "id": 58,
                "id_agente": 17343524,
                "id_ipat": "A001351413",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.13259, -73.62507",
                "fecha_ipat": "2022-02-08T00:00:00"
            },
            {
                "id": 59,
                "id_agente": 86044533,
                "id_ipat": "A001351457",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.06978, -73.59132",
                "fecha_ipat": "2022-02-09T00:00:00"
            },
            {
                "id": 60,
                "id_agente": 3275694,
                "id_ipat": "A001351226",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.15478, -73.62996",
                "fecha_ipat": "2022-02-09T00:00:00"
            },
            {
                "id": 61,
                "id_agente": 86072085,
                "id_ipat": "A001351453",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.13694, -73.57789",
                "fecha_ipat": "2022-02-11T00:00:00"
            },
            {
                "id": 62,
                "id_agente": 15905797,
                "id_ipat": "A001351401",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.14612, -73.6117",
                "fecha_ipat": "2022-02-12T00:00:00"
            },
            {
                "id": 63,
                "id_agente": 52537919,
                "id_ipat": "A001351411",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.11532, -73.63033",
                "fecha_ipat": "2022-02-13T00:00:00"
            },
            {
                "id": 64,
                "id_agente": 40217805,
                "id_ipat": "A001351464",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.117171, -73.624876",
                "fecha_ipat": "2022-02-13T00:00:00"
            },
            {
                "id": 65,
                "id_agente": 17312640,
                "id_ipat": "A001351443",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.12903, -73.64049",
                "fecha_ipat": "2022-02-14T00:00:00"
            },
            {
                "id": 66,
                "id_agente": 86072085,
                "id_ipat": "A001351465",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.15673, -73.63226",
                "fecha_ipat": "2022-02-14T00:00:00"
            },
            {
                "id": 67,
                "id_agente": 17420796,
                "id_ipat": "A001351467",
                "lesionados": 3,
                "victimas": 0,
                "georeferencia": "4.13764, -73.58903",
                "fecha_ipat": "2022-02-14T00:00:00"
            },
            {
                "id": 68,
                "id_agente": 86072085,
                "id_ipat": "A001351472",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.15719, -73.65115",
                "fecha_ipat": "2022-02-16T00:00:00"
            },
            {
                "id": 69,
                "id_agente": 17420796,
                "id_ipat": "A001351454",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.1328, -73.61102",
                "fecha_ipat": "2022-02-16T00:00:00"
            },
            {
                "id": 70,
                "id_agente": 17348507,
                "id_ipat": "A001351487",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.1134, -73.60655",
                "fecha_ipat": "2022-02-16T00:00:00"
            },
            {
                "id": 71,
                "id_agente": 86044533,
                "id_ipat": "A001351419",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.14551, -73.62022",
                "fecha_ipat": "2022-02-16T00:00:00"
            },
            {
                "id": 72,
                "id_agente": 86072085,
                "id_ipat": "A001351502",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.15478, -73.62996",
                "fecha_ipat": "2022-02-19T00:00:00"
            },
            {
                "id": 73,
                "id_agente": 86072085,
                "id_ipat": "A001351459",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.13864, -73.60304",
                "fecha_ipat": "2022-02-19T00:00:00"
            },
            {
                "id": 74,
                "id_agente": 17420796,
                "id_ipat": "A001351512",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.1439, -73.63451",
                "fecha_ipat": "2022-02-20T00:00:00"
            },
            {
                "id": 75,
                "id_agente": 17420796,
                "id_ipat": "A001351483",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14766, -73.61999",
                "fecha_ipat": "2022-02-20T00:00:00"
            },
            {
                "id": 76,
                "id_agente": 86072561,
                "id_ipat": "A001351514",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.14225, -73.61612",
                "fecha_ipat": "2022-02-20T00:00:00"
            },
            {
                "id": 77,
                "id_agente": 40328672,
                "id_ipat": "A001351434",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.11779, -73.58576",
                "fecha_ipat": "2022-02-20T00:00:00"
            },
            {
                "id": 78,
                "id_agente": 3275694,
                "id_ipat": "A001351506",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14085, -73.63401",
                "fecha_ipat": "2022-02-22T00:00:00"
            },
            {
                "id": 79,
                "id_agente": 17420796,
                "id_ipat": "A001351466",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.13176, -73.61679",
                "fecha_ipat": "2022-02-23T00:00:00"
            },
            {
                "id": 80,
                "id_agente": 17343524,
                "id_ipat": "A001351532",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.138146, -73.649703",
                "fecha_ipat": "2022-02-23T00:00:00"
            },
            {
                "id": 81,
                "id_agente": 17420796,
                "id_ipat": "A001351521",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14397, -73.63398",
                "fecha_ipat": "2022-02-24T00:00:00"
            },
            {
                "id": 82,
                "id_agente": 86072085,
                "id_ipat": "A001351544",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14055, -73.63129",
                "fecha_ipat": "2022-02-26T00:00:00"
            },
            {
                "id": 83,
                "id_agente": 30082153,
                "id_ipat": "A001351424",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14612, -73.6117",
                "fecha_ipat": "2022-02-27T00:00:00"
            },
            {
                "id": 84,
                "id_agente": 41785437,
                "id_ipat": "A001351445",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.13109, -73.63217",
                "fecha_ipat": "2022-03-02T00:00:00"
            },
            {
                "id": 85,
                "id_agente": 17332234,
                "id_ipat": "A001351307",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.15425, -73.63523",
                "fecha_ipat": "2022-03-02T00:00:00"
            },
            {
                "id": 86,
                "id_agente": 173329365,
                "id_ipat": "A001351554",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.13013, -73.64014",
                "fecha_ipat": "2022-03-02T00:00:00"
            },
            {
                "id": 87,
                "id_agente": 17420796,
                "id_ipat": "A001351537",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.12733, -73.63613",
                "fecha_ipat": "2022-03-03T00:00:00"
            },
            {
                "id": 88,
                "id_agente": 17312640,
                "id_ipat": "A001351496",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.11875, -73.61892",
                "fecha_ipat": "2022-03-03T00:00:00"
            },
            {
                "id": 89,
                "id_agente": 3275694,
                "id_ipat": "A001351507",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14789, -73.62163",
                "fecha_ipat": "2022-03-04T00:00:00"
            },
            {
                "id": 90,
                "id_agente": 17343524,
                "id_ipat": "A001351550",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.12226, -73.61757",
                "fecha_ipat": "2022-03-05T00:00:00"
            },
            {
                "id": 91,
                "id_agente": 40185825,
                "id_ipat": "A001351568",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.1258, -73.62024",
                "fecha_ipat": "2022-03-05T00:00:00"
            },
            {
                "id": 92,
                "id_agente": 41785437,
                "id_ipat": "A001351446",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.15143, -73.61936",
                "fecha_ipat": "2022-03-06T00:00:00"
            },
            {
                "id": 93,
                "id_agente": 86072085,
                "id_ipat": "A001351332",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.10067, -73.64784",
                "fecha_ipat": "2022-03-06T00:00:00"
            },
            {
                "id": 94,
                "id_agente": 17343524,
                "id_ipat": "A001351501",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.12524, -73.60995",
                "fecha_ipat": "2022-03-07T00:00:00"
            },
            {
                "id": 95,
                "id_agente": 86072085,
                "id_ipat": "A001351523",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.0948, -73.3731",
                "fecha_ipat": "2022-03-07T00:00:00"
            },
            {
                "id": 96,
                "id_agente": 17343524,
                "id_ipat": "A001351566",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.15142, -73.62835",
                "fecha_ipat": "2022-03-08T00:00:00"
            },
            {
                "id": 97,
                "id_agente": 17348507,
                "id_ipat": "A001351558",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.13281, -73.63059",
                "fecha_ipat": "2022-03-08T00:00:00"
            },
            {
                "id": 98,
                "id_agente": 17312640,
                "id_ipat": "A001351468",
                "lesionados": 3,
                "victimas": 0,
                "georeferencia": "4.14023, -73.62514",
                "fecha_ipat": "2022-03-09T00:00:00"
            },
            {
                "id": 99,
                "id_agente": 3275694,
                "id_ipat": "A001351584",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.063572, -73.399857",
                "fecha_ipat": "2022-03-10T00:00:00"
            },
            {
                "id": 100,
                "id_agente": 86072085,
                "id_ipat": "A001351589",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.13481, -73.6225",
                "fecha_ipat": "2022-03-11T00:00:00"
            },
            {
                "id": 101,
                "id_agente": 86072085,
                "id_ipat": "A001351526",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.13552, -73.60965",
                "fecha_ipat": "2022-03-11T00:00:00"
            },
            {
                "id": 102,
                "id_agente": 86044533,
                "id_ipat": "A001351587",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.1326, -73.60702",
                "fecha_ipat": "2022-03-12T00:00:00"
            },
            {
                "id": 103,
                "id_agente": 86072085,
                "id_ipat": "A001351475",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.12988, -73.63795",
                "fecha_ipat": "2022-03-13T00:00:00"
            },
            {
                "id": 104,
                "id_agente": 17312640,
                "id_ipat": "A001351520",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.08043, -73.66924",
                "fecha_ipat": "2022-03-15T00:00:00"
            },
            {
                "id": 105,
                "id_agente": 3275694,
                "id_ipat": "A001351217",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.13696, -73.63571",
                "fecha_ipat": "2022-03-17T00:00:00"
            },
            {
                "id": 106,
                "id_agente": 17420796,
                "id_ipat": "A001351561",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.10763, -73.65552",
                "fecha_ipat": "2022-03-17T00:00:00"
            },
            {
                "id": 107,
                "id_agente": 79332889,
                "id_ipat": "A001351571",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.14113, -73.63188",
                "fecha_ipat": "2022-03-17T00:00:00"
            },
            {
                "id": 108,
                "id_agente": 86072085,
                "id_ipat": "A001351577",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.125074, -73.574973",
                "fecha_ipat": "2022-03-19T00:00:00"
            },
            {
                "id": 109,
                "id_agente": 3277008,
                "id_ipat": "A001351474",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.134597, -73.568639",
                "fecha_ipat": "2022-03-19T00:00:00"
            },
            {
                "id": 110,
                "id_agente": 86072085,
                "id_ipat": "A001351556",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.1375, -73.58907",
                "fecha_ipat": "2022-03-20T00:00:00"
            },
            {
                "id": 111,
                "id_agente": 17336469,
                "id_ipat": "A001351586",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.15027, -73.63575",
                "fecha_ipat": "2022-03-20T00:00:00"
            },
            {
                "id": 112,
                "id_agente": 11407324,
                "id_ipat": "A001350855",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.104151, -73.656749",
                "fecha_ipat": "2022-03-20T00:00:00"
            },
            {
                "id": 113,
                "id_agente": 80029752,
                "id_ipat": "A001441463",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.14113, -73.63188",
                "fecha_ipat": "2022-03-21T00:00:00"
            },
            {
                "id": 114,
                "id_agente": 17312640,
                "id_ipat": "A001351608",
                "lesionados": 3,
                "victimas": 0,
                "georeferencia": "4.15143, -73.61937",
                "fecha_ipat": "2022-03-21T00:00:00"
            },
            {
                "id": 115,
                "id_agente": 17420796,
                "id_ipat": "A001441451",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.15348, -73.63888",
                "fecha_ipat": "2022-03-22T00:00:00"
            },
            {
                "id": 116,
                "id_agente": 17348507,
                "id_ipat": "A001441457",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.15207, -73.62844",
                "fecha_ipat": "2022-03-22T00:00:00"
            },
            {
                "id": 117,
                "id_agente": 17343524,
                "id_ipat": "A001441480",
                "lesionados": 3,
                "victimas": 0,
                "georeferencia": "4.11998, -73.64501",
                "fecha_ipat": "2022-03-24T00:00:00"
            },
            {
                "id": 118,
                "id_agente": 41785437,
                "id_ipat": "A001441478",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.139275, -73.573799",
                "fecha_ipat": "2022-03-24T00:00:00"
            },
            {
                "id": 119,
                "id_agente": 17312640,
                "id_ipat": "A001441476",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.12293, -73.63271",
                "fecha_ipat": "2022-03-25T00:00:00"
            },
            {
                "id": 120,
                "id_agente": 86072085,
                "id_ipat": "A001441459",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.14472, -73.64301",
                "fecha_ipat": "2022-03-25T00:00:00"
            },
            {
                "id": 121,
                "id_agente": 17420796,
                "id_ipat": "A001351540",
                "lesionados": 2,
                "victimas": 0,
                "georeferencia": "4.13198, -73.63087",
                "fecha_ipat": "2022-03-25T00:00:00"
            },
            {
                "id": 122,
                "id_agente": 86072085,
                "id_ipat": "A001441472",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.1411, -73.62107",
                "fecha_ipat": "2022-03-28T00:00:00"
            },
            {
                "id": 123,
                "id_agente": 86072085,
                "id_ipat": "A001351613",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.112949, -73.652316",
                "fecha_ipat": "2022-03-30T00:00:00"
            },
            {
                "id": 124,
                "id_agente": 3275694,
                "id_ipat": "A001351606",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.102863, -73.658032",
                "fecha_ipat": "2022-03-30T00:00:00"
            },
            {
                "id": 125,
                "id_agente": 40217805,
                "id_ipat": "A001441500",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.140650, -73.631436",
                "fecha_ipat": "2022-03-31T00:00:00"
            },
            {
                "id": 126,
                "id_agente": 15905797,
                "id_ipat": "A001441548",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.1242762, -73.6110933",
                "fecha_ipat": "2022-04-09T00:00:00"
            },
            {
                "id": 127,
                "id_agente": 86072085,
                "id_ipat": "A001351222",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.143411, -73.603686",
                "fecha_ipat": "2022-04-20T00:00:00"
            },
            {
                "id": 128,
                "id_agente": 40217805,
                "id_ipat": "A001441599",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.142839, -73.601910",
                "fecha_ipat": "2022-04-22T00:00:00"
            },
            {
                "id": 129,
                "id_agente": 86075440,
                "id_ipat": "A001441604",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.143981, -73.634434",
                "fecha_ipat": "2022-05-01T00:00:00"
            },
            {
                "id": 130,
                "id_agente": 86072085,
                "id_ipat": "A001441647",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.134369, -73.636441",
                "fecha_ipat": "2022-05-02T00:00:00"
            },
            {
                "id": 131,
                "id_agente": 3275694,
                "id_ipat": "A001441509",
                "lesionados": 1,
                "victimas": 2,
                "georeferencia": "4.131779, -73.541097",
                "fecha_ipat": "2022-05-08T00:00:00"
            },
            {
                "id": 132,
                "id_agente": 86072085,
                "id_ipat": "A001441671",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.052053, -73.671662",
                "fecha_ipat": "2022-05-08T00:00:00"
            },
            {
                "id": 133,
                "id_agente": 86075440,
                "id_ipat": "A001441703",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.137859, -73.582484",
                "fecha_ipat": "2022-05-17T00:00:00"
            },
            {
                "id": 134,
                "id_agente": 17348507,
                "id_ipat": "A001441718",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.137859, -73.582484",
                "fecha_ipat": "2022-05-21T00:00:00"
            },
            {
                "id": 135,
                "id_agente": 86087010,
                "id_ipat": "A001441729",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.148542, -73.625765",
                "fecha_ipat": "2022-06-01T00:00:00"
            },
            {
                "id": 136,
                "id_agente": 86072085,
                "id_ipat": "A001441787",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.158980, -73.635067",
                "fecha_ipat": "2022-06-08T00:00:00"
            },
            {
                "id": 137,
                "id_agente": 17420796,
                "id_ipat": "A001441849",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.032232, -73.364230",
                "fecha_ipat": "2022-06-23T00:00:00"
            },
            {
                "id": 138,
                "id_agente": 17336469,
                "id_ipat": "A001441817",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.116852, -73.647642",
                "fecha_ipat": "2022-07-05T00:00:00"
            },
            {
                "id": 139,
                "id_agente": 3275694,
                "id_ipat": "A001441946",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4,1349909-735893338",
                "fecha_ipat": "2022-07-19T00:00:00"
            },
            {
                "id": 140,
                "id_agente": 86072085,
                "id_ipat": "A001442016",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.115881, -73.599552",
                "fecha_ipat": "2022-07-26T00:00:00"
            },
            {
                "id": 141,
                "id_agente": 52537919,
                "id_ipat": "A001442033",
                "lesionados": 2,
                "victimas": 1,
                "georeferencia": "4.161416, -73.627239",
                "fecha_ipat": "2022-07-30T00:00:00"
            },
            {
                "id": 142,
                "id_agente": 3275694,
                "id_ipat": "A001442052",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.147066, -73.635498",
                "fecha_ipat": "2022-08-07T00:00:00"
            },
            {
                "id": 143,
                "id_agente": 86044533,
                "id_ipat": "A001441952",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.135823, -73.621896",
                "fecha_ipat": "2022-08-07T00:00:00"
            },
            {
                "id": 144,
                "id_agente": 17420796,
                "id_ipat": "A001441927",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.137043, -73.585375",
                "fecha_ipat": "2022-08-21T00:00:00"
            },
            {
                "id": 145,
                "id_agente": 17348507,
                "id_ipat": "A001442128",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.091510, -73.449251",
                "fecha_ipat": "2022-08-30T00:00:00"
            },
            {
                "id": 146,
                "id_agente": 86072085,
                "id_ipat": "A001442126",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.137968, -73.592613",
                "fecha_ipat": "2022-09-04T00:00:00"
            },
            {
                "id": 147,
                "id_agente": 17343524,
                "id_ipat": "A001442150",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.079587, -73.669400",
                "fecha_ipat": "2022-09-06T00:00:00"
            },
            {
                "id": 148,
                "id_agente": 86072085,
                "id_ipat": "A001442151",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.136998, -73.585070",
                "fecha_ipat": "2022-09-11T00:00:00"
            },
            {
                "id": 149,
                "id_agente": 79332889,
                "id_ipat": "A001351162",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.137996, -73.592562",
                "fecha_ipat": "2022-09-17T00:00:00"
            },
            {
                "id": 150,
                "id_agente": 79563712,
                "id_ipat": "A001442170",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": ".147576, -73.620335",
                "fecha_ipat": "2022-09-19T00:00:00"
            },
            {
                "id": 151,
                "id_agente": 40185825,
                "id_ipat": "A001442065",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.155703, -73.630852",
                "fecha_ipat": "2022-09-21T00:00:00"
            },
            {
                "id": 152,
                "id_agente": 86072085,
                "id_ipat": "A001441998",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.143654, -73.633668",
                "fecha_ipat": "2022-09-27T00:00:00"
            },
            {
                "id": 153,
                "id_agente": 86075440,
                "id_ipat": "A001442067",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.135766, -73.618809",
                "fecha_ipat": "2022-09-30T00:00:00"
            },
            {
                "id": 154,
                "id_agente": 22455839,
                "id_ipat": "A001441812",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.146850, -73.616067",
                "fecha_ipat": "2022-10-01T00:00:00"
            },
            {
                "id": 155,
                "id_agente": 52537919,
                "id_ipat": 123456789,
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "3.4591321, -76.506330",
                "fecha_ipat": "2022-10-05T00:00:00"
            },
            {
                "id": 156,
                "id_agente": 17348507,
                "id_ipat": "A001442228",
                "lesionados": 2,
                "victimas": 1,
                "georeferencia": "4.1342925, -73.6377378",
                "fecha_ipat": "2022-10-05T00:00:00"
            },
            {
                "id": 157,
                "id_agente": 17343055,
                "id_ipat": "A001442224",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.144423, -73.634331",
                "fecha_ipat": "2022-10-08T00:00:00"
            },
            {
                "id": 158,
                "id_agente": 86072085,
                "id_ipat": "A001442040",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.1336737, -73.6358991",
                "fecha_ipat": "2022-10-15T00:00:00"
            },
            {
                "id": 159,
                "id_agente": 15905797,
                "id_ipat": "A001442211",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.1162927, -73.5972621",
                "fecha_ipat": "2022-10-22T00:00:00"
            },
            {
                "id": 160,
                "id_agente": 86047344,
                "id_ipat": "A001442258",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.1134411, -73.6065562",
                "fecha_ipat": "2022-10-30T00:00:00"
            },
            {
                "id": 161,
                "id_agente": 17343524,
                "id_ipat": "A001442308",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.1314864, -73.5388804",
                "fecha_ipat": "2022-11-07T00:00:00"
            },
            {
                "id": 162,
                "id_agente": 17312640,
                "id_ipat": "A001442241",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.1733129, -73.6017557",
                "fecha_ipat": "2022-11-07T00:00:00"
            },
            {
                "id": 163,
                "id_agente": 40217805,
                "id_ipat": "A001442323",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.1284771, -73.6382012",
                "fecha_ipat": "2022-11-23T00:00:00"
            },
            {
                "id": 164,
                "id_agente": 86072085,
                "id_ipat": "A001442320",
                "lesionados": 1,
                "victimas": 1,
                "georeferencia": "4.1371237, -73.5844829",
                "fecha_ipat": "2022-12-10T00:00:00"
            },
            {
                "id": 165,
                "id_agente": 17343524,
                "id_ipat": "A001442376",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.0849, -73.3810",
                "fecha_ipat": "2022-12-12T00:00:00"
            },
            {
                "id": 166,
                "id_agente": 86047344,
                "id_ipat": "A001562543",
                "lesionados": 0,
                "victimas": 1,
                "georeferencia": "4.1192661, -73.6404637",
                "fecha_ipat": "2022-12-14T00:00:00"
            },
            {
                "id": 167,
                "id_agente": 30082153,
                "id_ipat": "A001351221",
                "lesionados": 1,
                "victimas": 0,
                "georeferencia": "4.1384, -73.62155",
                "fecha_ipat": "2022-12-24T00:00:00"
            }
          ]
        }

          ';

        $dataArray = json_decode($data, true);
        foreach ($dataArray['array'] as $Data) {
            DB::table('ipats')->insert([
                'id_agent' => $Data['id_agente'],
                'uuid'=> Str::uuid(),
                'id_ipat' => $Data['id_ipat'],
                'injured' => $Data['lesionados'],
                'victims' => $Data['victimas'],
                'coordinates' => $Data['georeferencia'],
                'date_ipat' => $Data['fecha_ipat'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

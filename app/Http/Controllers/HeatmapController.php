<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Menu;
use App\Models\BarMenu;
use App\Models\Marker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\Villavicencio\Ipats;
use App\Models\Ditra\DataDitra;
use App\Models\Ditra\Incident;
use App\Models\Villavicencio\CriminalActs;

/**
 * Controlador para Menu's
 *
 * Controlador que maneja la lógica que se da como respúesta para el renderizado de los menu's
 *
 * @package    Controllers
 * @copyright  2023 Ignicion Games S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class HeatmapController extends Controller
{
    /**
     * Función para armar la estructura del command bar a partir de permisos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        try{
            if ($user->id == 43) {
                $geojson = $this->especific();
            } else {
                $geojson = $this->general();
            }

            return response()->json($geojson, 200);

        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function general()
    {
        $sub_domain = tenant('id');

        switch ($sub_domain)
        {
            case 'villavicencio':
                    $data = CriminalActs::select('latitude', 'longitude')->get();
                    $features = [];
                    foreach ($data as $row) {

                        $feature = [
                            "type" => "Feature",
                            "geometry" => [
                                "type" => "Point",
                                "coordinates" => [
                                    $row->latitude,
                                    $row->longitude
                                ]
                            ]
                        ];
                        $features[] = $feature;
                    }
                
                    $geojson = [
                        "type" => "FeatureCollection",
                        "features" => $features
                    ];

                    return $geojson;     
                break;
            case 'hackaton':
                    $data = CriminalActs::select('latitude', 'longitude')->get();
                    $features = [];
                    foreach ($data as $row) {

                        $feature = [
                            "type" => "Feature",
                            "geometry" => [
                                "type" => "Point",
                                "coordinates" => [
                                    $row->latitude,
                                    $row->longitude
                                ]
                            ]
                        ];
                        $features[] = $feature;
                    }
                
                    $geojson = [
                        "type" => "FeatureCollection",
                        "features" => $features
                    ];

                    return $geojson;     
                break;
            case 'ditra':
                $data = DataDitra::whereNotNull('latitude')->get();
                $features = [];
            
                foreach ($data as $row) {
                    // Suponiendo que las coordenadas están en formato "latitud,longitud"
                    
                    $feature = [
                        "type" => "Feature",
                        "geometry" => [
                            "type" => "Point",
                            'coordinates' => [
                                (float)$row->latitude, (float)$row->longitude
                            ]
                        ],
                        'specialType' => 4,
                    ];
                    $features[] = $feature;
                }

                $geojson = [
                    "type" => "FeatureCollection",
                    "features" => $features
                ];

                    return $geojson;     
                break;
        }
    }

    public function especific()
    {
        $data = Ipats::select('latitude', 'longitude')->get();

        $features = [];
        foreach ($data as $row) {
    
            $feature = [
                "type" => "Feature",
                "geometry" => [
                    "type" => "Point",
                    "coordinates" => [
                        (float)$row->latitude, (float)$row->longitude
                    ]
                ],
                'specialType' => 4,
            ];
            $features[] = $feature;
        }
    
        $geojson = [
            "type" => "FeatureCollection",
            "features" => $features
        ];

        return $geojson;
    }
}

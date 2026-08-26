<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Menu;
use App\Models\BarMenu;
use App\Models\Marker;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

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
class MenuController extends Controller
{
    /**
     * Función para armar la estructura del command bar a partir de permisos
     *
     * @return \Illuminate\Http\Response
     */
    public function commandBar()
    {
        try{
            $user = Auth::user();

            $permisos = $user->getAllPermissions()->pluck('name');

            $permisos = $permisos->filter(function ($item) {
                return strpos($item, 'commandbar-') === 0;
            });

            $permisos = $permisos->map(function ($item) {
                // Obtener la parte después del guion
                return substr($item, strpos($item, '-') + 1);
            });

            $markers_permisos = Marker::whereIn('name', $permisos->toArray())->get()->pluck('id')->toArray();

            $data_menu = BarMenu::with('Marker')->whereIn('bar_menu.marker', $markers_permisos)->where('bar_menu.enabled', true)->orderBy('bar_menu.id')->get();

            // Crear un nuevo arreglo en la estructura deseada
            $menu = [];


            foreach ($data_menu as $data) {
                $menu_item = [
                    "color" => $data->Marker->color,
                    "icon" => $data->Marker->icon,
                    "name" => $data->Marker->name,
                    "id" => $data->Marker->id,
                    "defaultActive" => $data->Marker->id == 54 ? true : false
                ];

                if ($data->Marker->name == 'Ipats') {
                $menu_item['specialType'] = 8;
                } else if ($data->Marker->name == 'Mapa de Calor') {
                    $menu_item['specialType'] = 4;
                } else if ($data->Marker->name == 'Tráfico') {
                    $menu_item['specialType'] = 5;
                } else if ($data->Marker->name == 'Modelo Probabilistico') {
                    $menu_item['specialType'] = 2;
                } else if ($data->Marker->name == 'Modelo Probabilistico IPATS') {
                    $menu_item['specialType'] = 2;
                } else if ($data->Marker->name == 'Modelo Probabilistico General') {
                    $menu_item['specialType'] = 3;
                } else if ($data->Marker->name == 'Unidades móviles') {
                    $menu_item['specialType'] = 6;
                } else if ($data->Marker->name == 'Unidades móviles App') {
                    $menu_item['specialType'] = 6;
                }

                $menu[] = $menu_item;
            }


            return Response::json([
                'code' => '200',
                'status'=> 'succes',
                'message' => 'Solicitud exitosa',
                'data' => $menu
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Función para armar la estructura del menu a partir de permisos
     * y así enviar al front-end el menu que el usuario puede ver
     *
     * @return \Illuminate\Http\Response
     */
    public function menuBar()
    {
        try{
            $user = Auth::user();

            $permisos = $user->getAllPermissions()->pluck('name');

            $menu_permisions = $permisos->filter(function ($item) {
                return strpos($item, 'menu-') === 0;
            });

            $menu_permisions = $menu_permisions->map(function ($item) {
                // Obtener la parte después del guion
                return substr($item, strpos($item, '-') + 1);
            });

            $sub_menu_permisions = $permisos->filter(function ($item) {
                return strpos($item, 'submenu-') === 0;
            });

            $sub_menu_permisions = $sub_menu_permisions->map(function ($item) {
                // Obtener la parte después del guion
                return substr($item, strpos($item, '-') + 1);
            });

            $menu = Menu::where('menu.enabled', true)->whereIn('name', $menu_permisions)->orderby('menu.id')->get();

            $menu = $menu->map(function ($item) use ($sub_menu_permisions) {
                // Realiza aquí la organización o transformación personalizada que necesitas

                $organizedItem = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'path' => $item->path,
                    'icon' => $item->icon,
                    'slug' => $item->slug,
                ];

                if (tenant('id') == 'neiva' && $item->name == 'Umbrella') {
                    $organizedItem['externalUrl'] = 'https://stg-etb.lavenirapps.co/';
                }

                $organizedItem['submenu'] = $item->SubMenu($sub_menu_permisions)->get();

                return $organizedItem;
            });


            return Response::json([
                'code' => '200',
                'status'=> 'succes',
                'message' => 'Solicitud exitosa',
                'data' => $menu
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Display the specified resource.
     *
     */
    public function initialData()
    {
        try{

            $sub_domain = tenant('id');

            switch ($sub_domain)
            {
                case 'viper':
                    $defaultCoordinates = [
                        'lat' => 4.132543365663997,
                        'lng' => -73.62534265307882
                    ];

                    $mapCenter = $this->parsePosition();

                    $defaultRequest = [];

                    $mapRequest = $this->parseMapRequest();

                    $defaultZoom = 14;

                    $mapZoom = Setting::get('main_zoom');

                    $defaultDensity = 100;

                    $heatmapDensity = Setting::get('heatmap_density');

                    $data = [
                        'mapCenter' => $mapCenter ?? $defaultCoordinates,
                        'mapRequest' => $mapRequest ?? $defaultRequest,
                        'mapZoom' => $mapZoom != null ? (int)$mapZoom :  $defaultZoom,
                        'heatmapDensity' => $heatmapDensity ?? $defaultDensity
                    ];
                    break;
                case 'villavicencio':
                    $defaultCoordinates = [
                        'lat' => 4.132543365663997,
                        'lng' => -73.62534265307882
                    ];

                    $mapCenter = $this->parsePosition();

                    $defaultRequest = ['incidents', 'indicators'];

                    $mapRequest = $this->parseMapRequest();

                    $defaultZoom = 14;

                    $mapZoom = Setting::get('main_zoom');

                    $defaultDensity = 100;

                    $heatmapDensity = Setting::get('heatmap_density');

                    $data = [
                        'mapCenter' => $mapCenter ?? $defaultCoordinates,
                        'mapRequest' => $mapRequest ?? $defaultRequest,
                        'mapZoom' => $mapZoom != null ? (int)$mapZoom :  $defaultZoom,
                        'heatmapDensity' => $heatmapDensity ?? $defaultDensity
                    ];
                    break;
                case 'neiva':

                    $defaultCoordinates = [
                        'lat' => floatval(env('MAP_CENTER_NEIVA_LATITUD')),
                        'lng' => floatval(env('MAP_CENTER_NEIVA_LONGITUD'))
                    ];

                    $mapCenter = $this->parsePosition();

                    $defaultRequest = [];

                    $mapRequest = $this->parseMapRequest();

                    $defaultZoom = 14;

                    $mapZoom = Setting::get('main_zoom');

                    $defaultDensity = 100;

                    $heatmapDensity = Setting::get('heatmap_density');

                    $data = [
                        'mapCenter' => $mapCenter ?? $defaultCoordinates,
                        'mapRequest' => $mapRequest ?? $defaultRequest,
                        'mapZoom' => $mapZoom != null ? (int)$mapZoom :  $defaultZoom,
                        'heatmapDensity' => $heatmapDensity ?? $defaultDensity
                    ];
                    break;
                case 'cologne':
                    $defaultCoordinates = [
                        'lat' => 50.9375,
                        'lng' => 6.9603
                    ];

                    $mapCenter = $this->parsePosition();
                    $defaultRequest = ['incidents'];
                    $mapRequest = $this->parseMapRequest();
                    $defaultZoom = 12;
                    $mapZoom = Setting::get('main_zoom');
                    $defaultDensity = 50;
                    $heatmapDensity = Setting::get('heatmap_density');

                    $data = [
                        'mapCenter' => $mapCenter ?? $defaultCoordinates,
                        'mapRequest' => $mapRequest ?? $defaultRequest,
                        'mapZoom' => $mapZoom != null ? (int)$mapZoom : $defaultZoom,
                        'heatmapDensity' => $heatmapDensity ?? $defaultDensity
                    ];
                    break;
                case 'ditra':

                    $defaultCoordinates = [
                        'lat' => 4.132543365663997,
                        'lng' => -73.62534265307882
                    ];

                    $mapCenter = $this->parsePosition();

                    $defaultRequest = ['incidents', 'indicators'];

                    $mapRequest = $this->parseMapRequest();

                    $defaultZoom = 6;

                    $mapZoom = Setting::get('main_zoom');

                    $defaultDensity = 100;

                    $heatmapDensity = Setting::get('heatmap_density');

                    $data = [
                        'mapCenter' => $mapCenter ?? $defaultCoordinates,
                        'mapRequest' => $mapRequest ?? $defaultRequest,
                        'mapZoom' => $mapZoom != null ? (int)$mapZoom :  $defaultZoom,
                        'heatmapDensity' => $heatmapDensity ?? $defaultDensity
                    ];
                case 'villavicencio':
                    $defaultCoordinates = [
                        'lat' => 4.132543365663997,
                        'lng' => -73.62534265307882
                    ];

                    $mapCenter = $this->parsePosition();

                    $defaultRequest = ['incidents', 'indicators'];

                    $mapRequest = $this->parseMapRequest();

                    $defaultZoom = 14;

                    $mapZoom = Setting::get('main_zoom');

                    $defaultDensity = 100;

                    $heatmapDensity = Setting::get('heatmap_density');

                    $data = [
                        'mapCenter' => $mapCenter ?? $defaultCoordinates,
                        'mapRequest' => $mapRequest ?? $defaultRequest,
                        'mapZoom' => $mapZoom != null ? (int)$mapZoom :  $defaultZoom,
                        'heatmapDensity' => $heatmapDensity ?? $defaultDensity
                    ];
                    break;
                case 'hackaton':
                    $defaultCoordinates = [
                        'lat' => 4.132543365663997,
                        'lng' => -73.62534265307882
                    ];
    
                    $mapCenter = $this->parsePosition();
    
                    $defaultRequest = ['incidents', 'indicators'];
    
                    $mapRequest = $this->parseMapRequest();
    
                    $defaultZoom = 14;
    
                    $mapZoom = Setting::get('main_zoom');
    
                    $defaultDensity = 100;
    
                    $heatmapDensity = Setting::get('heatmap_density');
    
                    $data = [
                        'mapCenter' => $mapCenter ?? $defaultCoordinates,
                        'mapRequest' => $mapRequest ?? $defaultRequest,
                        'mapZoom' => $mapZoom != null ? (int)$mapZoom :  $defaultZoom,
                        'heatmapDensity' => $heatmapDensity ?? $defaultDensity
                    ];
                    break;        
                case 'bucarest':

                    $defaultCoordinates = [
                        'lat' => 44.43225,
                        'lng' => 26.10626
                    ];

                    $mapCenter = $this->parsePosition();

                    $defaultRequest = ['incidents', 'indicators'];

                    $mapRequest = $this->parseMapRequest();

                    $defaultZoom = 6;

                    $mapZoom = Setting::get('main_zoom');

                    $defaultDensity = 100;

                    $heatmapDensity = Setting::get('heatmap_density');

                    $data = [
                        'mapCenter' => $mapCenter ?? $defaultCoordinates,
                        'mapRequest' => $mapRequest ?? $defaultRequest,
                        'mapZoom' => $mapZoom != null ? (int)$mapZoom :  $defaultZoom,
                        'heatmapDensity' => $heatmapDensity ?? $defaultDensity
                    ];
                    break;
            }

            return Response::json([
                'code' => '200',
                'status'=> 'succes',
                'message' => 'Solicitud exitosa',
                'data' => $data
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function parsePosition()
    {

        $coordinatesDB = Setting::get('position');

        if ($coordinatesDB != null) {
            $coordinatesDB = explode(',', $coordinatesDB);

            $coordinatesDB = array_map('floatval', $coordinatesDB);

            $coordinatesDB = [
                'lat' => $coordinatesDB[0],
                'lng' => $coordinatesDB[1]
            ];
        }

        return $coordinatesDB;
    }

    public function parseMapRequest()
    {
        $mapRequest = Setting::get('map_request');

        if (! is_string($mapRequest) || trim($mapRequest) === '') {
            return null;
        }

        return array_values(array_filter(
            array_map('trim', explode(',', $mapRequest)),
            fn (string $request) => $request !== ''
        ));
    }
}

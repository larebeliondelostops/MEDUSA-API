<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Menu;
use App\Models\BarMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
     * Slugs para generar las peticiones de las respectivas ciudades
     */
    CONST MARKERS_VILLAVICENCIO = [
        'alarm', 'cai', 'healt', 'pollingPlace', 'OpticalFiber', 'camera', 'event'
    ];

    CONST MARKERS_NEIVA = [
        'SIESOpticalFiber', 'cameraOpticalFiber', 'deportiveScenary', 'mobility', 'healt', 'EPNceiba', 'citizenSecurity',
        'digitalZone', 'educationalHeadquarters', 'camera'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function commandBar()
    {
        $data_menu = BarMenu::with('Marker')->where('bar_menu.enabled', true)->orderby('bar_menu.id')->get();

        // Crear un nuevo arreglo en la estructura deseada
        $menu = [];

        foreach ($data_menu as $data) {
            $menu[] = [
                "color" => $data->Marker->color,
                "icon" => $data->Marker->icon,
                "name" => $data->Marker->name,
                "id" => $data->Marker->id,
                "defaultActive" => $data->Marker->id == 54 ? true : false
            ];
        }

        try{
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function menuBar()
    {
        $menu = Menu::with('SubMenu:menu,icon,name,slug,path,identifier as id')->where('menu.enabled', true)->orderby('menu.id')->get();

        $menu = $menu->map(function ($item) {
            // Realiza aquí la organización o transformación personalizada que necesitas
            $organizedItem = [
                'id' => $item->id,
                'name' => $item->name,
                'path' => $item->path,
                'icon' => $item->icon,
                'slug' => $item->slug,
            ];

            // Agrega la relación 'submenu' con el nombre deseado
            $organizedItem['submenu'] = $item->SubMenu;

            return $organizedItem;
        });

        try{
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
                case 'villavicencio':
                    $data = [
                        'mapCenter' => [
                            'lat' => floatval(env('MAP_CENTER_VILLAVICENCIO_LATITUD')),
                            'lng' => floatval(env('MAP_CENTER_VILLAVICENCIO_LONGITUD'))
                        ],
                        'mapRequest' => ['incidents', 'indicators'],
                        'zoom' => 3
                    ];
                    break;
                case 'neiva':
                    $data = [
                        'mapCenter' =>  [
                            'lat' => floatval(env('MAP_CENTER_NEIVA_LATITUD')),
                            'lng' => floatval(env('MAP_CENTER_NEIVA_LONGITUD'))
                        ],
                        'mapRequest' => []
                    ];
                    break;
                case 'ditra':
                    $data = [
                        'mapCenter' => [
                            'lat' => floatval(env('MAP_CENTER_VILLAVICENCIO_LATITUD')),
                            'lng' => floatval(env('MAP_CENTER_VILLAVICENCIO_LONGITUD'))
                        ],
                        'mapRequest' => ['incidents', 'indicators'],
                        'zoom' => 3
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
}

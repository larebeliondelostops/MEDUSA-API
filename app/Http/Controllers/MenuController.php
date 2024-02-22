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
     * Función para armar la estructura del menu a partir de permisos
     * y así enviar al front-end el menu que el usuario puede ver
     *
     * @return \Illuminate\Http\Response
     */
    public function menuBar()
    {
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

            $organizedItem['submenu'] = $item->SubMenu($sub_menu_permisions)->get();

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
                        'mapZoom' => 14
                    ];
                    break;
                case 'neiva':
                    $data = [
                        'mapCenter' =>  [
                            'lat' => floatval(env('MAP_CENTER_NEIVA_LATITUD')),
                            'lng' => floatval(env('MAP_CENTER_NEIVA_LONGITUD'))
                        ],
                        'mapRequest' => [],
                        'mapZoom' => 14
                    ];
                    break;
                case 'ditra':
                    $data = [
                        'mapCenter' => [
                            'lat' => floatval(env('MAP_CENTER_VILLAVICENCIO_LATITUD')),
                            'lng' => floatval(env('MAP_CENTER_VILLAVICENCIO_LONGITUD'))
                        ],
                        'mapRequest' => ['incidents', 'indicators'],
                        'mapZoom' => 6
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

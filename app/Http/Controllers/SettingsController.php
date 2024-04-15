<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Exception;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allTable(Request $request)
    {
        try {

            $data = [
                "data" => [
                    [
                        "ID" => "1",
                        "Nombre" => "Configuraciones",
                    ],
                ],
                "meta" => [
                    "title" => "Configutaciones",
                    "pagination" => [
                        "total" => 1,
                        "perPage" => 10,
                        "currentPage" => 1,
                        "lastPage" => 1,
                        "from" => 1,
                        "to" => 10
                    ],
                    "ableCreate" => true
                ]
            ];
            //dd($data);
            return $data;
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
    public function store(Request $request)
    {
        try {
            foreach ($request->all() as $key => $value) {
                if ($key == 'position') {
                    $value = $value['coordinates'][0];
                    $coordinates = $value[0] . ',' . $value[1];
                    Setting::set($key, $coordinates);
                } else {
                    Setting::set($key, $value);
                }
            }
            return Response::json([
                'code' => '200',
                'status' => 'success',
                'message' => 'Solicitud Procesada Correctamente'
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getOne($id)
    {
        try {
            $campos = [];
            $settings = Setting::allSettings();

            foreach($settings as $setting) {
                $campos[$setting->key] = $setting->value;
                if ($setting->key == 'position') {
                    $coordinates = explode(',', $setting->value);

                    $latitud = (float)$coordinates[1];
                    $longitud = (float)$coordinates[0];

                    $campos[$setting->key] = [
                        'type' => 'Point',
                        'coordinates' => [[$longitud, $latitud]]
                    ];
                }
            }

            return Response::json([
                'status' => 'success',
                'data' => $campos,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            foreach ($request->all() as $key => $value) {
                if ($key == 'position') {
                    $value = $value['coordinates'][0];
                    $coordinates = $value[0] . ',' . $value[1];

                    Setting::updateKey($key, $coordinates);
                } else {
                    Setting::updateKey($key, $value);
                }
            }

            return Response::json([
                'code' => '200',
                'status' => 'success',
                'message' => 'Solicitud Procesada Correctamente'
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Setting::forget($id);
            return Response::json([
                'code' => '200',
                'status' => 'success',
                'message' => 'Solicitud Procesada Correctamente'
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

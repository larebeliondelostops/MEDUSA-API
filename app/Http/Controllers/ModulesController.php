<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Http\Request\Modules\StoreModulesRequest;

/**
 * Controlador para Modulos.
 *
 * Controlador que maneja la lógica de los modulos.
 *
 * @package    Controllers
 * @copyright  2023 Ignicion Games S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class ModulesController extends Controller
{
    /**
     * Constructor de la clase.
     *
     * @access public
     */
    public function __construct()
    {
    }

    /**
     * Metodo para obtener
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        try {

            $users = Module::paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);

            $transformedData = [];
            foreach ($users as $user) {
                $transformedData[] = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'description' => $user->description,
                ];
            }

            return response()->json([
                'data' => $transformedData,
                'meta' => [
                    'pagination' => [
                        'total' => $users->total(),
                        'perPage' => $users->perPage(),
                        'currentPage' => $users->currentPage(),
                        'lastPage' => $users->lastPage(),
                        'from' => $users->firstItem(),
                        'to' => $users->lastItem(),
                    ],
                ],
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Metodo para almacenar un nuevo centro de Entidades.
     *
     * @param  \Illuminate\Http\Request\Modules\StoreModulesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModulesRequest $request)
    {
        try {
            // Validación
            if (isset($request->validator) && $request->validator->fails()) {
                return Response::json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => 'Datos Recibidos Incorrectos',
                    'errors' => $request->validator->messages()
                ], 400, [], JSON_PRETTY_PRINT);
            }

            $module = Module::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Datos almacenados exitosamente',
                'data' => $module
            ], 201, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return response()->json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Metodo para actualizar un centro de Entidades especifico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $module = Module::find($id);

            if (!$module) {
                return Response::json([
                    'status' => 'error',
                    'message' => 'Usuario no encontrado'
                ], 400, [], JSON_PRETTY_PRINT);
            }

            $module->update([
                'name' => $request->name ?? $module->name,
                'description' => $request->description ?? $module->description,
            ]);

            return Response::json([
                'status' => 'success',
                'message' => 'Datos actualizados exitosamente',
                'data' => $module
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error en la generación de la solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Metodo para eliminar un centro de Entidades especifico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $module = Module::find($id);

            if (!$module) {
                return Response::json([
                    'status' => 'error',
                    'message' => 'Modulo no encontrado'
                ], 400, [], JSON_PRETTY_PRINT);
            }

            Module::destroy($id);

            return Response::json([
                'status' => 'succes',
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Http\Request\Users\AssignRolRequest;

/**
 * Controlador Maneja Lógica de Users.
 *
 * Controlador que maneja la lógica de los usuarios y sus interacciones posibles con el sistema.
 *
 * @package    Controllers
 * @copyright  2023 Ignicion S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class UserController extends Controller
{

    /**
     * Método para el asignado de roles para determinado usuario
     *
     * @access public
     * @param AssignRolRequest $request
     * @return Illuminate\Support\Facades\Response
     */
    public function assignRol(AssignRolRequest $request)
    {
        try{
            // Validación
            if (isset($request->validator) && $request->validator->fails()) {
                return Response::json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => 'Datos Recibidos Incorrectos',
                    'errors' => $request->validator->messages()
                ], 400, [], JSON_PRETTY_PRINT);
            }

            $user = User::findOrFail($request->user_id);

            $role = Role::where('name', $request->rol_name)->first();

            if (!$role) {
                return Response::json([
                    'code' => '2001',
                    'status'=> 'error',
                    'message' => 'Rol no encontrado'
                ], 404, [], JSON_PRETTY_PRINT);
            }

            $user->assignRole($role);

            return Response::json([
                'code' => '200',
                'status'=> 'succes',
                'message' => 'Rol asignado correctamente'
            ], 201, [], JSON_PRETTY_PRINT);
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

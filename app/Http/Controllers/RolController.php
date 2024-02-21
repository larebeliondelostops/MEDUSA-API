<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Response;
use App\Http\Request\RolesPermisos\SaveRolRequest;
use App\Http\Request\RolesPermisos\savePermisoRequest;
use App\Http\Request\RolesPermisos\AssignPermissionsRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Controlador para Roles y Permisos.
 *
 * Controlador que maneja la lógica de los roles y permisos dentro de la API.
 *
 * @package    Controllers
 * @copyright  2023 Ignicion Games S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class RolController extends Controller
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
     * Método para devolver todos los roles registrados
     *
     * @access public
     * @return Illuminate\Support\Facades\Response
     */
    public function getRoles()
    {
        try{
            return Response::json([
                'code' => '200',
                'status'=> 'succes',
                'message' => 'Solicitud exitosa',
                'data' => Role::all()
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
     * Método para el asignado de roles para determinado usuario
     *
     * @access public
     * @param SaveRolRequest $request
     * @return Illuminate\Support\Facades\Response
     */
    public function saveRol(SaveRolRequest $request)
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

            $role = Role::create(['name' => $request->input('name')]);

            return Response::json([
                'code' => '200',
                'status'=> 'succes',
                'message' => 'Rol creado exitosamente',
                'data' => $role
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

    /**
     * Método para el asignado de roles para determinado usuario
     *
     * @access public
     * @param savePermisoRequest $request
     * @return Illuminate\Support\Facades\Response
     */
    public function savePermiso(savePermisoRequest $request)
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

            if (Permission::where('name', $request->input('name'))->exists()) {
                return Response::json([
                    'code' => '2001',
                    'status'=> 'error',
                    'message' => 'El permisos ya existe'
                ], 400, [], JSON_PRETTY_PRINT);
            }

            $permission = Permission::create(['name' => $request->input('name')]);

            return Response::json([
                'code' => '200',
                'status'=> 'succes',
                'message' => 'Permisos guardados correctamente',
                'data' => $permission
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

    /**
     * Método para el asignado de roles para determinado usuario
     *
     * @access public
     * @param AssignPermissionsRequest $request
     * @return Illuminate\Support\Facades\Response
     */
    public function assignPermissions(AssignPermissionsRequest $request)
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

            $role = Role::findOrFail($request->input('role_id'));

            // Obtén los permisos seleccionados desde el cliente
            $permissionNames = $request->input('permissions');

            // Asigna los permisos al rol
            $permissions = Permission::whereIn('name', $permissionNames)->get();
            $role->syncPermissions($permissions);

            return Response::json([
                'code' => '200',
                'status'=> 'succes',
                'message' => 'Solicitud exitosa'
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

    /**
     * Método para el asignado de permisos para determinado usuario
     *
     * @access public
     * @param Request $request
     * @return Illuminate\Support\Facades\Response
     */
    public function assignPermissionsToUser(Request $request)
    {
        try {

            $user = Auth::user();

            $permissions_id = $request->input('permissions');

            $permissions = Permission::whereIn('id', $permissions_id)->get();

            $user->givePermissionTo($permissions);

            return Response::json([
                'code' => '200',
                'status'=> 'succes',
                'message' => 'Solicitud exitosa'
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

    public function assignRolToUser(Request $request)
    {
        try {
            // Validacion
            $rules = [
                'role_id' => [
                    'required',
                    'exists:roles,id',
                ]
            ];
            $messages = [
                'required' => 'El campo :attribute es obligatorio',
                'exists' => 'El campo :attribute no es válido'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return Response::json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => 'Datos Recibidos Incorrectos',
                    'errors' => $validator->messages()
                ], 400, [], JSON_PRETTY_PRINT);
            }

            $user = JWTAuth::parseToken()->authenticate();

            $user->assignRole($request->role_id);

            return Response::json([
                'code' => '200',
                'status'=> 'succes',
                'message' => 'Solicitud exitosa'
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

    public function assignRol(Request $request)
    {
        try {

            $user = User::find($request->user_id);

            $user->assignRole($request->role_id);

            return Response::json([
                'code' => '200',
                'status'=> 'succes',
                'message' => 'Solicitud exitosa'
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

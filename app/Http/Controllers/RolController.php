<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Response;

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
     * @access protected
     */
    public function __construct()
    {
        //estableciendo los permisos para el apartado habitación
        /* $this->middleware('permission:ver-habitacion|crear-habitacion|borrar-habitacion', ['only'=>['index']]);
        $this->middleware('permission:crear-habitacion', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-habitacion', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-habitacion', ['only'=>['destroy']]); */
    }

    public function getRoles()
    {
        try{

            $roles = Role::all();

            return Response::json([
                'code' => '200',
                'status'=> 'succes',
                'message' => 'Solicitud exitosa',
                'data' => $roles
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

    public function saveRol(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|unique:roles|max:255',
            ]);

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

    public function savePermissions(Request $request)
    {
        try {
            $role = Role::findOrFail($request->input('role_id'));

            // Obtén los permisos seleccionados desde el cliente
            $permissionNames = $request->input('permissions');

            // Asigna los permisos al rol
            $permissions = Permission::whereIn('name', $permissionNames)->get();
            $role->syncPermissions($permissions);

            // Opcional: Puedes realizar alguna acción adicional después de guardar los permisos, si es necesario

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

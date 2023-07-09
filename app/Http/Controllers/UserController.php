<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function assignRol(Request $request)
    {
        try{
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

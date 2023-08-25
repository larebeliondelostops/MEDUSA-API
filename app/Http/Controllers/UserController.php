<?php

namespace App\Http\Controllers;

use App\Http\Request\User\UserRequest;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Http\Request\Users\AssignRolRequest;
use App\Http\Request\Users\StoreRequest;
use Ramsey\Uuid\Uuid;

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
     * Metodo para obtener
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        try {
            $user = User::all();

            $transformedData = [];
            foreach ($user as $user) {
                $transformedData[] = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ];
            }

            return Response::json($transformedData, 201, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }


    public function getUser($id)
    {
        try {
            $user = User::find($id);
            $user->getRoleNames();

            return Response::json([
                'status' => 'succes',
                'data' => $user
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

    public function store(StoreRequest $request)
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

            if (isset($request->avatar)) {
                $photoFile = $request->file('avatar');
                $extension = $photoFile->getClientOriginalExtension();
                $filename = Uuid::uuid4()->toString() . '.' . $extension;
                $photoPath = $photoFile->storeAs('avatar', $filename, 'public');
            }


            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->address = $request->address;
            $user->avatar = $request->avatar != NULL ? $filename : NULL;
            $user->password = bcrypt($request->password);
            $user->save();
            $user->assignRole($request->role_id);

            return response()->json([
                'status' => 'success',
                'message' => 'Datos almacenados exitosamente'
            ], 201, [], JSON_PRETTY_PRINT);
        } catch (\Exception $exception) {
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
    public function update(Request $request,$id)
    {
        try {

            if (isset($request->avatar)) {
                $photoFile = $request->file('avatar');
                $extension = $photoFile->getClientOriginalExtension();
                $filename = Uuid::uuid4()->toString() . '.' . $extension;
                $photoPath = $photoFile->storeAs('avatar', $filename, 'public');
            }

            $user = User::find($id);
            $user->name = $request->name ?? $user->name;
            $user->email = $request->email ?? $user->email;
            $user->phone_number = $request->phone_number ?? $user->phone_number;
            $user->address = $request->address ?? $user->address;
            $user->avatar = $request->avatar != NULL ? $filename : $user->avatar;
            $user->password = bcrypt($request->password) ?? $user->password;
            if ($request->role_id) {
                $user->assignRole($request->role_id);
            }
            $user->save();

            return Response::json([
                'status' => 'succes',
                'data' => $user
            ], 201, [], JSON_PRETTY_PRINT);

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
     * Metodo para eliminar un centro de Entidades especifico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            return User::destroy($id);

            return Response::json([
                'status' => 'succes',
            ], 201, [], JSON_PRETTY_PRINT);
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

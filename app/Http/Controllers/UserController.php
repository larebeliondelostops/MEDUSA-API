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
use Illuminate\Support\Facades\Storage;

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
    public function all(Request $request)
    {
        try {

            $users = User::paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);

            $transformedData = [];
            foreach ($users as $user) {
                $transformedData[] = [
                    'ID' => $user->id,
                    'Nombre' => $user->name,
                    'Email' => $user->email,
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


    public function getUser($id)
    {
        try {
            $user = User::find($id);
            $user->avatar = env('APP_URL') . '/storage/avatar/' . $user->avatar;
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

    public function store(Request $request)
    {
        try {
    
            // Guardar el avatar (si existe)
            $imageName = null;
            if ($request->has('avatar')) {

                $image_64 = $request->avatar; //your base64 encoded data

                $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

                $replace = substr($image_64, 0, strpos($image_64, ',')+1); 

                // find substring fro replace here eg: data:image/png;base64,

                $image = str_replace($replace, '', $image_64); 

                $image = str_replace(' ', '+', $image); 

                $imageName = Uuid::uuid4()->toString().'.'.$extension;

                Storage::disk('public')->put('avatar/' . $imageName, base64_decode($image));
            }
    
            // Crear el usuario
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->address = $request->address;
            $user->avatar = $imageName;
            $user->password = bcrypt($request->password);
            $user->save();
            $user->assignRole($request->role_id);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Datos almacenados exitosamente',
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
    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return Response::json([
                    'status' => 'error',
                    'message' => 'Usuario no encontrado'
                ], 404, [], JSON_PRETTY_PRINT);
            }

            if (isset($request->avatar)) {

                $image_64 = $request->avatar; //your base64 encoded data

                $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

                $replace = substr($image_64, 0, strpos($image_64, ',')+1);

                // find substring fro replace here eg: data:image/png;base64,

                $image = str_replace($replace, '', $image_64); 

                $image = str_replace(' ', '+', $image);

                $imageName = Uuid::uuid4()->toString().'.'.$extension;

                Storage::disk('public')->put('avatar/' . $imageName, base64_decode($image));

                $user->avatar = $imageName;
            }

            $user->name = $request->input('name', $user->name);
            $user->email = $request->input('email', $user->email);
            $user->phone_number = $request->input('phone_number', $user->phone_number);
            $user->address = $request->input('address', $user->address);

            if ($request->has('password')) {
                $user->password = bcrypt($request->input('password'));
            }

            $user->save();            

            if ($request->has('role_id')) {
                // Elimina todos los roles existentes antes de asignar uno nuevo.
                $user->roles()->detach();
                
                $role = Role::find($request->input('role_id'));

                if ($role) {
                    $user->assignRole($role);
                } else {
                    return Response::json([
                        'status' => 'error',
                        'message' => 'Rol no encontrado'
                    ], 404, [], JSON_PRETTY_PRINT);
                }
            }

            return Response::json([
                'status' => 'success',
                'data' => $user
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tenant\Users\AssignRolRequest;
use App\Http\Requests\Tenant\Users\StoreRequest;
use App\Http\Requests\Tenant\Users\UserRequest;
use App\Models\User;
use App\Support\TenantLanguage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Spatie\Permission\Models\Role;

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
                    TenantLanguage::text('ID', 'ID') => $user->id,
                    TenantLanguage::text('Nombre', 'Name') => $user->name,
                    TenantLanguage::text('Email', 'Email') => $user->email,
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
                'message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request'),
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
                'data' => $user,
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request'),
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function store(Request $request)
    {
        try {
            $imageName = null;
            if ($request->has('avatar')) {
                $image_64 = $request->avatar;
                $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
                $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
                $image = str_replace($replace, '', $image_64);
                $image = str_replace(' ', '+', $image);
                $imageName = Uuid::uuid4()->toString() . '.' . $extension;

                Storage::disk('public')->put('avatar/' . $imageName, base64_decode($image));
            }

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
                'message' => TenantLanguage::text('Datos almacenados exitosamente', 'Data stored successfully'),
            ], 201, [], JSON_PRETTY_PRINT);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return response()->json([
                'code' => '1001',
                'status' => 'error',
                'message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request'),
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

            if (! $user) {
                return Response::json([
                    'status' => 'error',
                    'message' => TenantLanguage::text('Usuario no encontrado', 'User not found'),
                ], 404, [], JSON_PRETTY_PRINT);
            }

            if (isset($request->avatar)) {
                $image_64 = $request->avatar;
                $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
                $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
                $image = str_replace($replace, '', $image_64);
                $image = str_replace(' ', '+', $image);
                $imageName = Uuid::uuid4()->toString() . '.' . $extension;

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
                $user->roles()->detach();
                $role = Role::find($request->input('role_id'));

                if ($role) {
                    $user->assignRole($role);
                } else {
                    return Response::json([
                        'status' => 'error',
                        'message' => TenantLanguage::text('Rol no encontrado', 'Role not found'),
                    ], 404, [], JSON_PRETTY_PRINT);
                }
            }

            return Response::json([
                'status' => 'success',
                'data' => $user,
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => TenantLanguage::text('Error en la generación de la solicitud', 'Error generating the request'),
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
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request'),
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
        try {
            if (isset($request->validator) && $request->validator->fails()) {
                return Response::json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => TenantLanguage::text('Datos Recibidos Incorrectos', 'Invalid data received'),
                    'errors' => $request->validator->messages(),
                ], 400, [], JSON_PRETTY_PRINT);
            }

            $user = User::findOrFail($request->user_id);
            $role = Role::where('name', $request->rol_name)->first();

            if (! $role) {
                return Response::json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => TenantLanguage::text('Rol no encontrado', 'Role not found'),
                ], 404, [], JSON_PRETTY_PRINT);
            }

            $user->assignRole($role);

            return Response::json([
                'code' => '200',
                'status' => 'succes',
                'message' => TenantLanguage::text('Rol asignado correctamente', 'Role assigned successfully'),
            ], 201, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => TenantLanguage::text('Error En La Generacion De La Solicitud', 'Error generating the request'),
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
}

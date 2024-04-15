<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MobileDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use App\Http\Request\MobileDeviceRequest;
use Exception;

class NotificationAppController extends Controller
{

    public function addDevice(MobileDeviceRequest $request)
    {
        try {
            $deviceToken = $request->device_token;
            $username = $request->username;

            // Verificar si el usuario ya existe en la tabla
            $user = User::where('email', $username)->first();
            $mobileDevice = $user->mobileDevice;


            if(isset($mobileDevice)){
                $mobileDevice->update(['device_token' => $deviceToken]);

                return response()->json([
                    'status' => 'Éxito',
                    'message' => 'Token actualizado correctamente.',
                    'id_user' => $user->id
                ]);

            }else{

                MobileDevice::create([
                    'id_user' => $user->id,
                    'device_token' => $deviceToken,
                    'is_active' => true, // Puedes establecer el valor por defecto según tus necesidades
                    'position' => null,
                    'is_active_position' => false,
                ]);

                return response()->json([
                    'status' => 'Éxito',
                    'message' => 'Dispositivo agregado correctamente.',
                    'id_user' => $user->id
                ]);
            }
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
        
    }
    
    public function getDeviceInfo($username)
    {
        try {
            $user = user::where('email', $username)->first();
            $mobileDevice = $user->mobileDevice;

            if(isset($mobileDevice)){
                return response()->json([
                    'status' => 'Éxito',
                    'message' => 'Información del dispositivo obtenida correctamente.',
                    'device_info' => [
                        'id_user' => $mobileDevice->id_user,
                        'device_token' => $mobileDevice->device_token,
                        'is_active' => $mobileDevice->is_active,
                        'position' => $mobileDevice->position,
                        'is_active_position' => $mobileDevice->is_active_position,
                    ],
                ]);
            }else{
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Usuario no encontrado.',
                ], 404);
            }
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function updateNotificationStatus(Request $request)
    {
        try {
            // Obtener el valor del toggle switch desde la solicitud
            $isActive = $request->is_active;
            $username = $request->username;
            
            $user = User::where('email', $username)->first();
            $mobileDevice = $user->mobileDevice;

            if(isset($mobileDevice)){
                $mobileDevice->update(['is_active' => $isActive]);

                return response()->json([
                    'status' => 'Éxito',
                    'message' => 'Estado de notificación actualizado correctamente.',
                    'is_active' => $isActive,
                ]);
            }else{
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Usuario no encontrado.',
                ], 404);
            }
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
    
    public function sendNotification(Request $request)
    {
        try {
            $message = $request->input('message');

            // Obtener los device_token de la tabla mobile_devices con is_active en true
            $activeDevices = MobileDevice::where('is_active', true)->pluck('device_token');

            if ($activeDevices->isEmpty()) {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'No hay dispositivos activos para enviar notificaciones.',
                ], 404);
            }

            $serverKey = 'AAAAwKUxfuE:APA91bHBsLw3qq2gDII6-0-oc6iVG16O3RuAE9UbXgyT6jterpMfMqBZBqw1DOGzCVk2mVosWay1pxF3Bnvh-6RnJ54vcScpPLYet09bO76wAZJV03rPFnWsmtokBD1ZNBdtQ6Ot7GrL';
            $fcmEndpoint = 'https://fcm.googleapis.com/fcm/send';

            $responses = [];

            foreach ($activeDevices as $deviceToken) {
                $notificationData = [
                    'to' => $deviceToken,
                    'notification' => [
                        'title' => 'Nueva notificación',
                        'body' => $message,
                    ],
                    'data' => [
                        'notifee' => [
                            'title' => 'Nueva notificación',
                            'body' => $message,
                        ],
                    ],
                ];

                $response = Http::withHeaders([
                    'Authorization' => 'key=' . $serverKey,
                    'Content-Type' => 'application/json',
                ])->post($fcmEndpoint, $notificationData);

                $status = $response->status();
                $content = $response->json();
                $statusCode = $response->getStatusCode();

                $responses[] = [
                    'deviceToken' => $deviceToken,
                    'message' => $message,
                    'status' => 'Notificación enviada',
                    'response' => [
                        'status' => $status,
                        'content' => $content,
                        'statusCode' => $statusCode,
                    ],
                ];
            }

            return response()->json([
                'status' => 'Success',
                'message' => 'Notificaciones enviadas a dispositivos activos.',
                'responses' => $responses,
            ]);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function updatePosition(Request $request)
    {
        try {
            $position = $request->input('position');
            $id = $request->input('id_user');

            $user = User::find($id);
            $mobileDevice = $user->mobileDevice;

            if(isset($mobileDevice)){
                $mobileDevice->update(['position' => $position]);

                return response()->json([
                    'status' => 'Éxito',
                    'message' => 'Posición actualizada correctamente.',
                    'position' => $position,
                ]);
            }else{
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Usuario no encontrado.',
                ], 404);
            }
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function updateStatusTransfer(Request $request)
    {
        try {
            $is_active_position = $request->input('is_active_position');
            $id = $request->input('id_user');

            $user = User::find($id);
            $mobileDevice = $user->mobileDevice;

            if(isset($mobileDevice)){
                $mobileDevice->update(['is_active_position' => $is_active_position]);

                return response()->json([
                    'status' => 'Éxito',
                    'message' => 'Posición actualizada correctamente.',
                ]);
            }else{
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Usuario no encontrado.',
                ], 404);
            }
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        } 
    }

    //funcion para enviar todas las posiciones cuando is_active_position es true

    public function AllPosition()
    {
        try {
            $activeDevices = MobileDevice::where('is_active_position', true)->whereNotNull(['latitude', 'longitude'])->orderBy('id')->get()/* ->pluck('position', 'id') */;

            $arrayOfArrays = $activeDevices->map(function ($item) {

                return ['id' => $item->id, 'position' => [$item->latitude, $item->longitude]];

            })->toArray();

            $positions = [];

            $positions = $arrayOfArrays;

            if (tenant('id') == 'ditra')
            {
                $positions = array_merge($positions, MovementEntitiesController::avlPosition());
            } else if (tenant('id') == 'villavicencio') {
                $positions = array_merge($positions, MovementEntitiesController::villavoPosition());
            }

            return Response::json($positions, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
    
    public function allUnits()
    {
        try {
            $moviles = MobileDevice::where('is_active_position', true)->whereNotNull(['latitude', 'longitude'])->orderBy('id')->get();
            
            $transformedData = [];

            foreach ($moviles as $movil) {

                    $transformedData[] = [
                        'markerType' => 54,
                        'id' => $movil->id,
                        'title' => $movil->user->name,
                        'unitType' => 3,
                        'geometry' => [
                            'type' => "Point",
                            'coordinates' => [$movil->latitude, $movil->longitude]
                        ],
                        'properties' => [
                            'active' => $movil->is_active_position
                        ]
                    ];
            }

            if (tenant('id') == 'ditra')
            {
                $transformedData = array_merge($transformedData, MovementEntitiesController::avlUnits());
            } else if (tenant('id') == 'villavicencio') {
                $transformedData = array_merge($transformedData, MovementEntitiesController::villavoUnits());
            }

            return Response::json($transformedData, 200, [], JSON_PRETTY_PRINT);
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
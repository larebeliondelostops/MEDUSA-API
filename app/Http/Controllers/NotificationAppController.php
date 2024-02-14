<?php

namespace App\Http\Controllers;

use App\Http\Request\MobileDeviceRequest;
use Illuminate\Support\Facades\Http;
use App\Models\MobileDevice;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationAppController extends Controller
{

    public function addDevice(MobileDeviceRequest $request)
    {
        $deviceToken = $request->device_token;
        $username = $request->username;
        
        // Verificar si el usuario ya existe en la tabla
        $user = User::where('username', $username)->first();
        $mobileDevice = $user->mobileDevice;


        if(isset($mobileDevice)){
            $mobileDevice->update(['device_token' => $deviceToken]);

            return response()->json([
                'status' => 'Éxito',
                'message' => 'Token actualizado correctamente.',
                'device_info' => [
                    'id_user' => $user->id,
                ],
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
                'device_info' => [
                    'id_user' => $user->id,
                ],
            ]);
        }
    }
    
    public function getDeviceInfo($username)
    {
        $user = user::where('username', $username)->first();
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

    }

    public function updateNotificationStatus(Request $request)
    {
        // Obtener el valor del toggle switch desde la solicitud
        $isActive = $request->is_active;
        $username = $request->username;
        
        $user = User::where('username', $username)->first();
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
    }
    
    public function sendNotification(Request $request)
    {
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
    }

    public function updatePosition(Request $request)
    {
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
    }

    //funcion para enviar todas las posiciones cuando is_active_position es true

    public function AllPosition()
    {
        $activeDevices = MobileDevice::where('is_active_position', true)->get()->pluck('position');

        if ($activeDevices->isEmpty()) {
            return response()->json([
                'status' => 'Error',
                'message' => 'No hay dispositivos activos para enviar posiciones.',
            ], 404);
        }

        return response()->json([
            'status' => 'Éxito',
            'message' => 'Posiciones enviadas correctamente.',
            'positions' => $activeDevices,
        ]);
    }
    
}
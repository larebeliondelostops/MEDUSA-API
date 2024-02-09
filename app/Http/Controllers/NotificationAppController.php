<?php

namespace App\Http\Controllers;

use App\Http\Request\MobileDeviceRequest;
use Illuminate\Support\Facades\Http;
use App\Models\MobileDevice;
use Illuminate\Http\Request;

class NotificationAppController extends Controller
{
    public function getDeviceInfo($username)
    {
        // Buscar el dispositivo por el nombre de usuario
        $device = MobileDevice::where('username', $username)->first();

        if (!$device) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Usuario no encontrado.',
            ], 404);
        }

        // Devolver la información del dispositivo
        return response()->json([
            'status' => 'Éxito',
            'message' => 'Información del dispositivo obtenida correctamente.',
            'device_info' => [
                'device_token' => $device->device_token,
                'is_active' => $device->is_active,
            ],
        ]);
    }

    public function updateNotificationStatus(Request $request)
    {
        // Obtener el valor del toggle switch desde la solicitud
        $isActive = $request->is_active;
        $username = $request->username;
        

        // Buscar el dispositivo por el nombre de usuario
        $device = MobileDevice::where('username', $username)->first();

        if (!$device) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Usuario no encontrado.',
            ], 404);
        }

        // Actualizar el estado is_active según el valor del toggle switch
        $device->update([
            'is_active' => $isActive,
        ]);

        return response()->json([
            'status' => 'Éxito',
            'message' => 'Estado de notificación actualizado correctamente.',
            'is_active' => $isActive,
        ]);
    }

    public function addDevice(MobileDeviceRequest $request)
    {
        $deviceToken = $request->device_token;
        $username = $request->username;
        
        // Verificar si el usuario ya existe en la tabla
        $existingDevice = MobileDevice::where('username', $username)->first();
        
        if (!$existingDevice) {
            // El usuario no existe, se crea una nueva tupla
            MobileDevice::create([
                'username' => $username,
                'device_token' => $deviceToken,
                'is_active' => true, // Puedes establecer el valor por defecto según tus necesidades
            ]);

            return response()->json([
                'status' => 'Dispositivo agregado',
                'message' => 'Usuario no existente, se creó una nueva tupla.',
            ]);
        }

        // El usuario ya existe, verificar el device_token
        if ($existingDevice->device_token !== $deviceToken) {
            
            // El device_token es diferente, actualizarlo
            $existingDevice->update([
                'device_token' => $deviceToken,
            ]);

            return response()->json([
                'status' => 'Dispositivo actualizado',
                'message' => 'Usuario existente, se actualizó el device_token.',
            ]);
        }

        // El device_token es el mismo, no se hace nada
        return response()->json([
            'status' => 'Sin cambios',
            'message' => 'Usuario existente y device_token coincidente.',
        ]);
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
}
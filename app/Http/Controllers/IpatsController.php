<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Ipats;
use App\Strategies\Interface\PointsInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class IpatsController extends Controller
{

    public static function SaveIpats()
    {
        try {
            // Obtener URL del endpoint desde la variable de entorno
            $endpointUrl = env('ENDPOINT_IPATS');

            // Obtener datos del endpoint
            $endpointData = file_get_contents($endpointUrl);
            
            // Decodificar datos JSON
            $ipatsData = json_decode($endpointData);

            // Mapeo de nombres de indicadores a IDs
            $indicatorMapping = [
                'Caída de ocupante' => 11,
                'Choque' => 12,
                'Atropello' => 13,
                'Volcamiento' => 14,
                'Otro' => 15, 
            ];
         
            // Iterar sobre los datos y guardar en la base de datos si no existen
            foreach ($ipatsData as $data) {
                $fecha = str_replace(' :00', '00:00', $data->fecha); 
                // Convertir la fecha a un formato válido
                $fechaValida = Carbon::parse($fecha)->toDateTimeString();
                // Obtener el ID del indicador a partir del mapeo
                $indicatorId = $indicatorMapping[$data->indicador] ?? 15;
                $existingIpats = Ipats::where('id_ipat', $data->id_ipat)->exists();
                if (!$existingIpats) {
                    Ipats::create([
                        'uuid' => str::uuid(),
                        'id_agent' => $data->id_agente,
                        'id_ipat' => $data->id_ipat,
                        'injured' => $data->lesionados,
                        'victims' => $data->victimas,
                        'coordinates' => $data->georeferencia,
                        'agent_name' => $data->nombre_agente,
                        'indicator' => $indicatorId,
                        'date_ipat' => $fechaValida,
                        'hypothesis' => $data->hipotesis,
                    ]);
                }
            
            }
    
            return Response::json([
                'code' => '200',
                'status' => 'success',
                'message' => 'Datos guardados exitosamente en la base de datos'
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error al guardar los datos en la base de datos'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
}

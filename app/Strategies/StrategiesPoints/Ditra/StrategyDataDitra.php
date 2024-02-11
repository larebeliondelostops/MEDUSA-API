<?php

namespace App\Strategies\StrategiesPoints\Ditra;

use Exception;
use App\Models\DataDitra;
use App\Strategies\Interface\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class StrategyDataDitra implements PointsInterface
{
     /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $dataDitra = dataDitra::all();

            $dataDitra = $dataDitra->map(function ($item) {

                $coordinates = explode(', ', $item->coordinates);

                $coordinates = array_map('floatval', $coordinates);

                $dataDitra = [
                    'markerType' => 1,
                    'id' => $item->uuid,
                    'geometry' => [
                        'type' => "Point",
                        'coordinates' => $coordinates
                    ]
                ];

                return $dataDitra;
            });

            return $dataDitra;
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public static function getInfoPoint($uuid)
    {
        try {
            $dataDitra = dataDitra::where('uuid', $uuid)->first();

            $dataDitra = [
                'title' => $dataDitra->type,
                'properties' => [
                    'Año' => $dataDitra->year,
                    'Fecha de ocurrencia' => $dataDitra->occurrence_date,
                    'Mes' => $dataDitra->month,
                    'Dia' => $dataDitra->day,
                    'Hora' => $dataDitra->hour,
                    'Rango de hora' => $dataDitra->hour_range,
                    'Seccional' => $dataDitra->sectional,
                    'Asignado' => $dataDitra->assigned,
                    'Identificación' => $dataDitra->identification,
                    'Grado' => $dataDitra->grade,
                    'Nombres' => $dataDitra->names,
                    'Apellidos' => $dataDitra->last_names,
                    'Edad' => $dataDitra->age,
                    'Rango de edad' => $dataDitra->age_range,
                    'Genero' => $dataDitra,
                    'Estado civil' => $dataDitra->marital_status,
                    'Intoxicación' => $dataDitra->intoxication,
                    'Responsabilidad' => $dataDitra->responsibility,
                    'Placa' => $dataDitra->plate,
                    'Clase de vehículo' => $dataDitra->vehicle_class,
                    'Modelo' => $dataDitra->model,
                    'Cilindraje' => $dataDitra->cc,
                    'Clase de servicio' => $dataDitra->service_class,
                    'Seguro' => $dataDitra->insurance,
                    'Inspección' => $dataDitra->inspection,
                    'Licencia' => $dataDitra->license,
                    'Tipo' => $dataDitra->type,
                    'Hipótesis' => $dataDitra->hypothesis,
                    'Posible ocurrencia' => $dataDitra->possible_occurrence,
                ]
            ];
            return $dataDitra;
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
}

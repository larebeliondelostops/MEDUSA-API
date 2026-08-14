<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Stancl\Tenancy\Concerns\TenantAwareCommand;
use Exception;
use App\Models\Villavicencio\Ipats;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class SaveIpats extends Command
{
    use TenantAwareCommand;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:ipats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
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

            // Iterar sobre los datos y guardar en la base de datos si no existen, o actualizarlos si ya existen
            foreach ($ipatsData as $data) {
                $fecha = str_replace(' :00', '00:00', $data->fecha);
                // Convertir la fecha a un formato válido
                $fechaValida = Carbon::parse($fecha)->toDateTimeString();
                // Obtener el ID del indicador a partir del mapeo
                $indicatorId = $indicatorMapping[$data->indicador] ?? 15;
                $existingIpats = Ipats::where('id_ipat', $data->id_ipat)->first();
                if ($existingIpats) {
                    // Actualizar el registro existente con las coordenadas normalizadas si es necesario
                    $normalizedCoordinates = $this->normalizeCoordinates($data->georeferencia);
                    if ($normalizedCoordinates !== null) {
                        $existingIpats->update([
                            'id_agent' => $data->id_agente,
                            'injured' => $data->lesionados,
                            'victims' => $data->victimas,
                            'latitude' => explode(',', $normalizedCoordinates)[0],
                            'longitude' => explode(',', $normalizedCoordinates)[1],
                            'agent_name' => $data->nombre_agente,
                            'indicator' => $indicatorId,
                            'date_ipat' => $fechaValida,
                            'hypothesis' => $data->hipotesis,
                        ]);
                    } else {
                        // Logear el error de coordenadas no válidas
                        //Log::error('Coordenadas no válidas: ' . $data->georeferencia);
                    }
                } else {
                    // Normalizar las coordenadas y crear el registro en la base de datos si no existe
                    $normalizedCoordinates = $this->normalizeCoordinates($data->georeferencia);
                    if ($normalizedCoordinates !== null) {
                        Ipats::create([
                            'uuid' => Str::uuid(),
                            'id_agent' => $data->id_agente,
                            'id_ipat' => $data->id_ipat,
                            'injured' => $data->lesionados,
                            'victims' => $data->victimas,
                            'latitude' => explode(',', $normalizedCoordinates)[0],
                            'longitude' => explode(',', $normalizedCoordinates)[1],
                            'agent_name' => $data->nombre_agente,
                            'indicator' => $indicatorId,
                            'date_ipat' => $fechaValida,
                            'hypothesis' => $data->hipotesis,
                        ]);
                    } else {
                        // Logear el error de coordenadas no válidas
                        //Log::error('Coordenadas no válidas: ' . $data->georeferencia);
                    }
                }
            }
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
        }
    }

    public function normalizeCoordinates($coordinates)
    {
        // Expresión regular para extraer los números decimales y el signo negativo
        $pattern = '/(-?\d+(\.\d+)?),\s*(-?\d+(\.\d+)?)/';

        // Buscar coincidencias en las coordenadas
        preg_match($pattern, $coordinates, $matches);

        // Si se encuentran coincidencias
        if (count($matches) >= 5) {
            // Extraer los valores encontrados
            $latitude = $matches[1];
            $longitude = $matches[3];

            // Formatear las coordenadas según el formato requerido
            $formattedCoordinates = number_format(floatval($latitude), 5, '.', '') . ', ' . number_format(floatval($longitude), 5, '.', '');

            return $formattedCoordinates;
        }

        // Si no se encuentran coincidencias, devolver null
        return null;
    }

    protected function getTenants()
    {
        return Tenant::where('id', 'villavicencio')->get();
    }
}

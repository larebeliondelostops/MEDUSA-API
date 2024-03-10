<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Alert\AlertDTO;
use App\Interfaces\Viper\AlertInterface;
use App\Models\Viper\Alert;
use Exception;

/**
 * Servicio de manejo de alertas en el sistema Viper.
 *
 * Implementa la interfaz AlertInterface para definir las operaciones necesarias
 * para la gestión de alertas.
 *
 * @package App\Services\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class AlertService implements AlertInterface{
    
    /**
     * Crea una nueva alerta en el sistema.
     *
     * @param AlertDTO $alertDTO Datos de la alerta a crear.
     * @return AlertDTO Datos de la nueva alerta creada.
     */
    public function createNewAlert(AlertDTO $alertDTO): AlertDTO
    {
        $alert = new Alert($alertDTO->toArray());
        $alert->save();
        
        return new AlertDTO($alert->toArray());
    }

    /**
     * Actualiza una alerta existente en el sistema.
     *
     * @param AlertDTO $alertDTO Datos actualizados de la alerta.
     * @param int $id Identificador de la alerta a actualizar.
     * @return AlertDTO Datos de la alerta actualizada.
     * @throws Exception Si la alerta no se encuentra.
     */
    public function updateAlert(AlertDTO $alertDTO, int $id): AlertDTO
    {
        $alert = Alert::findOrFail($id);
        $alert->fill($alertDTO->toArray());
        $alert->save();
        
        return new AlertDTO($alert->toArray());
    }

    /**
     * Obtiene todas las alertas asociadas a un indicador específico.
     *
     * @param int $indicatorId Identificador del indicador.
     * @return array Colección de AlertDTO representando las alertas asociadas al indicador.
     */
    public function getAllAlertsByIndicator(int $indicatorId): array
    {
        $alerts = Alert::where('indicator_id', $indicatorId)->get();
    
        $alertDTOs = $alerts->map(function ($alert) {
            return new AlertDTO($alert->toArray());
        })->all();
    
        return $alertDTOs;
    }

    /**
     * Obtiene los datos de una alerta específica por su identificador.
     *
     * @param int $id Identificador de la alerta.
     * @return AlertDTO Datos de la alerta solicitada.
     * @throws Exception Si la alerta no se encuentra.
     */
    public function getAlert(int $id): AlertDTO
    {
        $alert = Alert::findOrFail($id);
        
        return new AlertDTO($alert->toArray());
    }

    /**
     * Elimina una alerta específica por su identificador.
     *
     * @param int $id Identificador de la alerta a eliminar.
     * @return AlertDTO Datos de la alerta eliminada.
     * @throws Exception Si la alerta no se encuentra.
     */
    public function deleteAlert(int $id): AlertDTO
    {
        $alert = Alert::findOrFail($id);
        $alertDTO = new AlertDTO($alert->toArray());
        $alert->delete();

        return $alertDTO;
    }
}

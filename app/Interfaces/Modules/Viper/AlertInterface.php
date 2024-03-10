<?php

namespace App\Interfaces\Modules\Viper;

use App\DTOs\Viper\Alert\AlertDTO;

/**
 * Interfaz para gestionar operaciones relacionadas con las alertas en el sistema Viper.
 *
 * @package App\Interfaces\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
interface AlertInterface {

    /**
     * Crea una nueva alerta.
     *
     * @param AlertDTO $alertDTO La información de la alerta a ser creada.
     * @return AlertDTO La alerta creada.
     */
    public function createNewAlert(AlertDTO $alertDTO): AlertDTO;

    /**
     * Actualiza una alerta existente.
     *
     * @param AlertDTO $alertDTO La información de la alerta a ser actualizada.
     * @param int $id El identificador único de la alerta a ser actualizada.
     * @return AlertDTO La alerta actualizada.
     */
    public function updateAlert(AlertDTO $alertDTO, int $id): AlertDTO;

    /**
     * Obtiene todas las alertas asociadas a un indicador específico.
     *
     * @param int $indicatorId El identificador único del indicador.
     * @return array Un array de objetos AlertDTO.
     */
    public function getAllAlertsByIndicator(int $indicatorId): array;

    /**
     * Obtiene los detalles de una alerta específica.
     *
     * @param int $id El identificador único de la alerta.
     * @return AlertDTO La información de la alerta.
     */
    public function getAlert(int $id): AlertDTO;

    /**
     * Elimina una alerta específica.
     *
     * @param int $id El identificador único de la alerta a ser eliminada.
     * @return AlertDTO La alerta eliminada.
     */
    public function deleteAlert(int $id): AlertDTO;
}

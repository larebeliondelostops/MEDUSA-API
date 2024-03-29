<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

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
     * @param Collection $alert La información de la alerta a ser creada.
     * @return Collection La alerta creada.
     */
    public function createNewAlert(Collection $alert): Collection;

    /**
     * Actualiza una alerta existente.
     *
     * @param Collection $alert La información de la alerta a ser actualizada.
     * @param int $id El identificador único de la alerta a ser actualizada.
     * @return Collection La alerta actualizada.
     */
    public function updateAlert(Collection $alert, int $id): Collection;

    /**
     * Obtiene todas las alertas asociadas a un indicador específico.
     *
     * @param int $indicatorId El identificador único del indicador.
     * @return Collection Collection de Collections que contiene la información de una alerta de un inidicador.
     */
    public function getAllAlertsByIndicator(int $indicatorId): Collection;

    /**
     * Obtiene todas las alertas asociadas a un projecto específico.
     *
     * @param int $projectId El identificador único del projecto.
     * @return Collection Collection de Collections que contiene la información de una alerta de un projecto.
     */
    public function getAllAlertsByProject(int $projectId): Collection;

    /**
     * Obtiene los detalles de una alerta específica.
     *
     * @param int $id El identificador único de la alerta.
     * @return Collection La información de la alerta.
     */
    public function getAlert(int $id): Collection;

    /**
     * Elimina una alerta específica.
     *
     * @param int $id El identificador único de la alerta a ser eliminada.
     * @return Collection La alerta eliminada.
     */
    public function deleteAlert(int $id): Collection;
}

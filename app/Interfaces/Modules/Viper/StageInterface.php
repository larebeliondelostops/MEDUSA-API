<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

/**
 * Interface StageInterface
 *
 * Esta interfaz define los métodos que deben ser implementados por cualquier clase que actúe como servicio
 * para la manipulación de las etapas de un proyecto en el sistema Viper.
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */

interface StageInterface {
    
    /**
     * Obtener todas las etapas existentes.
     *
     * @return Collection Colección de Collection que representan las etapas.
     * @return Collection Collection que representa todas las etapas.
     */
    public function getAllStages(): Collection;

    /**
     * Almacenar una nueva etapa en el sistema.
     *
     * @param Collection $stage Collection que contiene los datos de la nueva etapa.
     * @return Collection Collection que representa la etapa recién creada.
     */
    public function storeStage(Collection $stage): Collection;

    /**
     * Actualizar los datos de una etapa existente.
     *
     * @param  int  $stageId Identificador único de la etapa que se va a actualizar.
     * @param Collection Collection que contiene los nuevos datos de la etapa.
     * @return Collection Collection que representa la etapa actualizada.
     */
    public function updateStage(int $stageId, Collection $stage): Collection;

    /**
     * Eliminar una etapa existente.
     *
     * @param  int  $stageId Identificador único de la etapa que se va a eliminar.
     * @return Collection Collection que representa la etapa eliminada.
     */
    public function deleteStage(int $stageId);

}

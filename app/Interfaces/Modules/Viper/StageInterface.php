<?php

namespace App\Interfaces\Modules\Viper;

use App\DTOs\Viper\Stage\StageDTO;

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
     * @return \Illuminate\Support\Collection|StageDTO[] Colección de objetos StageDTO que representan las etapas.
     */
    public function getAllStages();

    /**
     * Almacenar una nueva etapa en el sistema.
     *
     * @param  \App\DTOs\Viper\Stage\StageDTO  $stageDTO Objeto StageDTO que contiene los datos de la nueva etapa.
     * @return \App\DTOs\Viper\Stage\StageDTO Objeto StageDTO que representa la etapa recién creada.
     */
    public function storeStage(StageDTO $stageDTO);

    /**
     * Actualizar los datos de una etapa existente.
     *
     * @param  int  $stageId ID de la etapa que se va a actualizar.
     * @param  \App\DTOs\Viper\Stage\StageDTO  $stageDTO Objeto StageDTO que contiene los nuevos datos de la etapa.
     * @return \App\DTOs\Viper\Stage\StageDTO Objeto StageDTO que representa la etapa actualizada.
     * @throws \Exception Se arroja si la etapa no se encuentra.
     */
    public function updateStage($stageId, StageDTO $stageDTO);

    /**
     * Eliminar una etapa existente.
     *
     * @param  int  $stageId ID de la etapa que se va a eliminar.
     * @return void
     * @throws \Exception Se arroja si la etapa no se encuentra.
     */
    public function deleteStage($stageId);

}

<?php

namespace App\Interfaces\Modules\Viper;

use App\DTOs\Viper\Substate\SubstateDTO;

/**
 * Interface SubstateInterface
 *
 * Esta interfaz define los métodos que deben ser implementados por cualquier close que actúe como servicio
 * para la manipulación de los subestados de un proyecto en el sistema Viper.
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */

interface SubstateInterface {

    /**
     * Obtener todos los subestados existentes.
     *
     * @return \Illuminate\Support\Collection|SubstateDTO[] Colección de objetos SubstateDTO que representan los subestados.
     */
    public function getAllSubstates();

    /**
     * Almacenar un nuevo subestado en el sistema.
     *
     * @param  \App\DTOs\Viper\Substate\SubstateDTO  $substateDTO Objeto SubstateDTO que contiene los datos de la nueva subestado.
     * @return \App\DTOs\Viper\Substate\SubstateDTO Objeto SubstateDTO que representa la subestado recién creada.
     */
    public function storeSubstate(SubstateDTO $substateDTO);

    /**
     * Actualizar los datos de un subestado existente.
     *
     * @param  int  $substateId ID de la subestado que se va a actualizar.
     * @param  \App\DTOs\Viper\Substate\SubstateDTO  $substateDTO Objeto SubstateDTO que contiene los nuevos datos de la subestado.
     * @return \App\DTOs\Viper\Substate\SubstateDTO Objeto SubstateDTO que representa la subestado actualizada.
     * @throws \Exception Se arroja si la subestado no se encuentra.
     */
    public function updateSubstate($substateId, SubstateDTO $substateDTO);

    /**
     * Eliminar un subestado existente.
     *
     * @param  int  $substateId ID del subestado que se va a eliminar.
     * @return void
     * @throws \Exception Se arroja si el subestado no se encuentra.
     */
    public function deleteSubstate($substateId);

    /**
     * Obtener todos los subestados existentes por estado.
     *
     * @return \Illuminate\Support\Collection|SubstateDTO[] Colección de objetos SubstateDTO que representan los subestados.
     */
    public function getAllSubstatesByState(int $stateId);

    public function getSubstateById(int $id): SubstateDTO;

}

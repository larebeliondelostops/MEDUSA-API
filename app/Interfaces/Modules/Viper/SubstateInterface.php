<?php

namespace App\Interfaces\Modules\Viper;
use Illuminate\Support\Collection;


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
     * @return \Illuminate\Support\Collection Colección de objetos SubstateData que representan los subestados.
     */
    public function getAllSubstates() : Collection;

    /**
     * Almacenar un nuevo subestado en el sistema.
     *
     * @param  \Illuminate\Support\Collection  $substateData Objeto SubstateData que contiene los datos de la nueva subestado.
     * @return \Illuminate\Support\Collection Objeto SubstateData que representa la subestado recién creada.
     */
    public function storeSubstate(Collection $substateData) : Collection;

    /**
     * Actualizar los datos de un subestado existente.
     *
     * @param  int  $substateId ID de la subestado que se va a actualizar.
     * @param  \Illuminate\Support\Collection  $substateData Objeto SubstateData que contiene los nuevos datos de la subestado.
     * @return \Illuminate\Support\Collection Objeto SubstateData que representa la subestado actualizada.
     * @throws \Exception Se arroja si la subestado no se encuentra.
     */
    public function updateSubstate(int $substateId, Collection $substateData) : Collection;

    /**
     * Eliminar un subestado existente.
     *
     * @param  int  $substateId ID del subestado que se va a eliminar.
     * @return void
     * @throws \Exception Se arroja si el subestado no se encuentra.
     */
    public function deleteSubstate(int $substateId);

    /**
     * Obtener todos los subestados existentes por estado.
     *
     * @return \Illuminate\Support\Collection Colección de objetos SubstateData que representan los subestados.
     */
    public function getAllSubstatesByState(int $stateId) : Collection;

    public function getSubstateById(int $id): Collection;

}

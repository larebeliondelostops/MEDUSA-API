<?php

namespace App\Interfaces\Viper;
use App\DTOs\Viper\State\StateDTO;

/**
 * Interfaz para la gestión de estados en el módulo VIPER.
 *
 * Define los métodos necesarios para la creación, recuperación, actualización y eliminación de estados,
 * así como para obtener listados de estos. Estos métodos serán implementados por la clase que gestione la lógica de negocios.
 *
 * @package    App\Interfaces\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v1.0.2
 */
interface StateInterface
{
    /**
     * Crea un nuevo estado.
     *
     * @param StateDTO $stateDTO DTO con la información del estado a crear.
     * @return StateDTO DTO del estado creado.
     */
    public function createNewState(StateDTO $stateDTO): StateDTO;

    /**
     * Obtiene un estado por su ID.
     *
     * @param int $id Identificador del estado.
     * @return StateDTO DTO del estado solicitado.
     */
    public function getStateById(int $id) : StateDTO;

    /**
     * Actualiza un estado existente.
     *
     * @param int $id Identificador del estado a actualizar.
     * @param StateDTO $stateDTO DTO con la información actualizada del estado.
     * @return StateDTO DTO del estado actualizado.
     */
    public function updateState(int $id, StateDTO $stateDTO) : StateDTO;

    /**
     * Elimina un estado.
     *
     * @param int $id Identificador del estado a eliminar.
     * @return StateDTO DTO del estado eliminado.
     */
    public function deleteState(int $id) : StateDTO;

    /**
     * Obtiene todos los estados disponibles.
     *
     * @return array Arreglo de DTOs de todos los estados.
     */
    public function getAllStates() : array;

    /**
     * Obtiene un listado detallado de todos los estados.
     *
     * @return array Arreglo de DTOs con detalles de todos los estados.
     */
    public function getAllStatesDetail() : array;
}

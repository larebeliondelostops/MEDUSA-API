<?php

namespace App\Interfaces\Viper;
use Illuminate\Support\Collection;

/**
 * Interfaz para la gestión de estados en el módulo VIPER.
 *
 * Define los métodos necesarios para la creación, recuperación, actualización y eliminación de estados,
 * así como para obtener listados de estos. Estos métodos serán implementados por la clase que gestione la lógica de negocios.
 *
 * @package    App\Interfaces\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v2.0.0
 */
interface StateInterface
{
    /**
     * Crea un nuevo estado.
     *
     * @param Collection $state Collection con la información del estado a crear.
     * @return Collection DTO del estado creado.
     */
    public function createNewState(Collection $state): Collection;

    /**
     * Obtiene un estado por su ID.
     *
     * @param int $id Identificador del estado.
     * @return Collection Collection del estado solicitado.
     */
    public function getStateById(int $id) : Collection;

    /**
     * Actualiza un estado existente.
     *
     * @param int $id Identificador del estado a actualizar.
     * @param Collection $state Collection con la información actualizada del estado.
     * @return Collection Collection del estado actualizado.
     */
    public function updateState(int $id, Collection $state) : Collection;

    /**
     * Elimina un estado.
     *
     * @param int $id Identificador del estado a eliminar.
     * @return Collection Collection del estado eliminado.
     */
    public function deleteState(int $id) : Collection;

    /**
     * Obtiene todos los estados disponibles.
     *
     * @return Collection Collection de Collections de todos los estados.
     */
    public function getAllStates() : Collection;

    /**
     * Obtiene un listado detallado de todos los estados.
     *
     * @return Collection Collection de Collections con detalles de todos los estados.
     */
    public function getAllStatesDetail() : Collection;
}

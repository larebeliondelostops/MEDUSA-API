<?php

namespace App\Interfaces\Viper;
use App\DTOs\Viper\Municipality\MunicipalityDTO;

/**
 * Interfaz para la gestión de municipios en el módulo VIPER.
 *
 * Define los métodos necesarios para la creación, recuperación, actualización y eliminación de municipios.
 * Estos métodos serán implementados por la clase que gestione la lógica de negocio relacionada con los municipios.
 *
 * @package    App\Interfaces\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v1.0.2
 */
interface MunicipalityInterface
{
    /**
     * Crea un nuevo municipio.
     *
     * @param MunicipalityDTO $municipalityDTO DTO con la información del municipio a crear.
     * @return MunicipalityDTO DTO del municipio recién creado.
     */
    public function createNewMunicipality(MunicipalityDTO $municipality): MunicipalityDTO;

    /**
     * Obtiene todos los municipios disponibles.
     *
     * Puede recibir parámetros de filtro para la consulta.
     *
     * @param array $queryFilterParams Parámetros opcionales para filtrar la consulta.
     * @return array Arreglo de MunicipalityDTO de todos los municipios.
     */
    public function getAllMunicipalities(array $queryFilterParams = []) : array;

    /**
     * Obtiene un municipio por su ID.
     *
     * @param int $id Identificador del municipio.
     * @return MunicipalityDTO DTO del municipio solicitado.
     */
    public function getMunicipalityById(int $id) : MunicipalityDTO;

    /**
     * Actualiza un municipio existente.
     *
     * @param MunicipalityDTO $municipalityDTO DTO con la nueva información del municipio.
     * @param int $id ID del municipio a actualizar.
     * @return MunicipalityDTO DTO del municipio actualizado.
     */
    public function updateMunicipality(MunicipalityDTO $municipalityDTO, int $id): MunicipalityDTO;

    /**
     * Elimina un municipio.
     *
     * @param int $id ID del municipio a eliminar.
     * @return MunicipalityDTO DTO del municipio eliminado.
     */
    public function deleteMunicipality(int $id) : MunicipalityDTO;

}

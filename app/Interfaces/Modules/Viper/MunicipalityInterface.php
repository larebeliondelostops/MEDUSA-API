<?php

namespace App\Interfaces\Modules\Viper;
use App\DTOs\Viper\Municipality\MunicipalityDetailDTO;
use App\DTOs\Viper\Municipality\MunicipalityRequestDTO;

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
     * @param MunicipalityRequestDTO $municipalityDTO DTO con la información del municipio a crear.
     * @return MunicipalityRequestDTO DTO del municipio recién creado.
     */
    public function createNewMunicipality(MunicipalityRequestDTO $municipality): MunicipalityRequestDTO;

    /**
     * Obtiene todos los municipios disponibles.
     *
     * Puede recibir parámetros de filtro para la consulta.
     *
     * @param array $queryFilterParams Parámetros opcionales para filtrar la consulta.
     * @return array Arreglo de MunicipalityRequestDTO de todos los municipios.
     */
    public function getAllMunicipalities(array $queryFilterParams = []) : array;

    /**
     * Obtiene un municipio por su ID.
     *
     * @param int $id Identificador del municipio.
     * @return MunicipalityRequestDTO DTO del municipio solicitado.
     */
    public function getMunicipalityById(int $id) : MunicipalityDetailDTO;

    /**
     * Actualiza un municipio existente.
     *
     * @param MunicipalityRequestDTO $municipalityDTO DTO con la nueva información del municipio.
     * @param int $id ID del municipio a actualizar.
     * @return MunicipalityRequestDTO DTO del municipio actualizado.
     */
    public function updateMunicipality(MunicipalityRequestDTO $municipalityDTO, int $id): MunicipalityRequestDTO;

    /**
     * Elimina un municipio.
     *
     * @param int $id ID del municipio a eliminar.
     * @return MunicipalityDetailDTO DTO del municipio eliminado.
     */
    public function deleteMunicipality(int $id) : MunicipalityDetailDTO;

}

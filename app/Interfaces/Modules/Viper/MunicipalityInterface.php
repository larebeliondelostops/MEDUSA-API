<?php

namespace App\Interfaces\Modules\Viper;
use Illuminate\Support\Collection;

/**
 * Interfaz para la gestión de municipios en el módulo VIPER.
 *
 * Define los métodos necesarios para la creación, recuperación, actualización y eliminación de municipios.
 * Estos métodos serán implementados por la clase que gestione la lógica de negocio relacionada con los municipios.
 *
 * @package    App\Interfaces\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v2.0.0
 */
interface MunicipalityInterface
{
    /**
     * Crea un nuevo municipio.
     *
     * @param Collection $municipalityData Data con la información del municipio a crear.
     * @return Collection Data del municipio recién creado.
     */
    public function createNewMunicipality(Collection $municipality): Collection;

    /**
     * Obtiene todos los municipios disponibles.
     *
     * Puede recibir parámetros de filtro para la consulta.
     *
     * @param array $queryFilterParams Parámetros opcionales para filtrar la consulta.
     * @return Collection Arreglo de MunicipalityRequestData de todos los municipios.
     */
    public function getAllMunicipalities(array $queryFilterParams = []) : Collection;

    /**
     * Obtiene un municipio por su ID.
     *
     * @param int $id Identificador del municipio.
     * @return Collection Data del municipio solicitado.
     */
    public function getMunicipalityById(int $id) : Collection;

    /**
     * Actualiza un municipio existente.
     *
     * @param Collection $municipalityData Data con la nueva información del municipio.
     * @param int $id ID del municipio a actualizar.
     * @return Collection Data del municipio actualizado.
     */
    public function updateMunicipality(Collection $municipalityData, int $id): Collection;

    /**
     * Elimina un municipio.
     *
     * @param int $id ID del municipio a eliminar.
     * @return Collection Data del municipio eliminado.
     */
    public function deleteMunicipality(int $id) : Collection;

}

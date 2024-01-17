<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Municipality\MunicipalityDTO;
use App\Interfaces\Viper\MunicipalityInterface;
use App\Models\Viper\Municipality;
use App\Utils\Viper\Filters\MunicipalityFilter;


/**
 * Servicio para la gestión de municipios en el módulo VIPER.
 *
 * Este servicio implementa la interfaz MunicipalityInterface, proporcionando la lógica de negocio
 * para la gestión de municipios. Incluye operaciones para la creación, actualización, eliminación,
 * y recuperación de municipios y sus detalles.
 *
 * @package    App\Services\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v1.0.2
 */
class MunicipalityService implements MunicipalityInterface
{
    /**
     * Crea un nuevo municipio y lo guarda en la base de datos.
     *
     * @param MunicipalityDTO $municipalityDTO DTO con la información del municipio a crear.
     * @return MunicipalityDTO DTO del municipio recién creado.
     */
    public function createNewMunicipality(MunicipalityDTO $municipalityDTO) : MunicipalityDTO
    {
        $newMunicipality = new Municipality($municipalityDTO->toArray(except: ["id"]));
        $newMunicipality->save();
        return new MunicipalityDTO($newMunicipality->toArray());
    }

    /**
     * Obtiene todos los municipios disponibles, con posibilidad de aplicar filtros.
     *
     * @param array $queryFilterParams Parámetros opcionales para filtrar la consulta.
     * @return array Array de MunicipalityDTO de todos los municipios.
     */
    public function getAllMunicipalities(array $queryFilterParams = []) : array
    {
        $filter = new MunicipalityFilter();
        $queryItems = $filter->transform($queryFilterParams);

        $municipalityQuery = Municipality::query();
        foreach($queryItems as $item) {
            if(count($item) === 3) {
                $municipalityQuery->orWhere($item[0], $item[1], $item[2]);
            }
        }

        $municipalitiesDTO = $municipalityQuery->get()->transform(
            function (Municipality $municipality)
            {
                return new MunicipalityDTO($municipality->toArray());
            }
        )->toArray();
        return $municipalitiesDTO;
    }

    /**
     * Recupera un municipio por su ID y retorna sus detalles.
     *
     * @param int $id ID del municipio a recuperar.
     * @return MunicipalityDTO DTO del municipio solicitado.
     */
    public function getMunicipalityById(int $id) : MunicipalityDTO
    {
        $municipalityGot = Municipality::findOrFail($id);
        $municipalityDTO = new MunicipalityDTO($municipalityGot->toArray());
        return $municipalityDTO;
    }

    /**
     * Actualiza un municipio existente identificado por su ID.
     *
     * @param MunicipalityDTO $municipalityDTO DTO con la nueva información del municipio.
     * @param int $id ID del municipio a actualizar.
     * @return MunicipalityDTO DTO del municipio actualizado.
     */
    public function updateMunicipality(MunicipalityDTO $municipalityDTO, int $id) : MunicipalityDTO
    {
        $municipalityGot = Municipality::findOrFail($id);
        $municipalityGot->fill($municipalityDTO->toArray());
        $municipalityGot->save();
        return new MunicipalityDTO($municipalityGot->toArray());
    }

    /**
     * Elimina un municipio identificado por su ID y retorna los detalles del municipio eliminado.
     *
     * @param int $id ID del municipio a eliminar.
     * @return MunicipalityDTO DTO del municipio eliminado.
     */
    public function deleteMunicipality($id) : MunicipalityDTO
    {
        $municipalityGot = Municipality::findOrFail($id);
        $municipalityDelete = new MunicipalityDTO($municipalityGot->toArray());
        $municipalityGot->delete();
        return $municipalityDelete;
    }
}

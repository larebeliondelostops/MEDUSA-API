<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Department\DepartmentDetailDTO;
use App\DTOs\Viper\Department\DepartmentRequestDTO;
use App\DTOs\Viper\Location\LocationRequestDTO;
use App\DTOs\Viper\Municipality\MunicipalityDetailDTO;
use App\DTOs\Viper\Municipality\MunicipalityRequestDTO;
use App\Interfaces\Viper\LocationInterface;
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
    private LocationInterface $locationInterface;

    public function __construct(LocationInterface $locationInterface)
    {
        $this->locationInterface = $locationInterface;
    }

    /**
     * Crea un nuevo municipio y lo guarda en la base de datos.
     *
     * @param MunicipalityRequestDTO $municipalityDTO DTO con la información del municipio a crear.
     * @return MunicipalityRequestDTO DTO del municipio recién creado.
     */
    public function createNewMunicipality(MunicipalityRequestDTO $municipalityDTO) : MunicipalityRequestDTO
    {
        $location = $this->locationInterface->createNewLocation($municipalityDTO->location);
        $newMunicipality = new Municipality(
            $municipalityDTO->toArray() +
            ['location_id' => $location->id]
        );
        $newMunicipality->save();
        return new MunicipalityRequestDTO(
            $newMunicipality->toArray() +
            ['location' => $location]
        );
    }

    /**
     * Obtiene todos los municipios disponibles, con posibilidad de aplicar filtros.
     *
     * @param array $queryFilterParams Parámetros opcionales para filtrar la consulta.
     * @return array Array de MunicipalityRequestDTO de todos los municipios.
     */
    public function getAllMunicipalities(array $queryFilterParams = []) : array
    {
        $filter = new MunicipalityFilter();
        $queryItems = $filter->transform($queryFilterParams);

        $municipalityQuery = Municipality::with('location', 'department', 'department.location');
        foreach($queryItems as $item) {
            if(count($item) === 3) {
                $municipalityQuery->orWhere($item[0], $item[1], $item[2]);
            }
        }

        $municipalitiesDTO = $municipalityQuery->get()->transform(
            function (Municipality $municipality)
            {
                $data = $municipality->toArray();
                $data['department']['location'] = new LocationRequestDTO($data['department']['location']);
                $data['department'] = new DepartmentRequestDTO($data['department']);
                $data['location'] = new LocationRequestDTO($data['location']);
                return new MunicipalityDetailDTO($data);
            }
        )->toArray();
        return $municipalitiesDTO;
    }

    /**
     * Recupera un municipio por su ID y retorna sus detalles.
     *
     * @param int $id ID del municipio a recuperar.
     * @return MunicipalityRequestDTO DTO del municipio solicitado.
     */
    public function getMunicipalityById(int $id) : MunicipalityDetailDTO
    {
        $municipalityGot = Municipality::with('location', 'department', 'department.location')->findOrFail($id);
        $data = $municipalityGot->toArray();
        $data['location'] = new LocationRequestDTO($data['location']);
        $data['department']['location'] = new LocationRequestDTO($data['department']['location']);
        $data['department'] = new DepartmentRequestDTO($data['department']);
        $municipalityDTO = new MunicipalityDetailDTO($data);
        return $municipalityDTO;
    }

    /**
     * Actualiza un municipio existente identificado por su ID.
     *
     * @param MunicipalityRequestDTO $municipalityDTO DTO con la nueva información del municipio.
     * @param int $id ID del municipio a actualizar.
     * @return MunicipalityRequestDTO DTO del municipio actualizado.
     */
    public function updateMunicipality(MunicipalityRequestDTO $municipalityDTO, int $id) : MunicipalityRequestDTO
    {
        $municipalityGot = Municipality::with('location')->findOrFail($id);
        // se actualizan los datos de la localizacion del municipio
        $locationUpdated = $this->locationInterface->updateLocationById($municipalityDTO->location, $municipalityGot->location->id);
        $municipalityGot->fill($municipalityDTO->toArray());
        $municipalityGot->save();
        $data = $municipalityGot->toArray();
        $data['location'] = $locationUpdated;
        return new MunicipalityRequestDTO(
            $data
        );
    }

    /**
     * Elimina un municipio identificado por su ID y retorna los detalles del municipio eliminado.
     *
     * @param int $id ID del municipio a eliminar.
     * @return MunicipalityRequestDTO DTO del municipio eliminado.
     */
    public function deleteMunicipality($id) : MunicipalityDetailDTO
    {
        $municipalityGot = Municipality::with('location', 'department', 'department.location')->findOrFail($id);
        $locationDTO = $this->locationInterface->deleteLocation($municipalityGot->location->id);

        $data = $municipalityGot->toArray();
        $data['location'] = new LocationRequestDTO($data['location']);
        $data['department']['location'] = new LocationRequestDTO($data['department']['location']);
        $data['department'] = new DepartmentRequestDTO($data['department']);
        $municipalityDelete = new MunicipalityDetailDTO($data);
        $municipalityGot->delete();
        return $municipalityDelete;
    }
}
